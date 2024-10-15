@extends('layouts.layout-user')

@section('title', 'Event | User')

@section('content')

@if(session('payment_status') == 'success')
<script>
    window.location.href = "/event-seminar";
</script>
@endif

<h2 class="py-2 pl-5 text-left text-slate-800 rounded-lg shadow-md md:w-1/3 font-bold text-md md:text-base">Event</h2>   
<div class="mx-auto p-1 md:p-4 mt-3">
    <div class="bg-white rounded-lg shadow-lg flex flex-col text-xs p-3">
        @if($registrations->isEmpty())
            <div class="flex items-center p-2 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Tidak ada event yang terdaftar.</span>
                </div>
            </div>
        @else
            <div class="flex items-center p-2 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Perhatian!</span> Kamu telah terdaftar dalam event ini.
                </div>
            </div>

            <div class="mb-5 overflow-auto md:overflow-x-visible">
                <table class="table-auto w-full text-left text-md md:text-xs min-w-full overflow-auto md:overflow-x-visible">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-2 md:px-2 py-2 md:text-sm bg-yellow-100 text-center">No</th>
                            <th class="px-6 py-2 md:text-sm bg-blue-100 text-center">Nama Event</th>
                            <th class="px-6 py-2 md:text-sm bg-pink-100 text-center">Status Pembayaran</th> <!-- Kolom baru -->
                            <th class="px-6 py-2 md:text-sm bg-green-100 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                        <tr>
                            <td class="px-2 py-4 border-b border-slate-300 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-slate-300">{{ $registration->event->judul_event }}</td>
                            <td class="px-6 py-4 border-b border-slate-300 text-center">
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
                            <td class="px-6 py-4 border-b border-slate-300">
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('event.show', ['id' => $registration->event->id]) }}">
                                        <button id="detail" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 py-1 px-2 md:px-3 rounded-md text-white md:text-xs">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <p class="text-xs hidden md:block">detail</p>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm mt-8 justify-end w-full">  
                        {{ $registrations->links() }}
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</div>
@endsection
