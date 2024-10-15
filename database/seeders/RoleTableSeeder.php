<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat role admin
        Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        // Membuat role user
        Role::firstOrCreate([
            'name' => 'user',
            'guard_name' => 'web'
        ]);
    }
}
