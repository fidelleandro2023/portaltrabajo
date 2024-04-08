<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => $this->faker->unique()->name,
            'contract_type_id'  => $this->faker->randomElement([1,2]),
            'occupation_id'     => $this->faker->randomElement([1,2,3,4]),
            'experience'        => $this->faker->randomDigit(),
            'salary'            => $this->faker->randomNumber(8),
            'closing_date'      => '2017-03-27',
        ];
    }
}
