<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'User']);
        // $user = User::factory()->create();
        // $user->assignRole('user');

        // Role::create(['name' => 'admin']);
        // $admin = User::factory()->create([
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'email' => 'john@example.com',
        // ]);
        // $admin->assignRole('admin');
    }
}
