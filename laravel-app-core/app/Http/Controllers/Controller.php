<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Laravel 8.x Trip Builder Demo API Documentation",
     *      description="using zircote swagger-php OpenApi documentation",
     *      @OA\Contact(
     *          email="shdcse@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url="http://localhost/api/v1",
     *      description="Demo Trip Builder API Server v1.0"
     * )

     *
     * @OA\Tag(
     *     name="Flight Search and Trip Builder",
     *     description="Flight Search and Trip Builder API Endpoints of Projects"
     * )
     */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
