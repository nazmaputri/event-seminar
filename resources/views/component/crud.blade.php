<!-- Tombol detail -->
<a href="{{ route('show-peserta', ['eventId' => $event->id]) }}">
    <button id="detail" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 py-1 px-2 md:px-3 rounded-md text-white md:text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
        </svg>
        <p class="text-xs hidden md:block">detail</p>
    </button>
</a>

<!-- Tombol edit -->
<a href="{{ route('admin-edit', $event->id) }}">
    <button id="edit" class="flex items-center bg-yellow-500 hover:bg-orange-600 py-1 px-2 md:px-3 rounded-md text-white md:text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
        </svg>
        <p class="text-xs hidden md:block">edit</p>
    </button>
</a>

<!-- Tombol Hapus -->
<a href="#" data-id="{{ $event->id }}">
    <button class="hapus-button flex items-center bg-red-500 hover:bg-red-600 py-1 px-2 md:px-3 rounded-md text-white md:text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 md:w-4 md:h-4 md:mr-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
        <p class="text-xs hidden md:block">hapus</p>
    </button>
</a>

<!-- Modal Popup Konfirmasi -->
<div id="confirmationPopup" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
    <div class="bg-white py-6 px-12 rounded-lg shadow-lg">
        <p class="text-center text-gray-700">Yakin mau dihapus?</p>
        <div class="mt-4 flex justify-center gap-6">
            <form id="delete-form" method="POST" class="hidden">
                @csrf
                @method('DELETE')
            </form>
            <button id="confirmDelete" class="bg-white border border-red-500 text-red-500 py-2 px-4 rounded-xl hover:bg-red-500 hover:text-white">Hapus</button>
            <button id="cancelDelete" class="bg-white text-green-500 border border-green-500 py-2 px-4 rounded-xl hover:bg-green-500 hover:text-white">Batal</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let eventId;

        // Menangkap semua tombol hapus
        const deleteButtons = document.querySelectorAll('.hapus-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                // Menyimpan ID event yang akan dihapus
                eventId = this.parentElement.getAttribute('data-id');
                // Update action form
                const form = document.getElementById('delete-form');
                form.action = `/event/${eventId}`;
                // Menampilkan popup konfirmasi
                document.getElementById('confirmationPopup').classList.remove('hidden');
            });
        });

        // Mengonfirmasi penghapusan
        document.getElementById('confirmDelete').addEventListener('click', function() {
            // Mengirim form untuk menghapus event
            document.getElementById('delete-form').submit();

            // Sembunyikan popup konfirmasi
            document.getElementById('confirmationPopup').classList.add('hidden');
        });

        // Membatalkan penghapusan
        document.getElementById('cancelDelete').addEventListener('click', function() {
            document.getElementById('confirmationPopup').classList.add('hidden');
        });
    });
</script>