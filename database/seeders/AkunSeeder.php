<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'view_permission',
            'create_permission',
            'edit_permission',
            'delete_permission',
            'view_role',
            'create_role',
            'edit_role',
            'delete_role',
            'view_user',
            'create_user',
            'edit_user',
            'delete_user',
            // Tambahkan permission lain di sini
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
        }

        Role::create(['name' => 'superadmin'])
            ->givePermissionTo(
                [
                    'view_permission',
                    'create_permission',
                    'edit_permission',
                    'delete_permission',
                    'view_role',
                    'create_role',
                    'edit_role',
                    'delete_role',
                    'view_user',
                    'create_user',
                    'edit_user',
                    'delete_user',
                ]
            );
        Role::create(['name' => 'admin'])
            ->givePermissionTo(
                [
                    'view_user',
                    'create_user',
                    'edit_user',
                    'delete_user'
                ]
            );
        Role::create(['name' => 'bsdm']);
        Role::create(['name' => 'bku']);

        User::create([
            'name' => "Superadmin Itenas",
            'username' => 'superadmin',
            "email" => "superadmin@simsdm.itenas.ac.id",
            "password" => Hash::make('superadminsimsdm'),
        ])->assignRole('superadmin');;
    }
}