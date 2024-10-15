<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Include Vite CSS -->
    @vite('resources/css/app.css')
    <title>Event | Login</title>
</head>
<body>
    <div class="w-screen h-screen bg-slate-200 flex items-center justify-center">
    <div class="bg-white w-full lg:w-1/3 p-8 rounded-lg shadow-lg mx-8">
        <h2 class="text-center text-2xl font-bold mb-4">
            Masuk
        </h2>
        @if (session('error'))
            <div class="text-red-500 text-center mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full p-2 border focus:border-rose-600 rounded-lg shadow-sm sm:text-sm" placeholder="Masukkan email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border rounded-lg shadow-sm sm:text-sm" placeholder="Masukkan password" required>
                @error('password')
                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-6 mx-8">
                <button type="submit" class="font-bold w-full bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-700">Masuk!</button>
            </div>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Belum punya akun? <a href="/registrasi" class="font-medium text-blue-700 hover:text-blue-500">Daftar</a></p>
        </div>
    </div>
</div>

<!-- Letakkan script di bawah elemen form -->
<script>
  document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    try {
        let response = await fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        });

        let data = await response.json();

        if (response.ok) {
            // Simpan token jika dibutuhkan
            localStorage.setItem('token', data.token);

            // Redirect berdasarkan role user
            if (data.user.role === 'admin') {
                window.location.href = '/pages-admin/dashboard';
            } else {
                window.location.href = '/pages-user/dashboard-user';
            }
        } else {
            alert(data.message || 'Login gagal!');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Login gagal!');
    }
});

</script>

</body>
</html>
