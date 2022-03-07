<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Weather;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Client\Factory as httpFactory;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function index($id): View
    {
        $weather = Weather::where("city_id", $id)->with("city")->get();

        return view("weather", [
            "weather" => $weather,
        ]);
    }

    public static function store($name, httpFactory $http, DatabaseManager $manager): void
    {
        $city = City::query()->where("name", $name)->pluck("id")[0];
        $weather = $http->get("api.openweathermap.org/data/2.5/weather?q=${name}&appid=".env('WEATHER_API_TOKEN'));

        $manager->table("weather")->insert([
            "main" => $weather["weather"][0]["main"],
            "description" => $weather["weather"][0]["description"],
            "temperature" => $weather["main"]["temp"] - 273.15,
            "pressure" => $weather["main"]["pressure"],
            "humidity" => $weather["main"]["humidity"],
            "visibility" => $weather["visibility"] / 1000,
            "wind_speed" => $weather["wind"]["speed"],
            "city_id" => $city,
        ]);
    }
}
