<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();

        \App\Models\Pastry::create([
            'name' => "Burek - Sunka kackavalj",
            'description' => "Sa sunkom i kackavaljem Trpkovic!"
        ]);

        \App\Models\Pastry::create([
            'name' => "Burek - Meso",
            'description' => "Sa mesom Trpkovic!"
        ]);
        \App\Models\Pastry::create([
            'name' => "Eurokrem kiflice",
            'description' => "Kiflice eurokrem Trpkovic!"
        ]);
        \App\Models\Pastry::create([
            'name' => "Visnja kiflice",
            'description' => "Kiflice visnja Trpkovic!"
        ]);
    }
}
