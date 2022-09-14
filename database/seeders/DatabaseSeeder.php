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

        $this->call(PastryTableSeeder::class);
        $this->call(PastryCategoryTableSeeder::class);

        $categories = \App\Models\PastryCategory::all();
        $categories[0]->pastries()->sync([1,2]);
        $categories[1]->pastries()->sync([3,4]); 
    }
}
