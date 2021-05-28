<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trips')->insert(
            [
                [
                    'id' =>1,
                    'user_id' =>'1',
                    'from_city' =>'Montreal',
                    'to_city' =>'Vancouver',
                    'type' =>'Return',
                    'status' =>'Active'
                    ],
                [
                    'id' =>2,
                    'user_id' =>'2',
                    'from_city' =>'Montreal',
                    'to_city' =>'Toronto',
                    'type' =>'Return',
                    'status' =>'Active'
                    ],
                [
                    'id' =>3,
                    'user_id' =>'3',
                    'from_city' =>'Vancouver',
                    'to_city' =>'Toronto',
                    'type' =>'Single',
                    'status' =>'Active'
                    ]
            ]);                        
    }
}
