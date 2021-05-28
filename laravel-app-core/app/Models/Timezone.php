<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Timezone",
 *     description="Timezone model",
 *     @OA\Xml(
 *         name="Timezone"
 *     )
 * )
 */
class Timezone extends Model
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
     *      description="Timezone Name",
     *      example="Active"
     * )
     *
     * @var string
     */
    public $status;
}
