<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PastryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pastry::create([
            'name' => "Burek - Sunka kackavalj",
            'ingredients' => "sunka, kackavalj, kor"
        ]);

        \App\Models\Pastry::create([
            'name' => "Burek - Meso",
            'ingredients' => "meso, kore"
        ]);
        \App\Models\Pastry::create([
            'name' => "Eurokrem kiflice",
            'ingredients' => "eurokrem, testo"
        ]);
        \App\Models\Pastry::create([
            'name' => "Visnja kiflice",
            'ingredients' => "visnje, testo"
        ]);

    }
}
