<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AirportSeeder extends Seeder
{
    /**
     * Run the database Airport Dataseeds
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert(
            [[
                'id' =>1,
                'name' =>'Pierre Elliott Trudeau International',
                'code' =>'YUL',
                'city' =>'Montreal',
                'city_code' =>'YMQ',
                'country_code' =>'CA',
                'region_code' =>'QC',
                'latitude' =>'45.470556',
                'longitude' =>'-73.740832',
                'timezone' =>'America/Montreal',
                'status' =>'Active'
                ],
                [
                    'id' =>2,
                    'name' =>'Vancouver International',
                    'code' =>'YVR',
                    'city' =>'Vancouver',
                    'city_code' =>'YVR',
                    'country_code' =>'CA',
                    'region_code' =>'BC',
                    'latitude' =>'49.194698',
                    'longitude' =>'-123.179192',
                    'timezone' =>'America/Vancouver',
                    'status' =>'Active'
                ],
                [
                'id' =>3,
                'name' =>'Pearson International Airport',
                'code' =>'YYZ',
                'city' =>'Toronto',
                'city_code' =>'YYZ',
                'country_code' =>'CA',
                'region_code' =>'ON',
                'latitude' =>'43.677700',
                'longitude' =>'-79.624800',
                'timezone' =>'America/Toronto',
                'status' =>'Active'
                ]],
        );
    }

}
