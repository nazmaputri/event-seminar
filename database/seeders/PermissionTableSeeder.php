<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat permission jika belum ada
        Permission::firstOrCreate(['name' => 'register event']);
        Permission::firstOrCreate(['name' => 'view history']);
        Permission::firstOrCreate(['name' => 'print certificate']);
    }
}
