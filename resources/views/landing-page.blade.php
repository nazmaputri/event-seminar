@extends('layouts.layout-lp')

@section('title', 'landing-page')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Seminar</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Section 1 -->
    <div class="mx-auto rounded-lg mt-5 p-5">
        <div class="flex grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-16 md:mx-12">
            <img src="{{ asset('storage/images/banner.png') }}" alt="icon" class="w-full h-auto max-w-none max-h-none object-cover focus:ring focus:ring-blue-300">
            <h3 class="text-md md:text-base mx-2"><span class="font-semibold">EventSeminar</span> bertujuan untuk menyederhanakan proses pendaftaran acara seminar, memberikan pengalaman yang menyenangkan bagi peserta, dan mempermudah pengelolaan seminar bagi penyelenggara.</h3>
        </div>
    </div>

    <!-- Section 2 -->
    <div class="md:w-3/4 w-full mx-auto p-6 rounded-lg mt-3 items-center">
        <h2 class="text-center text-gray-700 text-lg mb-8 font-semibold border border-blue-400 bg-white py-2 px-5 md:px-0 rounded-full shadow-md">
            4 Langkah daftar kegiatan di <span class="text-blue-900">#Eventseminar</span>
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-12 text-center text-xs mt-8">
            <!-- Langkah 1 -->
            <div class="flex flex-col items-center p-2">
                <div class="bg-slate-200 rounded-lg h-24 w-24 flex items-center justify-center border border-blue-200 shadow-md hover:bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[40px] h-[40px] text-gray-500">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM8.547 4.505a8.25 8.25 0 1 0 11.672 8.214l-.46-.46a2.252 2.252 0 0 1-.422-.586l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.211.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.654-.261a2.25 2.25 0 0 1-1.384-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.279-2.132Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-gray-700 mt-2">Kunjungi website #EventSeminar</p>
            </div>
            <!-- Langkah 2 -->
            <div class="flex flex-col items-center p-2">
                <div class="bg-slate-200 rounded-lg h-24 w-24 flex items-center justify-center border border-blue-200 shadow-md hover:bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[40px] h-[40px] text-gray-500">
                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                    </svg>                </div>
                <p class="text-gray-700 mt-2">Buat akun dengan mengisi data diri dan login jika sudah mempunyai akun</p>
            </div>
            <!-- Langkah 3 -->
            <div class="flex flex-col items-center p-2">
                <div class="bg-slate-200 rounded-lg h-24 w-24 flex items-center justify-center border border-blue-200 shadow-md hover:bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[40px] h-[40px] text-gray-500">
                        <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z" clip-rule="evenodd" />
                        <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
                    </svg>
                </div>
                <p class="text-gray-700 mt-2"> Kemudian pilih menu event dan daftar event yang ingin kamu ikuti</p>
            </div>
            <!-- Langkah 4 -->
            <div class="flex flex-col items-center p-2">
                <div class="bg-slate-200 rounded-lg h-24 w-24 flex items-center justify-center border border-blue-200 shadow-md hover:bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[40px] h-[40px] text-gray-500">
                        <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-gray-700 mt-2"> Klik tombol daftar kegiatan, maka informasi detail terhadap kegiatan yang kamu ikuti akan tampil.</p>
            </div>
            <!-- Langkah 5 -->
            <div class="flex flex-col items-center p-2">
                <div class="bg-slate-200 rounded-lg h-24 w-24 flex items-center justify-center border border-blue-200 shadow-md hover:bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[40px] h-[40px] text-gray-500">
                        <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
                        <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <p class="text-gray-700 mt-2">Ikuti kegiatan dan cetak sertifikat nya!</p>
            </div>
        </div>
    </div>

</body>
</html>


@endsection

@section('footer')
<!-- Footer content here -->
@endsection