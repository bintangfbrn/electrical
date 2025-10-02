<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserAssignRole extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::find(4)->assignRole('superadmin');

        Role::find(1)->givePermissionTo('view_permission');
        Role::find(1)->givePermissionTo('create_permission');
        Role::find(1)->givePermissionTo('edit_permission');
        Role::find(1)->givePermissionTo('delete_permission');
    }
}
