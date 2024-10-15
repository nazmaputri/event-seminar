<!-- resources/views/home.blade.php -->
@extends('layouts/layout')

@section('title', 'tambah | admin')

@section('content')
<div class="bg-white rounded-lg shadow-lg flex flex-col p-5 text-sm md:text-xs">
    <form action="{{ route('event-tambah') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="space-y-5">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="font-semibold leading-7 text-xl  text-gray-500">Tambah Event</h2>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                    <div class="col-span-full">
                        <label for="penyelenggara_event" class="block font-medium leading-6 text-gray-900">Penyelenggara event</label>
                        <div class="mt-1">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="text" name="penyelenggara_event" id="penyelenggara_event" autocomplete="username" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2  text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi nama penyelenggara event">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="nama" class="block font-medium leading-6 text-gray-900">Nama event</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <input type="text" name="judul_event" id="nama" autocomplete="username" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi nama event">
                        </div>
                    </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="deskripsi" class="block font-medium leading-6 text-gray-900">Deskripsi Event</label>
                    <div class="mt-1">
                        <textarea id="deskripsi" name="deskripsi_event" rows="3" class="block outline-none focus:border-none w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6" placeholder="Silahkan isi deskripsi event"></textarea>
                    </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="jenis" class="block font-medium leading-6 text-gray-900">Jenis Event</label>
                    <div class="mt-1">
                        <select id="jenis" name="jenis_event" class="block outline-none focus:border-none w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6">
                        <option>Online</option>
                        <option>Offline</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="kuota" class="block font-medium leading-6 text-gray-900">Kuota Peserta</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <input type="number" name="kouta_peserta" id="kouta_peserta" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi jumlah kuota peserta">
                        </div>
                    </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="link-akses" class="block font-medium leading-6 text-gray-900">Link Akses</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <input type="text" name="link_akses" id="link_akses" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi link akses jika seminar online">
                        </div>
                    </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="event-datetime" class="block font-medium leading-6 text-gray-900">Tanggal dan Jam Event</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <input type="datetime-local" name="tanggal_dan_jam" id="tanggal_dan_jam" class="pl-2 block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pr-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Opsi kalender beserta jam">
                        </div>
                        </div>
                    </div>

                    <!-- New End Date Field -->
                    <div class="col-span-full mt-1">
                        <label for="end-date" class="block font-medium leading-6 text-gray-900">Tanggal dan Jam Akhir Event</label>
                        <div class="mt-1">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <input type="datetime-local" name="end_date" id="end_date" class="pl-2 block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pr-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Opsi kalender beserta jam">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full mt-1">
                        <label for="lokasi" class="block font-medium leading-6 text-gray-900">Lokasi</label>
                        <div class="mt-1">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                            <input type="text" name="lokasi" id="lokasi" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi lokasi event">
                            </div>
                        </div>
                    </div>

                    <div class="col-span-full mt-1">
                    <label for="lokasi" class="block font-medium leading-6 text-gray-900">Harga</label>
                    <div class="mt-1">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <input type="text" name="harga" id="harga" class="block outline-none focus:border-none w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6" placeholder="Silahkan isi harga event">
                        </div>
                    </div>
                    </div>
                    

                    <div class="col-span-full mt-1">
                        <label for="image" class="block font-medium leading-6 text-gray-900">Poster Event</label>
                        <div class="mt-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex leading-6 text-gray-600">
                                    <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF, JPEG, SVG up to 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-x-6">
                <button id="cancelbutton" type="button" class="font-semibold leading-6 text-white bg-red-500 px-3 rounded-md hover:bg-red-400 focus:active:bg-red-500 focus:outline-none focus:ring focus:ring-red-300">Batal</button>
                <button id="submitbutton" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 font-semibold text-white shadow-sm hover:bg-indigo-500 focus:active:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">Tambah</button>
            </div>
        </div>
    </form>
</div>

<!-- Modal popup -->
<div id="popup" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
    <div id="popupContent" class="bg-white p-6 rounded-lg shadow-lg" onclick="event.stopPropagation();">
        <p id="popupMessage" class="text-center text-gray-700"></p>
        <div id="popupIcon" class="flex justify-center mt-4"></div>
    </div>
</div>

<script>
    function showPopup(message, type) {
        document.getElementById('popupMessage').innerText = message;

        const iconContainer = document.getElementById('popupIcon');
        iconContainer.innerHTML = ''; // Bersihkan ikon sebelumnya

        if (type === 'success') {
            iconContainer.innerHTML = `
                <svg class="h-8 w-8 text-green-500 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>`;
        }

        document.getElementById('popup').classList.remove('hidden');

        // Redirect setelah 2 detik
        setTimeout(function() {
            window.location.href = "{{ route('event-admin') }}"; // Ganti dengan route ke halaman tabel event
        }, 2000); 
    }

    // Tutup popup saat mengklik di luar konten popup
    document.getElementById('popup').addEventListener('click', function() {
        this.classList.add('hidden');
    });
</script>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showPopup("{{ session('success') }}", 'success');
        });
    </script>
@endif


@endsection
