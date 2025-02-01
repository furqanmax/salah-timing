<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'View Permission', 'Create Permission', 'Edit Permission', 'Delete Permission',
            'View Post', 'Create Post', 'Edit Post', 'Delete Post',
            'View Role', 'Create Role', 'Edit Role', 'Delete Role',
            'View User', 'Create User', 'Edit User', 'Delete User',
            'delete-any User', 'restore User', 'restore-any User',
            'replicate User', 'reorder User', 'force-delete User', 'force-delete-any User'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
