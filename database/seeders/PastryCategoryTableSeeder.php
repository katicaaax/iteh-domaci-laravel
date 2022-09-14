<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PastryCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PastryCategory::create([
            'name' => 'Slano',
            'description' => "Salty"
        ]);

        \App\Models\PastryCategory::create([
            'name' => 'Slatko',
            'description' => "Sweet"
        ]);
    }
}
