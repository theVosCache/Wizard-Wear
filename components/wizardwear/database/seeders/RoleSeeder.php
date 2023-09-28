<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Role::$roles as $slug => $value) {
            if (Role::where('slug', $slug)->count() === 0) {
                $role = new Role;

                $role->name = $value;
                $role->slug = $slug;

                $role->save();
            }
        }
    }
}
