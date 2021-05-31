
# laravel_api_core
Simple trip and flight booking api using sample data on Laravel 8.x framework.
 
 Version:
 PHP 7.3 +
 MySql 5.x
 Composer 2.x
 Laravel 8.x

 
## installation Steps:
Mack or linux user with Docker:

1. signup and install docker[https://hub.docker.com/search?offering=community&operating_system=mac&type=edition]

2. Run
```sh
https://github.com/diderca/laravel_flightsearch_api_core.git
cd laravel_api_core/laravel-app-core
./vendor/bin/sail up 
```

Windows User:
1. Download and install Laragon [https://github.com/leokhoa/laragon/releases/download/5.0.0/laragon-wamp.exe]
2. Open terminal !![image](https://user-images.githubusercontent.com/9303017/119930278-28090980-bf4d-11eb-84dd-15cdddc4585b.png)

3. Create database locally called: `laravel-app-core`

4. run
```sh
cd C:\laragon\www
https://github.com/diderca/laravel_flightsearch_api_core.git
cd laravel_api_core\laravel-app-core
composer update
php artisan migrete:fresh --seed
php artisan key:generate
```

Run the server :
```sh
php artisan serve

```
Starting Laravel development server: http://127.0.0.1:8000

Api Documentation : http://127.0.0.1:8000/documentation
Api link : http://127.0.0.1:8000
Routers:
// Airlines[http://127.0.0.1:8000/api/v1/airlines]
 
// Airports[http://127.0.0.1:8000/api/v1/airports]
 
// Flights[http://127.0.0.1:8000/api/v1/flights] 
// Trips[http://127.0.0.1:8000/api/v1/trips]
// AddFlight [http://127.0.0.1:8000/api/v1/AddFlight]
// RemoveFlight[http://127.0.0.1:8000/api/v1/RemoveFlight]

// Search Flight for a trip
// SearchTripFlight [http://127.0.0.1:8000/api/v1/SearchTripFlight]
