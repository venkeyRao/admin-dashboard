<?php

namespace Database\Seeders;

use App\Models\Suburb;
use App\Models\Postcode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class PostcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postcodeData = Storage::disk('public')->get('postcodes.json');
        $postcodes = json_decode($postcodeData, true);

        foreach ($postcodes as $postcode) {
            $suburb = Suburb::where('key',$postcode['suburb_seo_key'])->first();

            if($suburb == null ) {
                var_dump('suburb not found for '.$postcode['suburb_seo_key']);
            } else {
                Postcode::create([
                    'postcode' => $postcode['postcode'],
                    'suburb_id' => $suburb->id,
                    'state_id' => $suburb->state_id,
                ]);
            }

        }
    }
}
