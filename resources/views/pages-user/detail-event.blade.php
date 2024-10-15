@extends('layouts.layout-user')

@section('title', 'Detail | User')

@section('content')
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
                        <p class="text-gray-700 mb-2">
                            <strong>Harga:</strong> 
                            @php
                                $isPaid = false;
                                // Periksa apakah user sudah membayar untuk event ini
                                if (auth()->check()) {
                                    $userRegistration = $event->registrations()->where('user_id', auth()->id())->first();
                                    if ($userRegistration && $userRegistration->payment_status === 'pending') {
                                        $isPaid = true; // Menganggap pending sebagai lunas
                                    }
                                }
                            @endphp
                        
                            @if($isPaid)
                                Lunas
                            @elseif($event->harga)
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
                        <p class="text-indigo-700 mb-2">
                            <strong>{{ \Carbon\Carbon::parse($event->tanggal_dan_jam)->format('d F Y, H:i') }} WIB</strong>
                        </p>  
                        <p class="text-gray-700 mb-2"><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
                        <p class="text-gray-700 my-4">
                            {{ $event->deskripsi_event }}
                        </p>
                    </div>
                </div> 
            </div> 
                
            @if($registration && $registration->status === 'registered')
            <button id="bataldaftarevent" class="md:ml-auto flex md:justify-end bg-red-400 hover:bg-red-500 py-3 md:py-2 px-2 md:px-3 rounded-lg md:rounded-md text-white text-sm md:text-xs items-center justify-center focus:active:bg-red-600 focus:outline-none focus:ring focus:ring-red-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
                    <path fill="currentColor" d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12z"/></svg>
                    <p class="block ml-1">Batalkan Pendaftaran</p>
            </button>
            @endif
        
        </div>
    </div>

    <!-- Modal Popup Konfirmasi pembatalan event  -->
    <div id="confirmationEvent" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50 text-sm md:text-xs">
        <div class="bg-white px-12 py-6 rounded-lg shadow-lg">
            <p class="text-center text-gray-700">Batalkan pendaftaran event?</p>
            <div class="mt-4 flex justify-center gap-6">
                <button id="cancelEvent" class="bg-white text-green-500 border border-green-500 py-2 px-4 rounded-xl hover:bg-green-500 hover:text-white">Tidak</button>
                <form id="confirmEventForm" action="{{ route('registration.cancel', $registration->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="confirmEvent" class="bg-white border border-red-500 text-red-500 py-2 px-4 rounded-xl hover:bg-red-500 hover:text-white">Ya</button>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Menampilkan popup saat tombol pembatalan event diklik
        document.getElementById('bataldaftarevent').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('confirmationEvent').classList.remove('hidden');
        });

        // Mengonfirmasi event
        document.getElementById('confirmEvent').addEventListener('click', function() {
            document.getElementById('confirmationEvent').classList.add('hidden');
            document.getElementById('confirmEventForm').submit();
        });

        // Membatalkan event
        document.getElementById('cancelEvent').addEventListener('click', function() {
            document.getElementById('confirmationEvent').classList.add('hidden');
        });
    </script>
@endsection
