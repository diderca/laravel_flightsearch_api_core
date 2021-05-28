
# laravel_api_core
Simple trip and flight booking api using sample data on Laravel 8.x framework.
 
 Version:
 PHP 7.3 +
 MySql 5.x
 Composer 2.x
 Laravel 8.x

 
## installation Steps:
Mack or linux user with Docker:
3. signup and install docker[https://hub.docker.com/search?offering=community&operating_system=mac&type=edition]
4. 
```sh
git clone https://github.com/diderca/laravel_api_core.git
cd laravel_api_core/laravel-app-core
./vendor/bin/sail up 
```

Windows User:
1. Download and install Laragon [https://github.com/leokhoa/laragon/releases/download/5.0.0/laragon-wamp.exe]
2. Open terminal !![image](https://user-images.githubusercontent.com/9303017/119930278-28090980-bf4d-11eb-84dd-15cdddc4585b.png)

3.Create database locally called: `laravel-app-core`
4.
```sh
cd C:\laragon\www
git clone https://github.com/diderca/laravel_api_core.git
cd laravel_api_core\laravel-app-core
composer update
php artisan migrete:fresh --seed
php artisan key:generate
```

