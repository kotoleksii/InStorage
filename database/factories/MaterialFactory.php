<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Material;
use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Material::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $amount = $this->faker->randomDigit();
        $price = $this->faker->numberBetween(10000, 2000000);
        $sum = $amount * $price;

        return [
            'title' => $this->faker->word(),
            'inventory_number' => $this->faker->ean8(),
            'date_start' => $this->faker->date(),
            'type' => $this->faker->fileExtension(),
            'amount' => $amount,
            'price' => $price,
            'sum' => $sum,

            'employee_id' => rand(1, Employee::count()),
            'score_id' => rand(1, Score::count()),
        ];
    }
}
