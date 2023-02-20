<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regionsData = "[{\"region_id\":1,\"region_key\":\"auckland\",\"region_name\":\"Auckland\",\"region_state\":1},{\"region_id\":2,\"region_key\":\"bay_of_plenty\",\"region_name\":\"BayOfPlenty\",\"region_state\":1},{\"region_id\":3,\"region_key\":\"coromandel\",\"region_name\":\"Coromandel\",\"region_state\":1},{\"region_id\":4,\"region_key\":\"gisborne\",\"region_name\":\"Gisborne\",\"region_state\":1},{\"region_id\":5,\"region_key\":\"hawkes_bay\",\"region_name\":\"HawkesBay\",\"region_state\":1},{\"region_id\":6,\"region_key\":\"manawatu\",\"region_name\":\"Manawatu\",\"region_state\":1},{\"region_id\":7,\"region_key\":\"northland\",\"region_name\":\"Northland\",\"region_state\":1},{\"region_id\":8,\"region_key\":\"taranaki\",\"region_name\":\"Taranaki\",\"region_state\":1},{\"region_id\":9,\"region_key\":\"waikato\",\"region_name\":\"Waikato\",\"region_state\":1},{\"region_id\":10,\"region_key\":\"wairarapa\",\"region_name\":\"Wairarapa\",\"region_state\":1},{\"region_id\":11,\"region_key\":\"wanganui\",\"region_name\":\"Wanganui\",\"region_state\":1},{\"region_id\":12,\"region_key\":\"wellington\",\"region_name\":\"Wellington\",\"region_state\":1},{\"region_id\":13,\"region_key\":\"canterbury\",\"region_name\":\"Canterbury\",\"region_state\":2},{\"region_id\":14,\"region_key\":\"marlborough\",\"region_name\":\"Marlborough\",\"region_state\":2},{\"region_id\":15,\"region_key\":\"nelson\",\"region_name\":\"Nelson\",\"region_state\":2},{\"region_id\":16,\"region_key\":\"north_otago\",\"region_name\":\"NorthOtago\",\"region_state\":2},{\"region_id\":17,\"region_key\":\"otago\",\"region_name\":\"Otago\",\"region_state\":2},{\"region_id\":18,\"region_key\":\"southland\",\"region_name\":\"Southland\",\"region_state\":2},{\"region_id\":19,\"region_key\":\"stewart_island\",\"region_name\":\"StewartIsland\",\"region_state\":2},{\"region_id\":20,\"region_key\":\"west_coast\",\"region_name\":\"WestCoast\",\"region_state\":2}]";

        $regions = json_decode($regionsData, true);

        foreach ($regions as $region) {
            Region::create([
                'name' => $region['region_name'],
                'key' => $region['region_key'],
                'state_id' => $region['region_state']
            ]);
        }

    }
}
