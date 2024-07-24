<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
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
            'username'          => 'pnbp2024',
            'email'          => 'pnbp2024@gmail.com',
            'password'          => Hash::make('peternak'),
        ]);

        \App\Models\User::factory(10)->create();
    }
}