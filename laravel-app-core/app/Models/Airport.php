<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Airport",
 *     description="Airport model",
 *     @OA\Xml(
 *         name="Airport"
 *     )
 * )
 */
class Airport extends Model
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
     *      title="Name",
     *      description="Airport name",
     *      example="Pierre Elliott Trudeau International"
     * )
     *
     * @var string
     */
    public $name;
    
    /**
     * @OA\Property(
     *      title="Code",
     *      description="Airport code",
     *      example="YUL"
     * )
     *
     * @var string
     */
    public $code;
    
    /**
     * @OA\Property(
     *      title="City",
     *      description="Airport city",
     *      example="Montreal"
     * )
     *
     * @var string
     */
    public $city;
    
    /**
     * @OA\Property(
     *      title="City Code",
     *      description="Airport city Code",
     *      example="YMQ"
     * )
     *
     * @var string
     */
    public $city_code;
    
    /**
     * @OA\Property(
     *      title="Country Code",
     *      description="Airport country code",
     *      example="CA"
     * )
     *
     * @var string
     */
    public $country_code;
    
    /**
     * @OA\Property(
     *      title="Region Code",
     *      description="Airport region code",
     *      example="QC"
     * )
     *
     * @var string
     */
    public $region_code;
    
    /**
     * @OA\Property(
     *      title="Latitude",
     *      description="Airport's latitude",
     *      example="45.470556"
     * )
     *
     * @var decimal
     */
    public $latitude;
    
    /**
     * @OA\Property(
     *      title="Longitude",
     *      description="Airport's Longitude",
     *      example="-73.740832"
     * )
     *
     * @var decimal
     */
    public $longitude;
    
    /**
     * @OA\Property(
     *      title="Time Zone",
     *      description="Airport's timezone",
     *      example="America/Montreal"
     * )
     *
     * @var string
     */
    public $timezone;

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
