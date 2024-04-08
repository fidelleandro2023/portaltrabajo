<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ruc' => $this->faker->randomNumber(8),
            'business_name' => fake()->company(),
            'tradename' => $this->faker->streetAddress(),
            'email' => fake()->unique()->safeEmail(),
            'description' => $this->faker->phoneNumber(),
            'website' => 'www.'.$this->faker->userName().'.com',
            'telephone' => $this->faker->phoneNumber(),
            //'user_id' => User::all()->random()->id,
            //'company_category_id' => $this->faker->phoneNumber(), 
        ];
    }
}
