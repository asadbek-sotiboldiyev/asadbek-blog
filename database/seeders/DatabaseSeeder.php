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
        // \App\Models\User::factory(10)->create();
        /*
        User::factory()->create([
            'name' => 'Asadbek Sotiboldiyev',
            'email' => 'asadbek.phpdev@gmail.com',
            'password' => Hash::make('password'),
        ]);
        */
    }
}
