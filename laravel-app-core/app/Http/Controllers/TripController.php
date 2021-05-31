<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;
use App\Models\Airport;
use App\Models\Airline;
use App\Models\Flight;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;
use DateTime;
use DateTimeZone;
use Error;

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
     * Creating a new trip.
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
                *           @OA\Schema(required={"trip_id", "flight_id","departure_date"},
                            @OA\Property(property="trip_id", type="integer"),
                            @OA\Property(property="flight_id", type="integer"),
                            @OA\Property(property="departure_date", type="date", pattern= "/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/", example= "2021-05-17")
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
         

        // determine flight arrival date
        // $flightArrivalDate = $this->flightarrivalDate($trip, $request->flight_id, $request->departure_date);
        //TODO: add exception if validation for requested flight fails
        //TODO:  private validation function maybe in manager file.
        $flightArrivalDate= '2011-12-13 12:12:10';
        // if($flightArrivalDate){
        // //Attach Flight 
        $trip->flights()->attach($request->flight_id,['departure_date'=>$request->departure_date,'arrival_date'=>$flightArrivalDate,'status'=>'Active']);
        return $trip; 
        //"flight added to the trip successfully";
        // }
        //TODO: add exception if validation for requested flight fails
        
        
    }

    /**
     * Remove a flight from a trip.
     * 
     * @OA\Post(
     *      path="/removeFlight",
     *      operationId="removeTripFlight",
     *      tags={"Trips"},
     *      summary="Remove a Flight from a trip",
     *      description="Returns trip info",
            @OA\RequestBody(
                *       @OA\MediaType(
                *           mediaType="multipart/form-data",
                *           @OA\Schema(required={"trip_id", "flight_id", "departure_date"},
                            @OA\Property(property="trip_id", type="integer"),
                            @OA\Property(property="flight_id", type="integer"),
                            @OA\Property(property="departure_date", type="date", pattern= "/([0-9]{4})-(?:[0-9]{2})-([0-9]{2})/", example= "2021-05-17")
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
        $trip->flights()->where('flight_id',$request->flight_id)->where('departure_date', $request->departure_date)->update(['trip_flight.status' => 'Removed']);
        return $trip;
    }

 /**
     * Show available flight for a  trip.
     * 
     * @OA\Get(
     *      path="/searchTripFlight",
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
    *          example="Air Canada",
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

    private function flightArrivalDate(Trip $trip, $bookingFlightId, $bookingFlightDate) : string {

        // Get bookingFlight Info.
        $bookingFlightInfo = Flight::where('id', $bookingFlightId)->first();
        // get FlightArrivalDateTime
        $bookingFlightArrivalDate = $bookingFlightDate;

        // Find departure airport timezone
        $departureAirport = Airport::where('code', $bookingFlightInfo['departure_airport'])->first('timezone');
        date_default_timezone_set($departureAirport['timezone']);

        //local departure time At departure Airport
        $departureAirportLocalTime = new DateTime($bookingFlightDate.'T'.$bookingFlightInfo['departure_time']);

                // Find arrival airport timezone
                $arrivalAirport = Airport::where('code', $bookingFlightInfo['arrival_airport'])->first('timezone');


                // departure time at arrival airport local time
                $departureAtArrivalAirportLocalTime = $departureAirportLocalTime->setTimezone(new \DateTimeZone($arrivalAirport['timezone']));

                // Find arrive time at arrival airport local time
                date_default_timezone_set($arrivalAirport['timezone']);
                $arriveAtArrivalAirportLocalTime = new DateTime($bookingFlightDate.'T'.$bookingFlightInfo['arrival_time']);

                // Find the time interval or flight time
                $interval = new \DateInterval('PT1H');

                //create periods in hours
                $periods = new \DatePeriod($departureAtArrivalAirportLocalTime, $interval, $arriveAtArrivalAirportLocalTime);
                
                //The flight hours
                $diff = $arriveAtArrivalAirportLocalTime->getTimestamp() - $departureAtArrivalAirportLocalTime->getTimestamp();
                $flightTimeIntervalInHours = $diff / ( 60 * 60 );
  
        // TODO: vaidate connecting flight time conflict withen a trip and through and exception 
        // test throwed exception in negetive test
        // if(!$this->validateTimeConflict($trip, $departureAirportLocalTime, $departureAirport['timezone'])){
        //     throw new \App\Exceptions\MyStripeException($e);
        // }

        // Finding out the departure date 
        // if time interval is negetive arrival date will be next day.
        if($flightTimeIntervalInHours < 0){ 
            $flightDay = new DateTime($bookingFlightDate.'T'.'00:00:00');
            $flightDay->modify('+1 day');
            
            return  $flightDay->format('Y-m-d');
        }

        return  $bookingFlightDate;
    }

    /*
   // TODO: this function valdate to makesure the booking flight don't conflict the existing flights 
   //  by looking & comparing at latest flight arrival time at the arrival airport.

    private function validateTimeConflict(Trip $trip, $departureAirportLocalTime, $departureAirportTimezone) : bool {

        
        $flights = $trip->flights()->where('flights.status', 'Active')->get();
        // If no flight on the trip, valid to bok flight.
        if(count($flights)> 0 ){
            //find lattest arrival time of the latest flight
            $latestFlightArrivaDateTime = null;
            // loop throught the booked flights
            foreach( $flights as $flight){
                $i=0;
                
                // Find arrival airport timezone
                $arribalAirport = Airport::where('code', $flight['arrival_airport'])->first('timezone');
                date_default_timezone_set($arribalAirport['timezone']);
                $arrivalDateTime = new \DateTime($flight['flight_info']['arrival_date'].' '.$flight['arrival_time']);
                $arrivalAtArrivalAirportLocalTime = $arrivalDateTime->setTimezone(new \DateTimeZone($arribalAirport['timezone']));
                if ($i=0) {$latestFlightArrivaDateTime = $arrivalAtArrivalAirportLocalTime;}

                // Find the time interval or flight time
                $interval = new \DateInterval('PT1H');

                //create periods in hours
                $periods = new \DatePeriod($arrivalAtArrivalAirportLocalTime, $interval, $latestFlightArrivaDateTime);
                
                //The flight hours
                $diff = $latestFlightArrivaDateTime->getTimestamp() - $arrivalAtArrivalAirportLocalTime->getTimestamp();

                $flightTimeIntervalInHours = $diff / ( 60 * 60 );

                // uodate the latest time based on hours in negetive or positive number
                if($flightTimeIntervalInHours > 0){  
                    $latestFlightArrivaDateTime =  $arrivalAtArrivalAirportLocalTime;
                }
            }

            // departure time at departure airport local time of boking flight
            $departureAtdepartureAirportLocalTime = $departureAirportLocalTime->setTimezone(new \DateTimeZone($arribalAirport['timezone']));

            //create periods in hours
            $periods = new \DatePeriod($latestFlightArrivaDateTime, $interval, $departureAtArrivalAirportLocalTime);
            
            //The flight hours
            $diff = $latestFlightArrivaDateTime->getTimestamp() - $arrivalAtArrivalAirportLocalTime->getTimestamp();

            $flightTimeIntervalInHours = $diff / ( 60 * 60 );
            // find time diff between the lattest arrival time - booking flight deperture time
            if($flightTimeIntervalInHours < 0){  $latestFlightArrivaDateTime =  $arrivalAtArrivalAirportLocalTime;
            return false;
            }
        return true;
        }
    }
    
    
    }
 */
}