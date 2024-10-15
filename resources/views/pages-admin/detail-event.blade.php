<!-- resources/views/home.blade.php -->
@extends('layouts/layout')

@section('title', 'dashboard | detail-event')

@section('content')
            
    <h2 class="py-2 pl-5 text-left text-slate-800 rounded-lg shadow-md md:w-1/3 font-bold text-md md:text-base">Detail Event</h2>

    <div class="mx-auto p-1 md:p-4 mt-3">
        <div class="md:w-1/5 md:h-auto lg:w-1/7 px-12 py-3 md:p-4">
            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->judul_event }}" class="rounded-lg">
        </div>
        
        <div class="md:w-2/3 md:pl-6">
            <h2 class="text-xl font-bold mb-2">{{ $event->judul_event }}</h2>
            <p class="text-gray-700 mb-4">
                {{ $event->deskripsi_event }}
            </p>
            <div class="flex space-x-2 mb-4">
                <span class="bg-green-200 text-green-800 text-xs font-semibold px-2 py-1 rounded">{{ $event->jenis_event }}</span>
                <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2 py-1 rounded">{{ $event->penyelenggara_event }}</span>
            </div>
            <p class="text-gray-700 mb-2">
                <strong>Harga:</strong> 
                @if($event->harga)
                 Rp.{{ number_format($event->harga, 0, '.', '.') }}
                @else
                    GRATIS
                @endif
            </p>
            <p class="text-gray-700 mb-2"><strong>Kuota Peserta:</strong> {{ $event->kouta_peserta }} orang</p>
            @if(!empty($event->link_akses))
                <p class="text-gray-700 mb-2"><strong>Link Akses:</strong> <a href="{{ $event->link_akses }}" class="text-blue-600 underline">{{ $event->link_akses }}</a></p>
             @endif
            <p class="text-red-600 mb-2"><strong>{{ \Carbon\Carbon::parse($event->tanggal_dan_jam)->format('d F Y, H:i') }} WIB</strong></p>
            <p class="text-gray-700 mb-2"><strong>Lokasi:</strong> {{ $event->lokasi }}</p>
        </div>

        
        
            
            <!-- Tabel Peserta -->
<div class="mt-8 bg-white p-5 mx-auto items-center rounded-lg shadow-md">
    <div class="flex justify-start font-bold">
        <h2 class="text-lg">Peserta</h2>
        <!-- Checkbox "Select All" -->
        <div class="inline-flex items-center text-sm ml-auto space-x-2 pr-6">
            <h2 class="text-sm">Select All</h2>
            <input type="checkbox" id="selectAll" onclick="toggleAll(this)">
        </div>
    </div>

    <div class="container mx-auto mt-3">
        <div class="overflow-x-auto">
            <form action="{{ route('update-certification-status') }}" method="POST">
                @csrf
                @method('PUT')
                <table class="min-w-full bg-white border border-gray-200 text-sm md:text-xs">
                    <thead>
                        <tr class="bg-blue-50">
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">NO</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">NAMA PESERTA</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">NIK</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">EMAIL</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">NO. TELP</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">STATUS PEMBAYARAN</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-left text-xs font-medium text-gray-500 uppercase">SERTIFIKAT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($registrations as $index => $registration)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $registration->user->name }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $registration->user->nik }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $registration->user->email }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">{{ $registration->user->telp }}</td>
                                <td class="px-6 py-4 border-b border-gray-200">
                                    @if($registration->event->harga > 0)
                                        @if($registration->payment && $registration->payment->transaction_status == 'success')
                                            Lunas
                                        @else
                                            Lunas
                                        @endif
                                    @else
                                        Gratis
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-b border-gray-200 text-center">
                                    <input type="checkbox" class="certificate-checkbox" name="certification_status[{{ $registration->id }}]" value="1" 
                                    @if($registration->certification_status) checked @endif>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 border-b border-gray-200 text-center">Tidak ada peserta terdaftar</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-right">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Status Sertifikat</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>        
        </div>
    </div>
</div>

<!-- Tambahkan script untuk checkbox "Select All" -->
<script>
    function toggleAll(source) {
        let checkboxes = document.querySelectorAll('.certificate-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }
</script>

        </div>
            

        </div>

    </div>       

@endsection
