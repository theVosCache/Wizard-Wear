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
        $admin = Role::where('slug', Role::ADMIN);
        $board = Role::where('slug', Role::BOARD);
        $dnd = Role::where('slug', Role::DND);

        if (!$admin->exists()){
            $role = new Role;
            $role->name = ucfirst(Role::ADMIN);
            $role->slug = Role::ADMIN;

            $role->save();
        }

        if (!$board->exists()){
            $role = new Role;
            $role->name = ucfirst(Role::BOARD);
            $role->slug = Role::BOARD;

            $role->save();
        }

        if (!$dnd->exists()){
            $role = new Role;
            $role->name = ucfirst(Role::DND);
            $role->slug = Role::DND;

            $role->save();
        }

        foreach ($users as $user){
            $user->roles()->sync([
                $admin->first()->id, $board->first()->id, $dnd->first()->id
            ]);
        }
    }
}
