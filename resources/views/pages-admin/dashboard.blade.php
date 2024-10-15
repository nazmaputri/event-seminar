<!-- resources/views/home.blade.php -->
@extends('layouts/layout')

@section('title', 'dashboard | admin')

@section('content')
            
        <h2 class="bg-white py-3 mx-auto text-center rounded-lg shadow-md md:w-1/2 ">Selamat Datang, <span class="font-semibold">Admin!</span></h2>

        <div class="text-center mt-12">  
            <div class="flex md:space-x-6 md:justify-between grid md:grid-cols-2 md:px-36 gap-8 items-center">
                <!-- Card Total Event -->
                <a href="{{ route('event-admin') }}">
                    <div class="bg-green-100 rounded-lg shadow-md py-8 border border-green-300 hover:bg-green-200">
                        <p class="text-sm font-medium mb-5">Total Event</p>
                        <p class="text-4xl font-bold">{{ $totalEvents }}</p>                  
                    </div>
                </a>
                
                <!-- Card Total Peserta Event -->
                <div class="bg-yellow-100 rounded-lg shadow-md py-8 border border-yellow-300">
                    <p class="text-sm font-medium mb-5">Total Peserta Event</p>
                    <p class="text-4xl font-bold">{{ $totalUsers }}</p>
                </div>                         
            </div>
        </div>

@endsection
    
