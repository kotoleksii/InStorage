<?php

namespace Database\Seeders;

use App\Models\Score;
use Illuminate\Database\Seeder;
use App\Enums\SeedersConstants as SC;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Score::factory(SC::SCORE_COUNT)->create();
    }
}
