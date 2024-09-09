<?php

namespace Database\Seeders;

use DirectoryTree\Authorization\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissionData() as $permissionData) {
            if (!Permission::where('name', $permissionData['name'])->exists()) {
                $permission = Permission::create([
                    'name' => $permissionData['name'],
                    'label' => $permissionData['label'],
                ]);

                $permission->save();
            }
        }
    }

    private function permissionData(): array
    {
        // name => 'unique', 'label' => view name
        return [
            ['name' => 'role_admin', 'label' => 'Role Management'],
        ];
    }
}
