<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class TablesRelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::get();
        $roles = Role::get();
        $users = User::get();

        foreach ($roles as $role) {
            if($role->slug === Role::DEFAULT_ADMIN_ROLE_SLUG)
                $role->permissions()->sync($permissions);
            else
                $role->permissions()->sync($permissions->random(rand(0, $permissions->count())));
        }

        foreach ($users as $user) {
            $user->roles()->sync($roles->random(rand(0, $roles->count())));
            $user->permissions()->sync($permissions->random(rand(0, $permissions->count())));
        }
    }
}
