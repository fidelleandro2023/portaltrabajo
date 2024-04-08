<?php

namespace Database\Seeders;
use App\Models\CompanyCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyCategories = [
            ['name' => 'Empresas de Tecnología e Informática', 'description' => 'Dedicadas al desarrollo de tecnologías de la información, software y servicios relacionados.'],
            ['name' => 'Empresas de Servicios', 'description' => 'Ofrecen servicios variados como consultoría, educación, salud, entretenimiento, entre otros.'],
            ['name' => 'Empresas Comerciales', 'description' => 'Se dedican a la compra y venta de bienes o productos.'],
            ['name' => 'Empresas de Transporte y Logística', 'description' => 'Se encargan del transporte de personas o bienes y de la gestión logística.'],
            ['name' => 'Empresas Financieras', 'description' => 'Incluyen bancos, aseguradoras, fondos de inversión y otras entidades que manejan operaciones financieras.'],
            ['name' => 'Empresas de Energía', 'description' => 'Producen y distribuyen energía, incluyendo empresas de energías renovables.']
        ];

        $batchSize = count($companyCategories); 

        foreach (array_chunk($companyCategories, $batchSize) as $batch) {
            \DB::beginTransaction();
            try {
                    foreach ($batch as $items) { 
                        CompanyCategory::insert($items);
                    }
                    \DB::commit();
                } catch (\Exception $e) {
                    \DB::rollBack();
                    $this->command->error('Error during seeder execution: ' . $e->getMessage());
                }
        }
    }
}
