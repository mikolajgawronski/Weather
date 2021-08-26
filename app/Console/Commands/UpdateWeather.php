<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\City;
use App\Models\Weather;
use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Client\Factory as httpFactory;

class UpdateWeather extends Command
{
    protected $signature = "UpdateWeather";

    protected $description = "Updates the weather table";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(httpFactory $http, DatabaseManager $manager): void
    {
        Weather::query()->delete();

        $numberOfCities = City::all()->count();
        $api_key  = "ef85c8eb58a752a0497dd7eedcf9e772";

        for ($i = 0; $i < $numberOfCities; $i++) {
            $city = City::query()->find($i+1)->name;
            $weather = $http->get("api.openweathermap.org/data/2.5/weather?q=${city}&appid={$api_key}");

            $manager->table("weather")->insert([
                "main" => $weather["weather"][0]["main"],
                "description" => $weather["weather"][0]["description"],
                "temperature" => $weather["main"]["temp"] - 273.15,
                "pressure" => $weather["main"]["pressure"],
                "humidity" => $weather["main"]["humidity"],
                "visibility" => $weather["visibility"] / 1000,
                "wind_speed" => $weather["wind"]["speed"],
                "city_id" => $i + 1,
            ]);
        }
    }
}
