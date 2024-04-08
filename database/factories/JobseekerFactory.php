<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobseeker>
 */
class JobseekerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doc' => $this->faker->unique()->randomNumber(6),
            'doc_type'   => $this->faker->randomElement(['DNI', 'Carnet']),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'sex'   => $this->faker->randomElement(['F', 'M']),
            'disability' => $this->faker->text(50)
        ];
    }
}
