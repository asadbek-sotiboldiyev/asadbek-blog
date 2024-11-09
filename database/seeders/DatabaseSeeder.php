<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin_email@test.com',
            'password' => Hash::make('password'),
        ]);
        */
    }
}
