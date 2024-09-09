<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(class: PermissionSeeder::class);

        if (User::where('email', 'matthijs@test.nl')->count() === 0) {
            $user = new User(attributes: [
                'name' => 'Matthijs de Vos',
                'email' => 'matthijs@test.nl',
                'password' => Hash::make('testtest'),
                'email_verified_at' => Carbon::now()
            ]);

            $user->save();
        }
    }
}
