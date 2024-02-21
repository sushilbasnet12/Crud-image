<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        $user = User::find(1);

        if ($user->hasRole('admin')) {
            //
        }

        if ($user->can('view users')) {
            //
        }

        if ($user->can('create users')) {
            //
        }

        if ($user->can('edit users')) {
            //
        }

        if ($user->can('delete users')) {
            //
        }
    }
}
