<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trip;


/**
 * @OA\Schema(
 *     title="Flights",
 *     description="Flights model",
 *     @OA\Xml(
 *         name="Flights"
 *     )
 * )
 */
class Flight extends Model
{
    use HasFactory;

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
     *      title="Number",
     *      description="Flight number",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $number;

    /**
     * @OA\Property(
     *      title="Airline",
     *      description="Airline's Code",
     *      example="TK"
     * )
     *
     * @var string
     */
    public $airline;

    /**
     * @OA\Property(
     *      title="Departure Airport",
     *      description="Departure airport code",
     *      example="YUL"
     * )
     *
     * @var string
     */
    public $departure_airport;

    /**
     * @OA\Property(
     *      title="Departure Time",
     *      description="Departure time in 24h format",
     *      example="YUL"
     * )
     *
     * @var time
     */
    public $departure_time;

    /**
     * @OA\Property(
     *      title="Arrival Airport",
     *      description="Arrival airport code",
     *      example="YUL"
     * )
     *
     * @var string
     */
    public $arrival_airport;

    /**
    * @OA\Property(
    *      title="Arrival Time",
    *      description="Arrival time in 24h format",
    *      example="YVL"
    * )
    *
    * @var time
    */
    public $arrival_time;

    /**
     * @OA\Property(
     *      title="Price",
     *      description="Flight cost $",
     *      example="273.30"
     * )
     *
     * @var decimal
     */
    public $price;

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
