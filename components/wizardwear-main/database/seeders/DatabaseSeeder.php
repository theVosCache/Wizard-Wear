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
        if (!User::where('email', 'matthijs@test.nl')->exists()){
            $user = new User;
            $user->name = 'Matthijs de Vos';
            $user->email = 'matthijs@test.nl';
            $user->password = Hash::make('test');

            $user->save();
        }
    }
}
