@extends('layouts.layout-user')

@section('title', 'Riwayat Event | User')

@section('content')

<h2 class="py-2 pl-5 text-left text-slate-800 rounded-lg shadow-md md:w-1/3 font-bold text-md md:text-base">Riwayat Event</h2> 

<div class="mx-auto p-1 md:p-4 mt-3">
    <div class="bg-white rounded-lg shadow-lg flex flex-col text-xs p-3">
        <div class="flex justify-between">
            <div class="pr-12">
                <p class="md:text-xs">Anda telah mengikuti event ini</p>
            </div>
            <div class="pl-3">
                <p class="text-end md:text-xs">{{ $registrations->total() }} event telah diikuti</p>
            </div>
        </div>
        <div class="my-3 overflow-auto md:overflow-x-visible">
            <table class="table-auto w-full text-left md:text-xs min-w-full overflow-auto md:overflow-x-visible">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 md:px-2 py-2 md:text-sm bg-yellow-100 text-center">No</th>
                        <th class="px-6 py-2 md:text-sm bg-blue-100 text-center">Nama Event</th>
                        <th class="px-6 py-2 md:text-sm bg-green-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($registrations->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">Anda belum mengikuti event apapun.</td>
                        </tr>
                    @else
                        @foreach($registrations as $index => $registration)
                            <tr>
                                <td class="px-2 py-4 border-b border-slate-300 text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-b border-slate-300">{{ $registration->event->judul_event }}</td>
                                <td class="px-6 py-4 border-b border-slate-300">
                                    <div class="flex justify-center items-center">
                                        @php
                                            $currentDate = now();
                                        @endphp
            
                                        @if($registration->event->end_date <= $currentDate)
                                            <a href="{{ route('generate-certificate', ['registrationId' => $registration->id]) }}" target="_blank">
                                                <button id="detail" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 py-1 px-2 md:px-3 rounded-md text-white md:text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                    </svg>
                                                    <p class="text-xs hidden md:block">Cetak Sertifikat</p>
                                                </button>
                                            </a>
                                        @else
                                            <button id="detail" class="flex items-center justify-center bg-gray-500 py-1 px-2 md:px-3 rounded-md text-white md:text-xs" disabled>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                                </svg>
                                                <p class="text-xs hidden md:block">Sertifikat Tidak Tersedia</p>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm mt-8 justify-end w-full">  
                    {{ $registrations->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>

@if(session('error'))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK'
            });
        });
    </script>
@endif


@endsection
