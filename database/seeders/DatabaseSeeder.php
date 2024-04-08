<?php

namespace Database\Seeders;
use Database\Seeders\UserSeeder;
use Database\Seeders\CompanyCategorySeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\ContractTypeSeeder;
use Database\Seeders\JobCategorySeeder;
use Database\Seeders\JobSeeder;
use Database\Seeders\JobseekerSeeder;
use Database\Seeders\OccupationSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**********Insertar datos********/
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            CompanyCategorySeeder::class,
            CompanySeeder::class,
            ContractTypeSeeder::class,
            JobCategorySeeder::class, 
            OccupationSeeder::class,
            JobSeeder::class,
            JobseekerSeeder::class 
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
