@extends('layouts.layout-user')

@section('title', 'Info-Event | User')

@section('content')
<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    <h2 class="py-2 pl-5 text-left text-slate-800 rounded-lg shadow-md md:w-1/3 font-bold text-md md:text-base">Detail Event</h2>  
   
    <div class="mx-auto p-1 md:p-4 mt-3">
        <div class="bg-white rounded-lg shadow-lg flex flex-col text-xs p-3">

            <div class="mx-auto md:p-1 mt-3">
                <div class="flex flex-col md:flex-row text-xs p-3"> <!-- Menambahkan text-sm di sini -->
                    <!-- Gambar Event -->
                    <div class="md:w-1/5 md:h-auto lg:w-1/7 px-12 py-3 md:p-4">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Detail Event" class="rounded-lg">
                    </div>
                    <!-- Deskripsi Event -->
                    <div class="md:w-2/3 md:pl-6">
                        <h2 class="text-xl font-bold mb-2">{{ $event->judul_event }}</h2>
                        <div class="flex space-x-2 mb-4">
                            <span class="bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded">{{ $event->jenis_event }}</span>
                            <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2 py-1 rounded">{{ $event->penyelenggara_event }}</span>
                        </div>
                        <p class="text-red-700 mb-2 font-semibold">
                            <strong>Harga:</strong> 
                            @if($event->harga)
                             Rp.{{ number_format($event->harga, 0, '.', '.') }}
                            @else
                                GRATIS
                            @endif
                        </p>
                        <p class="text-gray-700 mb-2">
                            <strong>Kuota Peserta:</strong> 
                            {{ $event->kouta_peserta }} orang 
                            (Sisa: {{ $event->kouta_peserta }} orang)
                        </p>                        
                        @if(!empty($event->link_akses))
                            <p class="text-gray-700 mb-2"><strong>Link Akses:</strong> <a href="{{ $event->link_akses }}" class="text-blue-600 underline">{{ $event->link_akses }}</a></p>
                         @endif
                        <p class="text-indigo-600 mb-2">
                            <strong>{{ \Carbon\Carbon::parse($event->tanggal_dan_jam)->format('d F Y, H:i') }} WIB</strong>
                        </p>                        
                        <p class="text-gray-700 mb-2"><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
                        <p class="text-gray-700 my-4">
                            {{ $event->deskripsi_event }}
                        </p>
                    </div>
                </div> 
            </div> 
                
   <!-- Tombol Daftar Event -->
   <button id="daftarEvent" data-event-id="{{ $event->id }}" data-event-price="{{ $event->harga }}" class="md:ml-auto flex md:justify-end bg-blue-400 hover:bg-blue-500 py-3 md:py-1 px-2 md:px-3 rounded-lg md:rounded-md text-white text-sm md:text-xs items-center justify-center focus:active:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
    <p class="text-sm block px-4 py-1 font-semibold text-center">Daftar Event</p>
    </button>

<!-- Pop-up untuk Notifikasi -->
<div id="popup" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div id="popupContent" class="bg-white py-8 rounded px-12">
        <div id="popupIcon" class="hidden text-center mb-2"></div>
        <div id="popupMessage" class="text-center"></div>
        <div class="flex items-center justify-center">
            <button id="payNow" class="hidden bg-green-500 text-white px-4 py-2 rounded mt-3">Bayar Sekarang</button>
        </div>
    </div>
</div>

<script>
     document.addEventListener('DOMContentLoaded', function() {
        const daftarEventButton = document.getElementById('daftarEvent');
        const popup = document.getElementById('popup');
        const payNowButton = document.getElementById('payNow');

        if (daftarEventButton) {
            daftarEventButton.addEventListener('click', function(event) {
                event.preventDefault();
                const eventId = daftarEventButton.getAttribute('data-event-id');
                const eventPrice = daftarEventButton.getAttribute('data-event-price');
                
                // Proses pendaftaran event
                fetch(`/daftar-event/${eventId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (eventPrice > 0) {
                            // Jika event berbayar, tampilkan tombol "Bayar Sekarang"
                            showPopup('Event ini berbayar, klik tombol di bawah untuk melanjutkan pembayaran.', 'info');
                            payNowButton.classList.remove('hidden');
                            
                            // Tambahkan event listener ke tombol "Bayar Sekarang"
                            payNowButton.addEventListener('click', function() {
                                fetch(`/bayar-event/${eventId}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.snap_token) {
                                        snap.pay(data.snap_token); // Ini akan membuka popup pembayaran Midtrans
                                    } else {
                                        showPopup('Terjadi kesalahan saat memproses pembayaran.', 'error');
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    showPopup('Gagal memproses pembayaran.', 'error');
                                });
                            });

                        } else {
                            // Jika gratis, arahkan ke halaman event-seminar
                            showPopup('Pendaftaran berhasil!', 'success');
                            setTimeout(function() {
                                window.location.href = '/event-seminar';
                            }, 2000);
                        }
                    } else {
                        // Jika gagal, tampilkan pesan error
                        showPopup(data.message || 'Kuota peserta sudah penuh!', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showPopup('Kuota peserta sudah penuh!', 'error');
                });
            });
        }

        function showPopup(message, type) {
            document.getElementById('popupMessage').innerText = message;
            const iconContainer = document.getElementById('popupIcon');
            iconContainer.innerHTML = '';

            if (type === 'success') {
                iconContainer.innerHTML = `
                    <svg class="h-8 w-8 text-green-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>`;
            } else if (type === 'error') {
                iconContainer.innerHTML = `
                    <svg class="h-8 w-8 text-red-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>`;
            } else if (type === 'info') {
                iconContainer.innerHTML = `
                    <svg class="h-8 w-8 text-blue-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m0-4h.01M12 17a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                    </svg>`;
            }

            popup.classList.remove('hidden');
        }

        popup.addEventListener('click', function() {
            popup.classList.add('hidden');
        });
    });
</script>


@endsection
