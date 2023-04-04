<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $items = ['','Programmer','Technician','Server Engineer','Graphic Designer','Project Manager'];
        for ($i=1; $i <= 5; $i++) { 
            $role = $items[$i];
            Position::insert([
                'id' => $i, 
                'position' => $role,
            ]);
        }
    }
}
