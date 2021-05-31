<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use DateTime;
use DateTimeZone;
class TripControllerTest extends TestCase
{
    /**
     *Flights Routes tests.
     *
     * @return void
     */
    public function testflightsRoute()
    {
        $response = $this->get('api/v1/flights');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                    "id",
                    "airline",
                    "number",
                    "departure_airport",
                    "departure_time",
                    "arrival_airport",
                    "arrival_time",
                    "price",
                    "status",
                    "created_at",
                    "updated_at"
                ]
        ]);
    }
    
    /**
     *Flights Routes tests.
     *
     * @return void
     */
    public function testAirlinesRoute()
    {
        $response = $this->get('api/v1/airlines');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                    "id",
                    "name",
                    "code",
                    "status",
                    "created_at",
                    "updated_at"
                ]
        ]);

    }
    
    /**
     *Flights Routes tests.
     *
     * @return void
     */
    public function testAirportsRoute()
    {
        $response = $this->get('api/v1/airports');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                    "id",
                    "name",
                    "code",
                    "city",
                    "city_code",
                    "country_code",
                    "region_code",
                    "latitude",
                    "longitude",
                    "timezone",
                    "status",
                    "created_at",
                    "updated_at"
                ]
        ]);

    }
    
    
    /**
     *Flights Routes tests.
     *
     * @return void
     */
    public function testTripsRoute()
    {
        $response = $this->get('api/v1/trips');

        $response->assertStatus(200);
    }

    // Trips
    
    /**
     *Store a Flights trip test route on Post request.
     *
     * @return void
     */
    public function testAddTripsRoute()
    {
      
        $response = $this->post('/api/v1/trips', ['user_id' => '1','from_city' => 'Torornto','to_city' => 'Montreal','type' => 'Return']);
        $response->assertStatus(201);

    }
    
    /**
     * SearchTripFlight Routes tests Search Flight for a trip
         * @return void
     */
    public function testSearchTripFlightRoute()
    {
        $response = $this->call('GET','api/v1/searchTripFlight', ['trip_id' => '1','tripType' => 'Round','airline' => 'Air Canada']);

         $response->assertStatus(200);
    }
    
    /**
     *Add Flights Routes tests.
     *
     * @return void
     */
    public function testAddFlightRoute()
    {
        $response = $this->post('api/v1/addFlight', ['trip_id' => '1','flight_id' => '1','flight_date' => '2021-05-21']);

        $response->assertStatus(200);
    }
      
    /**
     * TODO: Negetive test can not add flights with conflict of time considering timezone.
     *
     * @return void
     */
    // public function testAddFlightRouteTimeConflict()
    // { }

    
    /**
     *RemoveFlight Routes tests.
     *
     * @return void
     */
    public function testRemoveFlightRoute()
    {
        $response = $this->post('api/v1/removeFlight', ['trip_id' => '1','flight_id' => '1','flight_date' => '2021-05-21']);

        $response->assertStatus(200);
    }


}
