<?php

namespace Database\Seeders;
use App\Models\ContractType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractTypeSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Contrato laboral',   'description' => 'Contrato laboral'],
            ['name' => 'Orden de Prestación de Servicios', 'description' => 'Orden de Prestación de Servicios'],
        ];

        $batchSize = count($types); 

        foreach (array_chunk($types, $batchSize) as $batch) {
            \DB::beginTransaction();
            try {
                    foreach ($batch as $items) { 
                        ContractType::insert($items);
                    }
                    \DB::commit();
                } catch (\Exception $e) {
                    \DB::rollBack();
                    $this->command->error('Error during seeder execution: ' . $e->getMessage());
                }
        }
    }
}
