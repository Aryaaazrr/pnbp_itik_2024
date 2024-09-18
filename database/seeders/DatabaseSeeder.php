<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\TipeAnalisis;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username'          => 'pnbpitik2024',
            'email'          => 'pnbpitik2024@gmail.com',
            'password'          => Hash::make('1234321'),
        ]);

        \App\Models\User::factory(10)->create();

        $data = [
            'Penetasan',
            'Penggemukan',
            'Layer'
        ];

        foreach ($data as $value) {
            TipeAnalisis::insert([
                'nama_tipe' => $value
            ]);
        }
    }
}
