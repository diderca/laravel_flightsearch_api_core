<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Timezones list from php function
         $tzs= timezone_identifiers_list();
         
         $timeZones = array();
         $i=1;
        foreach ($tzs as $tz) {
            array_push ($timeZones, ['id' =>$i, 'name' =>str_replace('(','',str_replace(')','',$tz))]);
            $i++;
        }

        // Insert into the BD.
        DB::table('timezones')->insert($timeZones);
    }
}
