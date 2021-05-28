<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripFlight extends Model
{
    use HasFactory;
    protected $table = 'trip_flight';
    protected $fillable =  ['trip_is_id','flight_id','flight_date','status'];
}
