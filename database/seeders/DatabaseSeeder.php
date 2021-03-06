<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmployeeSeeder::class,
            ScoreSeeder::class,
            MaterialSeeder::class,

            PermissionsSeeder::class,
            RolesSeeder::class,
            TablesRelationsSeeder::class,
        ]);
    }
}
