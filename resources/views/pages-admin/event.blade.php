@extends('layouts.layout')

@section('title', 'Event | Admin')

@section('content')
    <h2 class="py-3 mx-auto text-center rounded-lg shadow-md md:w-1/2 font-bold text-2xl">Event</h2>

    <div class="mt-8 bg-white p-5 mx-auto text-center rounded-lg shadow-md h-auto">  
        <div class="flex justify-end">
            <a href="{{ route('event-tambah') }}">
                <button class="flex items-center space-x-3 md:space-x-2 bg-green-400 hover:bg-green-500 rounded-lg border border-green-500 focus:active:bg-green-500 focus:outline-none focus:ring focus:ring-green-400 text-white px-5 py-1.5 md:px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <p class="text-sm md:text-xs font-semibold">Tambah Event</p>
                </button>
            </a>
        </div>

        <!-- table event -->               
        <div class="mt-6 overflow-x-auto md:overflow-x-visible">
            <table class="table-auto w-full text-left md:text-xs">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-2 md:px-6 py-2 md:text-sm bg-yellow-100 text-center">No</th>
                        <th class="px-6 py-2 md:text-sm bg-blue-100 text-center">Nama</th>
                        <th class="px-6 py-2 md:text-sm bg-green-100 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                        <tr>
                            <td class="px-2 py-4 border-b border-slate-300 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-slate-300">{{ $event->judul_event }}</td>
                            <td class="px-6 py-4 border-b border-slate-300">
                                <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
                                    @include('component.crud')
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 border-b border-slate-300 text-center">Tidak ada event yang ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <!-- Pagination -->
            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px text-sm mt-8 justify-end w-full">  
                    {{ $events->links() }}
                </ul>
            </nav>
    
        </div>
    </div>        
@endsection
