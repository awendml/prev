<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i < 50; $i++) { 
            Employee::insert([
                'name' => $faker->name,
                'numemp' =>$faker->randomNumber(5, true),
                'address' =>$faker->address,
                'position_id' =>$faker->numberBetween(1,5),
            ]);
        }
    }
}
