<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat role admin dan user jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Membuat pengguna contoh dengan role admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $admin->assignRole($adminRole);

        // Membuat pengguna contoh dengan role user
        $user = User::create([
            'name'  => 'User Example',
            'nik'   => '098765432109',
            'email' => 'user@gmail.com',
            'telp'  => '086735489621',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $user->assignRole($userRole);
    }
}
