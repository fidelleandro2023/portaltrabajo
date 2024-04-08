<?php

namespace Database\Seeders;
use App\Models\Occupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Occupations = [
            ['name' => 'Abogado',   'description' => '00001'],
            ['name' => 'Actuario', 'description' => '00003'],
            ['name' => 'Administrador', 'description' => '00004'],
            ['name' => 'Agente de Bolsa', 'description' => '00008'],
            ['name' => ' Asistente Social', 'description' => '00021'],
            ['name' => 'Constructor', 'description' => '00039'],
            ['name' => 'Contador', 'description' => '00040'],
        ];

        $batchSize = count($Occupations); 

        foreach (array_chunk($Occupations, $batchSize) as $batch) {
            \DB::beginTransaction();
            try {
                    foreach ($batch as $items) { 
                        Occupation::insert($items);
                    }
                    \DB::commit();
                } catch (\Exception $e) {
                    \DB::rollBack();
                    $this->command->error('Error during seeder execution: ' . $e->getMessage());
                }
        }
    }
}
