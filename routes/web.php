<?php

declare(strict_types=1);

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Routing\Router;

/** @var Router $router */
$router = app()->make(Router::class);

$router->get("/", [CityController::class, "index"])->name("home");
$router->get("/create", [CityController::class, "create"]);
$router->get("/dupa", [CityController::class, "dupa"]);
$router->post("/create", [CityController::class, "store"])->name("create.store");
$router->get("/{id}", [WeatherController::class, "index"]);
