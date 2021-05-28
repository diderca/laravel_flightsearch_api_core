<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AirlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airlines')->insert(
            [[
                'id' =>1,
                'name' =>'Air Canada',
                'code' =>'AC',
                'status' =>'Active'
                ],
             [
                'id' =>2,
                'name' =>'Qatar Airways',
                'code' =>'QA',
                'status' =>'Active'
                ],
             [
                'id' =>3,
                'name' =>'Turkish Airlines',
                'code' =>'TK',
                'status' =>'Active'
                ],
              [
                'id' =>4,
                'name' =>'Emirates Airlines',
                'code' =>'EK',
                'status' =>'Active'
                ],
             [
                'id' =>5,
                'name' =>'WestJet Airlines',
                'code' =>'WJA',
                'status' =>'Active'
                ]
            ]
        );
    }
    
}
