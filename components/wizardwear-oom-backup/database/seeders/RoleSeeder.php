<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $roles = [
            'Admin' => Role::ADMIN,
            'Board' => Role::BOARD,
            'CMS Manager' => Role::CMS,

            'Dungeons and Dragons Player' => Role::DND,
            'Dungeons and Dragons Dungeon Master' => Role::DM,
        ];

        foreach ($roles as $name => $slug) {
            if (!Role::where('slug', $slug)->exists()) {
                $role = new Role;
                $role->name = $name;
                $role->slug = $slug;

                $role->save();
            }
        }

        foreach ($users as $user){
            $user->roles()->sync(Role::all()->pluck('id'));
        }
    }
}
