@extends('layouts/layout')

@section('title', 'edit | admin')

@section('content')
<div class="bg-white rounded-lg shadow-lg flex flex-col p-5 text-sm md:text-xs">
    <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-5">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="font-semibold leading-7 text-xl text-gray-500">Edit Event</h2>
                <div class="mt-3 grid grid-cols-1 gap-x-6 gap-y-2 md:grid-cols-2">
                    
                    <!-- Penyelenggara Event -->
                    <div class="col-span-full">
                        <label for="penyelenggara_event" class="block font-medium leading-6 text-gray-900">Penyelenggara Event</label>
                        <div class="mt-1">
                            <input type="text" name="penyelenggara_event" id="penyelenggara_event" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi nama penyelenggara event" value="{{ old('penyelenggara_event', $event->penyelenggara_event) }}">
                        </div>
                    </div>

                    <!-- Nama Event -->
                    <div class="col-span-full mt-1">
                        <label for="judul_event" class="block font-medium leading-6 text-gray-900">Judul Event</label>
                        <div class="mt-1">
                            <input type="text" name="judul_event" id="judul_event" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi judul event" value="{{ old('judul_event', $event->judul_event) }}">
                        </div>
                    </div>

                    <!-- Deskripsi Event -->
                    <div class="col-span-full mt-1">
                        <label for="deskripsi_event" class="block font-medium leading-6 text-gray-900">Deskripsi Event</label>
                        <div class="mt-1">
                            <textarea id="deskripsi_event" name="deskripsi_event" rows="3" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6" placeholder="Silahkan isi deskripsi event">{{ old('deskripsi_event', $event->deskripsi_event) }}</textarea>
                        </div>
                    </div>

                    <!-- Jenis Event -->
                    <div class="col-span-full mt-1">
                        <label for="jenis_event" class="block font-medium leading-6 text-gray-900">Jenis Event</label>
                        <div class="mt-1">
                            <select id="jenis_event" name="jenis_event" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:leading-6">
                                <option value="Online" {{ old('jenis_event', $event->jenis_event) == 'Online' ? 'selected' : '' }}>Online</option>
                                <option value="Offline" {{ old('jenis_event', $event->jenis_event) == 'Offline' ? 'selected' : '' }}>Offline</option>
                            </select>
                        </div>
                    </div>

                    <!-- Kuota Peserta -->
                    <div class="col-span-full mt-1">
                        <label for="kouta_peserta" class="block font-medium leading-6 text-gray-900">Kuota Peserta</label>
                        <div class="mt-1">
                            <input type="text" name="kouta_peserta" id="kouta_peserta" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi jumlah kuota peserta" value="{{ old('kouta_peserta', $event->kouta_peserta) }}">
                        </div>
                    </div>

                    <!-- Link Akses -->
                    <div class="col-span-full mt-1">
                        <label for="link-akses" class="block font-medium leading-6 text-gray-900">Link Akses</label>
                        <div class="mt-1">
                            <input type="url" name="link_akses" id="link-akses" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi link akses jika seminar online" value="{{ old('link_akses', $event->link_akses) }}">
                        </div>
                    </div>

                    <!-- Tanggal dan Jam Event -->
                    <div class="col-span-full mt-1">
                        <label for="tanggal_dan_jam" class="block font-medium leading-6 text-gray-900">Tanggal dan Jam Event</label>
                        <div class="mt-1">
                            <input type="datetime-local" name="tanggal_dan_jam" id="tanggal_dan_jam" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" value="{{ old('tanggal_dan_jam', $event->tanggal_dan_jam) }}">
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

                    <!-- Harga -->
                    <div class="col-span-full mt-1">
                        <label for="harga" class="block font-medium leading-6 text-gray-900">Harga</label>
                        <div class="mt-1">
                            <input type="text" name="harga" id="harga" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi harga event" value="{{ old('harga', $event->harga) }}">
                        </div>
                    </div>

                    <!-- Lokasi -->
                    <div class="col-span-full mt-1">
                        <label for="lokasi" class="block font-medium leading-6 text-gray-900">Lokasi</label>
                        <div class="mt-1">
                            <input type="text" name="lokasi" id="lokasi" class="block w-full border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:leading-6 rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600" placeholder="Silahkan isi lokasi event" value="{{ old('lokasi', $event->lokasi) }}">
                        </div>
                    </div>

                    <!-- Poster Event -->
                    <div class="col-span-full mt-1">
                        <label for="image" class="block font-medium leading-6 text-gray-900">Poster Event</label>
                        <div class="mt-1 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd"/>
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 hover:text-indigo-500">
                                        <span>Upload Poster</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">atau tarik ke sini</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, maksimal 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- Tombol Aksi -->
          <div class="flex justify-end gap-x-6 mt-3">
            <!-- Tombol Batal -->
            <button type="button" onclick="handleCancelClick()" class="text-sm text-indigo-600 hover:text-indigo-500">Batal</button>
            
            <!-- Tombol Simpan -->
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">Simpan</button>
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
        console.log('showPopup called with message:', message); // Debugging line
        document.getElementById('popupMessage').innerText = message;

        const iconContainer = document.getElementById('popupIcon');
        iconContainer.innerHTML = ''; // Clear previous icon

        if (type === 'success') {
            iconContainer.innerHTML = `
                <svg class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>`;
        }

        document.getElementById('popup').classList.remove('hidden');

        // Redirect after 2 seconds
        setTimeout(function() {
            window.location.href = "{{ route('event-admin') }}";
        }, 2000); 
    }

    // Close popup when clicking outside of content
    document.getElementById('popup').addEventListener('click', function() {
        this.classList.add('hidden');
    });

    @if(session('success'))
        document.addEventListener('DOMContentLoaded', function() {
            showPopup("{{ session('success') }}", 'success');
        });
    @endif
</script>


@endsection