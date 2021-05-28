<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use Illuminate\Http\Request;


class AirportController extends Controller
{
     /**
     * Show all airport available.
     * 
     * @OA\Get(
     *      path="/airports",
     *      operationId="getAirportList",
     *      tags={"Airports"},
     *      summary="Get list of airports available",
     *      description="Returns list of airports available",
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
        return Airport::all();
    }

}
