<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->admin()->count(10)->create();      //Insertar usuarios y asignar rol Admin
        User::factory()->postulant()->count(100)->create(); //Insertar usuarios y asignar rol Postulante
    }
}