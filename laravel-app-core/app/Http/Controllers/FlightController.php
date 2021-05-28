<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;


class FlightController extends Controller
{
     /**
     * Show all flight available.
     * 
     * @OA\Get(
     *      path="/flights",
     *      operationId="getflightList",
     *      tags={"Flights"},
     *      summary="Get list of flights available",
     *      description="Returns list of flights available",
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
     */
    public function index(){
        return Flight::all();
    }


}
