<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="Trip",
 *     description="Trip model",
 *     @OA\Xml(
 *         name="Trip"
 *     )
 * )
 */
class Trip extends Model 
{
    protected $table = 'trips';
    protected $fillable = ['user_id', 'from_city', 'to_city','type','status'];
    /*
    * The flights that belong to the Trip
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function flights() 
    {
      return $this->belongsToMany(Flight::class, 'trip_flight')
      ->withPivot(['flight_date'])
      ->as('flight_info');
    } 
 

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="Trip owner id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public $user_id;
    
    /**
     * @OA\Property(
     *     title="from_city",
     *     description="Trip from",
     *     format="int64",
     *     example=1
     * )
     *
     * @var string
     */
    public $from_city;

    /**
     * @OA\Property(
     *     title="to_city",
     *     description="Trip to",
     *     format="int64",
     *     example=1
     * )
     *
     * @var string
     */
    public $to_city;


    /**
     * @OA\Property(
     *     title="trip_type",
     *     description="Trip type",
     *     format="int64",
     *     example="Return/Single"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="Status",
     *      description="Current status of the flight",
     *      example="Active"
     * )
     *
     * @var string
     */
    public $status;
}
