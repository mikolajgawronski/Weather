<?php

declare(strict_types=1);

use App\Http\Controllers\CityController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app()->make(Router::class);

$router->get("/", [CityController::class, "index"])->name("home");


