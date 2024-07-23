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
        Schema::disableForeignKeyConstraints();
        Schema::enableForeignKeyConstraints();

        $data = [
            'Superadmin', 'Peternak'
        ];

        foreach ($data as $value) {
            Role::insert([
                'nama_role' => $value
            ]);
        }

        User::factory()->create([
            'username'          => 'superadmin',
            'email'          => 'pnbpitik2024@gmail.com',
            'password'          => Hash::make('superadmin'),
            'id_role'          => 1,
        ]);

        User::factory()->create([
            'username'          => 'peternak',
            'email'          => 'testpeternak@gmail.com',
            'password'          => Hash::make('peternak'),
            'id_role'          => 2,
        ]);

        \App\Models\User::factory(10)->create();
    }
}