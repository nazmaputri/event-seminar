<!-- resources/views/dashboard-user.blade.php -->

@extends('layouts.layout-user')

@section('title', 'Dashboard | User')

@section('content')
<h2 class="py-2 pl-5 text-left text-slate-800 rounded-lg shadow-md md:w-1/3 font-bold text-md md:text-base">
    Selamat datang, {{ Auth::user()->name }}
</h2>

<div class="mx-auto p-1 md:p-4 mt-3 bg-white rounded-lg shadow-lg">
    <div class="flex flex-col md:flex-row text-xs p-3">
        <div class="mt-2 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 pl-2">

            @foreach($events as $event)
            <!-- Card Event -->
            <div class="group relative shadow-sm rounded-lg bg-white p-2 md:p-3 border border-slate-300 shadow-md">
                <a href="{{ route('info-event', $event->id) }}" class="block">

                    {{-- Poster Event --}}
                    <div class="flex justify-center items-center m-2 md:m-1">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="cover event" class="h-full w-full object-center">
                    </div>

                    {{-- Judul Event --}}
                    <div class="justify-start items-start text-md md:text-xs pl-2 md:pl-1 lg:pl-0 my-2">
                        <h4 class="text-gray-800 font-semibold">
                            {{ $event->judul_event }}
                        </h4>
                    </div>

                    {{-- Status Event --}}
                    <div class="flex justify-center items-center">
                        <div class="grid mt-1">
                            <div class="flex items-center space-x-1 text-xs font-semibold">
                                <p class="bg-orange-300 text-white py-0.5 text-center rounded-xl px-3">
                                    @if($event->harga)
                                        Rp.{{ number_format($event->harga, 0, '.', '.') }}
                                    @else
                                        GRATIS
                                    @endif
                                </p>
                                <p class="text-white bg-blue-400 py-0.5 text-center rounded-xl px-3">
                                    {{ $event->jenis_event }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi Event --}}
                    <div class="flex my-2 px-3">
                        <div>
                            <div class="my-2">
                                <div class="grid mt-1">
                                    <div class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-gray-500">
                                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-[10px] text-gray-700">{{ $event->tanggal_dan_jam }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-gray-500 mt-1">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-[10px] text-gray-700">{{ $event->kouta_peserta }} orang</p>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 text-gray-500 mt-1">
                                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-[10px] text-gray-700">{{ $event->lokasi }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="inline-flex -space-x-px text-sm justify-end w-full">  
            {{ $events->links() }}
        </ul>
    </nav>

</div>

@endsection
