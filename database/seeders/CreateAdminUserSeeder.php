<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating the Admin user
        $adminUser = User::create([
            'name' => 'Frank',
            'username' => 'admin',
            'password' => bcrypt('admin123')
        ]);

        // Creating the Admin role
        $adminRole = Role::create(['name' => 'Admin']);

        // Assigning all permissions to the Admin role
        $permissions = Permission::pluck('id', 'id')->all();
        $adminRole->syncPermissions($permissions);

        // Assigning the Admin role to the user
        $adminUser->assignRole([$adminRole->id]);

        // Creating all roles including the User role
        $this->createAllRoles();

        // Creating the regular user with the 'User' role
        $this->createRegularUser();
    }

    public function createAllRoles()
    {
        // Creating other roles
        $staffGudang = Role::create(['name' => 'Staff Gudang']);
        $staffBarang = Role::create(['name' => 'Staff Barang']);
        $userRole = Role::create(['name' => 'User']); // Adding User role

        // Syncing specific permissions to each role
        $staffGudang->syncPermissions([12]);
        $staffBarang->syncPermissions([11]);
        $userRole->syncPermissions([]); // Assign specific permissions or leave empty for no specific permissions
    }

    public function createRegularUser()
    {
        // Creating a regular user
        $regularUser = User::create([
            'name' => 'RegularUser',
            'username' => 'user',
            'password' => bcrypt('user123')
        ]);

        // Assigning the 'User' role to the regular user
        $userRole = Role::where('name', 'User')->first();
        $regularUser->assignRole([$userRole->id]);
    }
}
