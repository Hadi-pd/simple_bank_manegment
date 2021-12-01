<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'admin',
                'password' => Hash::make('admin')
            ]
        );
        $role = Role::create(
            ['name' => 'admin']
        );
        RoleUser::create(
            [
                'role_id' => $role->id,
                'user_id' => $user->id
            ]
        );
        $user = User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'user1',
                'password' => Hash::make('user')
            ]
        );
        $role = Role::create(
            ['name' => 'user']
        );
        RoleUser::create(
            [
                'role_id' => $role->id,
                'user_id' => $user->id
            ]
        );
    }
}
