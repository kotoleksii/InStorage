<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Admin',
                'slug' => Role::DEFAULT_ADMIN_ROLE_SLUG,
            ],
            [
                'title' => 'Guest user',
                'slug' => 'guest',
            ]
        ];

        DB::table('roles')->insert($roles);
    }
}
