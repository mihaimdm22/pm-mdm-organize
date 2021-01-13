<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'username' => 'jdoe',
                'email' => 'john@example.com',
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $userRole = Role::create(['name' => 'user']);

        $permissions = Permission::pluck('id','id')->all();

        $adminRole->syncPermissions($permissions);

        $user->assignRole([$adminRole->id]);
        $user->assignRole([$userRole->id]);
    }
}
