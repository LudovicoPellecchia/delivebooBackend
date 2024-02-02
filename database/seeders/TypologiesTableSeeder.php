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
            ['name' => 'Italiano'],
            ['name' => 'Pizzeria'],
            ['name' => 'Fritti'],
            ['name' => 'Giapponese'],
            ['name' => 'Americano'],
            ['name' => 'Cinese'],
            ['name' => 'Messicano'],
            ['name' => 'Indiano'],
            ['name' => 'Vegano'],
            ['name' => 'Thai'],
            ['name' => 'Mediterraneo'],
            ['name' => 'Pesce'],
        ];

        foreach ($typologies as $typology){
            $newTypology = new Typology();
    
            $newTypology->name = $typology["name"];
    
            $newTypology->save();
        }
    }
}
