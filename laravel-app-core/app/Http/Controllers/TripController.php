<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;
use App\Models\Airport;
use App\Models\Airline;
use App\Models\Flight;
use Illuminate\Http\Request;


class TripController extends Controller
{


 /**
     * Show all trips available.
     * 
     * @OA\Get(
     *      path="/trips",
     *      operationId="getTripsList",
     *      tags={"Trips"},
     *      summary="Get list of tripss available",
     *      description="Returns list of tripss available",
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
        //return all active trips
        $trips = Trip::where('status', 'Active')->get();

        $tripsArray = [];

        //prepae all trips with its flights info and total cost
        foreach($trips as $trip){

            $flights = $trip->flights()->where('flights.status', 'Active')->get();
            $totalPrice = 0;

            foreach( $flights as $flight){
                $totalPrice = $totalPrice + $flight['price'];
            }
            $trip['cost'] = $totalPrice;
            $trip['flights'] = $flights;            
            array_push($tripsArray, $trip );
        }

        return $tripsArray;

    }

    /**
     * Show the form for creating a new trip.
     * 
     * @OA\Post(
     *      path="/trips",
     *      operationId="StoreTrip",
     *      tags={"Trips"},
     *      summary="Create a new trip",
     *      description="Returns success stauts with new entry properties",
            @OA\RequestBody(
                *       @OA\MediaType(
                *           mediaType="multipart/form-data",
                *           @OA\Schema(required={"user_id", "type","from_city","to_city" },
                            @OA\Property(property="user_id", type="integer"),
                            @OA\Property(property="type", type="string", enum={"Single", "Round"}),
                            @OA\Property(property="from_city", type="string", enum={"Montral", "Toronto", "Vancouver"}),
                            @OA\Property(property="to_city", type="string", enum={ "Toronto", "Montreal","Vancouver"})
                            )    
                *       )
                *   ),
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
     *      ),
     *   
 
     *     )
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Trip::create([
                'user_id' => $request->user_id,
                'from_city' => $request->from_city,
                'to_city' => $request->to_city,
                'type' => $request->type,
                'status' => 'Active' 
                ]);
        
    }


    /**
     * Show the form for creating a new trip.
     * 
     * @OA\Post(
     *      path="/addFlight",
     *      operationId="AddTripFlight",
     *      tags={"Trips"},
     *      summary="Add a new flight on trip",
     *      description="Trip Infos",
            @OA\RequestBody(
                *       @OA\MediaType(
                *           mediaType="multipart/form-data",
                *           @OA\Schema(required={"trip_id", "flight_id","flight_date"},
                            @OA\Property(property="trip_id", type="integer"),
                            @OA\Property(property="flight_id", type="integer"),
                            @OA\Property(property="flight_date", type="date", pattern= "/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/", example= "2021-05-17")
                            )    
                *       )
                *   ),
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
     *      ),
     *   
     *     )
     */
    public function addFlight(Request $request)
    {
        $trip = Trip::find($request->trip_id);
        $trip->flights()->attach($request->flight_id,['flight_date'=>$request->flight_date,'status'=>'Active']);
        return $trip;
        
    }


    /**
     * Show the form for creating a new trip.
     * 
     * @OA\Post(
     *      path="/RemoveFlight",
     *      operationId="removeTripFlight",
     *      tags={"Trips"},
     *      summary="Remove a Flight from a trip",
     *      description="Returns trip info",
            @OA\RequestBody(
                *       @OA\MediaType(
                *           mediaType="multipart/form-data",
                *           @OA\Schema(required={"trip_id", "flight_id", "flight_date"},
                            @OA\Property(property="trip_id", type="integer"),
                            @OA\Property(property="flight_id", type="integer"),
                            @OA\Property(property="flight_date", type="date", pattern= "/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/", example= "2021-05-17")
                            )    
                *       )
                *   ),
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
     *      ),
     *   
     *     )
     */
    public function removeFlight(Request $request)
    {
        $trip = Trip::find($request->trip_id);
        $trip->flights()->detach($request->flight_id);
        $trip->flights()->where('flight_id',$request->flight_id)->where('flight_date', $request->flight_date)->update(['trip_flight.status' => 'Removed']);
        return $trip;
    }

 /**
     * Show the form for creating a new trip.
     * 
     * @OA\Get(
     *      path="/SearchTripFlight",
     *      operationId="searchTripFlight",
     *      tags={"Trips"},
     *      summary="Search Flights for a trip",
     *      description="Returns flight list availavle for a flight",
     *       @OA\Parameter(
    *          name="trip_id",
    *          description="Enter trip Id to search flight available",
    *          in="query",     
    *          style="form"
    *           ),
     *       @OA\Parameter(
    *          name="tripType",
    *          example="Round",
    *          description="Select trip type",
    *          in="query",     
    *          style="form"
    *           ),
     *       @OA\Parameter(
    *          name="airline",
    *          description="Select specific airline's flight only",
    *          in="query",     
    *          style="form"
    *           ),
    *       
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *           ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *           ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *           )
    *   
    *     )
    */
    public function searchTripFlight(Request $request)
    {
        $trip = Trip::find($request->trip_id);
        $flightsAvailavle =[];
         
         $flightsFromAirport = Airport::where('city', $trip['from_city'])->get('code');
         $flightsToAirport = Airport::where('city', $trip['to_city'])->get('code');

         // Single Query builder
          $departingFlightsQueryBuilder = Flight::where('departure_airport', $flightsFromAirport[0]['code'])->where('arrival_airport', $flightsToAirport[0]['code']) ;

            // If search limited to one airlines only 
            if ($request->airline){
                  $airline = Airline::where('name', $request->airline)->first('code'); 
                  if(isset($airline['code'])){
                      $departingFlightsQueryBuilder->where('airline', $airline['code']);
                  }
                
            }

            $flightsAvailavle['departing_flights'] = $departingFlightsQueryBuilder->get();


         // return trip  Query builder
        if ($request->tripType == 'Round'){
            $returningFlightsQueryBuilder = Flight::where('arrival_airport', $flightsFromAirport[0]['code'])->where('departure_airport', $flightsToAirport[0]['code']);
            
            // If search limited to one airlines only 
            if ($request->airline){
                $airline = Airline::where('name', $request->airline)->first('code'); 
                if(isset($airline['code'])){
                $returningFlightsQueryBuilder->where('airline', $airline['code']);
                }
            }

            $flightsAvailavle['returning_flights'] = $returningFlightsQueryBuilder->get();
        } 
         
        
        return $flightsAvailavle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
