<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typologies = [
            ['name' => 'Mexican'],
            ['name' => 'Pizza'],
            ['name' => 'Japanese'],
            ['name' => 'Vegan'],
            ['name' => 'Backery'],
            ['name' => 'Italian'],
            ['name' => 'Indian'],
            ['name' => 'Fried'],
            ['name' => 'Chinese'],
            ['name' => 'Thai'],
        ];

        foreach ($typologies as $typology){
            $newTypology = new Typology();
    
            $newTypology->name = $typology["name"];
    
            $newTypology->save();
        }
    }
}
