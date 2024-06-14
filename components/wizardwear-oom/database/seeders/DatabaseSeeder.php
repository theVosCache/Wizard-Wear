<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (User::where('email', 'matthijs@test.nl')->count() === 0) {
            $user = new User([
                'name' => 'Matthijs de Vos',
                'email' => 'matthijs@test.nl',
                'password' => Hash::make('testtest'),
            ]);

            $user->save();
        }
    }
}
