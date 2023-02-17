<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::create([
            'name' => 'super-admin',
            'email' => 'super@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'super-admin']);
        $user->assignRole($role);

        $arrayOfPermissionNames = ['edit', 'delete','view'];
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });

        Permission::insert($permissions->toArray());
    }
}
