<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContractType>
 */
class ContractTypeFactory extends Factory
{
    protected $types = [
        ['name' => 'Contrato temporal',   'description' => 'Contrato temporal'],
        ['name' => 'Contrato laboral',   'description' => 'Contrato laboral'],
        ['name' => 'Orden de Prestación de Servicios', 'description' => 'Orden de Prestación de Servicios'],
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
