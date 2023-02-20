<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            /*CategoryGroupSeeder::class,
            CategorySeeder::class,
            CountryAndStateSeeder::class,
            RegionSeeder::class,
            SuburbSeeder::class
            PostcodeSeeder::class*/
            ArticleSeeder::class
        ]);
    }
}
