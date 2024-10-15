<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Daftar</title>
</head>
<body class="w-full h-full bg-rose-50">
    <div class="w-screen h-screen bg-rose-50 flex items-center justify-center lg:my-12">
        <div class="bg-white w-full lg:w-1/3 p-8 rounded-lg shadow-lg mx-8">
            <h2 class="text-center text-2xl font-bold mb-4 first-letter:text-5xl first-letter:font-bold first-letter:text-slate-900">
                Daftar
            </h2>
            <form action="{{ route('registrasi') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan nama" required>
                </div>
                <div class="mb-4">
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="number" id="nik" name="nik" class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan NIK" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan email" required>
                </div>
                <div class="mb-4">
                    <label for="telp" class="block text-sm font-medium text-gray-700">No. Telp</label>
                    <input type="tel" id="telp" name="telp" class="mt-1 block w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan No. Telp" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm sm:text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Masukkan password" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm sm:text-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Konfirmasi password" required>
                </div>
                <div class="mt-6 mx-8">
                    <button type="submit" class="font-bold w-full bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 transition-colors duration-200">
                        Daftar!
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">Sudah punya akun? <a href="/login" class="font-medium text-blue-700 hover:text-blue-500">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
</html>
