<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class TripFlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trip_flight')->insert(
        [
            [
            'id' =>1,
            'trip_id' =>'1',
            'flight_id' =>'1',
            'flight_date' =>'2020-01-01 00:00:00',
            'status' =>'Active'
            ],
            [
            'id' =>2,
            'trip_id' =>'1',
            'flight_id' =>'2',
            'flight_date' =>'2020-01-01 00:00:00',
            'status' =>'Active'
            ],
            [
            'id' =>3,
            'trip_id' =>'2',
            'flight_id' =>'3',
            'flight_date' =>'2020-01-01 00:00:00',
            'status' =>'Active'
            ],
            [
            'id' =>4,
            'trip_id' =>'2',
            'flight_id' =>'4',
            'flight_date' =>'2020-01-01 00:00:00',
            'status' =>'Active'
            ],
            [
            'id' =>5,
            'trip_id' =>'3',
            'flight_id' =>'5',
            'flight_date' => '2020-01-01 00:00:00',
            'status' =>'Active'
            ]
        ]);
    }
}
