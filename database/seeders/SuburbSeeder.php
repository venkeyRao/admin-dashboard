<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\Suburb;
use App\Models\SuburbDistances;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SuburbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suburbData = Storage::disk('public')->get('suburbs.json');
        $suburbs = json_decode($suburbData, true);

        foreach ($suburbs as $suburb) {
            $region = Region::find($suburb['region_id']);
            Suburb::create([
                'name' => $suburb['suburb_name'],
                'key' => $suburb['suburb_key'],
                'region_id' => $suburb['region_id'],
                'state_id' => $region->state_id,
                'latitude' => $suburb['latitude'],
                'longitude' => $suburb['longitude']
            ]);
        }

        // populate suburb distances table

        foreach (Suburb::all() as $suburb) {
            $otherSuburbs = Suburb::where('id', '!=', $suburb->id)->get();
            foreach ($otherSuburbs as $suburbToCompare) {
                SuburbDistances::create([
                    'from_suburb_id' => $suburb->id,
                    'to_suburb_id' => $suburbToCompare->id,
                    'distance' => $this->getDistance($suburb->latitude, $suburb->longitude,$suburbToCompare->latitude, $suburbToCompare->longitude)
                ]);
            }
        }

    }

    /**
     * Optimized algorithm from http://www.codexworld.com
     *
     * @param float $latitudeFrom
     * @param float $longitudeFrom
     * @param float $latitudeTo
     * @param float $longitudeTo
     *
     * @return float [km]
     */
    public function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $rad = M_PI / 180;
        //Calculate distance from latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin($latitudeFrom * $rad)
            * sin($latitudeTo * $rad) +  cos($latitudeFrom * $rad)
            * cos($latitudeTo * $rad) * cos($theta * $rad);

        return acos($dist) / $rad * 60 *  1.853;
    }
}
