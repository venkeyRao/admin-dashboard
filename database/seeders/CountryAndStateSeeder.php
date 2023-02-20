<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountryAndStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::create([
            'name' => 'New Zealand',
            'key' => 'nz'
        ]);

        State::create([
            'name' => 'North Island',
            'key' => 'north_island',
            'country_id' => $country->id
        ]);

        State::create([
            'name' => 'South Island',
            'key' => 'south_island',
            'country_id' => $country->id
        ]);
    }
}
