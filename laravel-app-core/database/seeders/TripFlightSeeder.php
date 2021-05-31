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
            'departure_date' =>'2021-05-17 07:35:00',
            'arrival_date' =>'2021-05-17 10:04:00',
            'status' =>'Active'
            ],
            [
            'id' =>2,
            'trip_id' =>'1',
            'flight_id' =>'2',
            'departure_date' =>'2021-05-18 10:05:00',
            'arrival_date' =>'2021-05-18 13:06:00',
            'status' =>'Active'
            ]
        ]);
    }
}
