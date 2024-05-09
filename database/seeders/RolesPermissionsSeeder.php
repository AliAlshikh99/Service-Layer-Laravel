<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $roles = ['super admin', 'admin', 'client'];
        foreach ($roles as $role) {
            Role::findOrCreate($role, 'web');
        }
        $superAdmin = Role::where('name', 'super admin')->first();
        $admin = Role::where('name', 'admin')->first();
        $client = Role::where('name', 'client')->first();
        $permissions = ['read_data', 'write_data', 'update_data', 'delete_data'];

        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission, 'web');
        }
        $superAdmin->syncPermissions($permissions);
        $admin->givePermissionTo(['read_data', 'write_data']);
        $client->givePermissionTo(['read_data']);

        $adminUser = User::create([

            'name' => 'Admin1',
            'email' => 'Admin1@test.test',
            'password' => Hash::make('abcdABCD'),



        ]);
        $adminUser->assignRole($superAdmin);
        $adminPermissions = $superAdmin->permissions()->pluck('name')->toArray();
        $adminUser->givePermissionTo($adminPermissions);
    }
}
