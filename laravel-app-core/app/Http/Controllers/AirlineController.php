<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
     /**
     * Show all airline available.
     * 
     * @OA\Get(
     *      path="/airlines",
     *      operationId="getAirlineList",
     *      tags={"Airlines"},
     *      summary="Get list of airlines available",
     *      description="Returns list of airlines available",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Airline::all();
    }
}
