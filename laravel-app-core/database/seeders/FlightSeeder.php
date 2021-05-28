<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert(
            [[
                'id' =>1,
                'number' =>'1',
                'airline' =>'AC',
                'departure_airport' =>'YUL',
                'departure_time' =>'07:35',
                'arrival_airport' =>'YVR',
                'arrival_time' =>'10:05',
                'price' =>'273.23',
                'status' =>'Active'
                ],
             [
                'id' =>2,
                'airline' =>'AC',
                'number' =>'2',
                'departure_airport' =>'YVR',
                'departure_time' =>'11:35',
                'arrival_airport' =>'YUL',
                'arrival_time' =>'17.05',
                'price' =>'283.23',
                'status' =>'Active'
                ],
             [
                'id' =>3,
                'airline' =>'QA',
                'number' =>'2',
                'departure_airport' =>'YUL',
                'departure_time' =>'01:05',
                'arrival_airport' =>'DOH',
                'arrival_time' =>'23.00',
                'price' =>'273.23',
                'status' =>'Active'
                ],
              [
                'id' =>4,
                'airline' =>'QA',
                'number' =>'4',
                'departure_airport' =>'DOH',
                'departure_time' =>'07:50',
                'arrival_airport' =>'YUL',
                'arrival_time' =>'18.10',
                'price' =>'255.55',
                'status' =>'Active'
                ],
             [
                'id' =>5,
                'airline' =>'AC',
                'number' =>'5',
                'departure_airport' =>'DOH',
                'departure_time' =>'1:20',
                'arrival_airport' =>'YUL',
                'arrival_time' =>'11:50',
                'price' =>'293.23',
                'status' =>'Active'
                ]
            ]
        );
    }
}
