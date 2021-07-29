<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;
use App\Enums\SeedersConstants as SC;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::factory(SC::MATERIALS_COUNT)->create();
    }
}
