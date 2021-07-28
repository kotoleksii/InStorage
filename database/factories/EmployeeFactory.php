<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $first_name = $this->faker->firstName();
        $last_name = $this->faker->lastName();
        $post =  $this->faker->jobTitle();

        $full_name = $first_name . ' ' . $last_name;
        $description = $full_name . ' - ' . $post;

        return [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'post' => $post,
                'description' => $description,
        ];
    }
}
