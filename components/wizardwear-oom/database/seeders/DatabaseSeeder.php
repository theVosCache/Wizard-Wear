<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        if (User::where('email', 'matthijs@test.nl')->count() === 0){
            $user = new User;
            $user->name = 'Matthijs de Vos';
            $user->email = 'matthijs@test.nl';
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make('test');
            $user->save();
        }

        $this->call(RoleSeeder::class);
        $this->call(DndPotionSeeder::class);
    }
}
