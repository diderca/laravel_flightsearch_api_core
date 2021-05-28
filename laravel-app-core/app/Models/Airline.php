<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Airline",
 *     description="Airline model",
 *     @OA\Xml(
 *         name="Airline"
 *     )
 * )
 */
class Airline extends Model
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
     *      title="name",
     *      description="Airline name",
     *      example="TK"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Code",
     *      description="Airline Code",
     *      example="TK"
     * )
     *
     * @var string
     */
    public $code;

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
