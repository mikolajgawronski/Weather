<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Http\Client\Factory as httpFactory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    protected DatabaseManager $manager;
    protected httpFactory $http;

    public function __construct(DatabaseManager $manager, httpFactory $http)
    {
        $this->manager = $manager;
        $this->http = $http;
    }

    public function run(): void
    {
        $numberOfCities = City::all()->count();
        $api_key  = "ef85c8eb58a752a0497dd7eedcf9e772";

        for ($i = 0; $i < $numberOfCities; $i++) {
            $city = City::query()->find($i+1)->pluck('name')[$i];
            $weather = $this->http->get("api.openweathermap.org/data/2.5/weather?q=$city&appid={$api_key}");

            $this->manager->table('weather')->insert([
                "main" => $weather["weather"][0]["main"],
                "description" => $weather["weather"][0]["description"],
                "temperature" => $weather["main"]["temp"]-273.15,
                "pressure" => $weather["main"]["pressure"],
                "humidity" => $weather["main"]["humidity"],
                "visibility" => $weather["visibility"]/1000,
                "wind_speed" => $weather["wind"]["speed"],
                "city_id" => $i+1,
            ]);
        }
    }
}
