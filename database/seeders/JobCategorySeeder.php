<?php

namespace Database\Seeders;
use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $JobCategory = [
            ['name' => 'EJECUTIVO',   'description' => '19'],
            ['name' => 'OBRERO', 'description' => '20'],
            ['name' => 'EMPLEADO', 'description' => '21'],
            ['name' => 'TRAB.PORTUARIO', 'description' => '22'],
            ['name' => 'PERIODISTA', 'description' => '30'], 
        ];

        $batchSize = count($JobCategory); 

        foreach (array_chunk($JobCategory, $batchSize) as $batch) {
            \DB::beginTransaction();
            try {
                    foreach ($batch as $items) { 
                        JobCategory::insert($items);
                    }
                    \DB::commit();
                } catch (\Exception $e) {
                    \DB::rollBack();
                    $this->command->error('Error during seeder execution: ' . $e->getMessage());
                }
        }
    }
}
