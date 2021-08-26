<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function index($id)
    {
        $weather = Weather::where("city_id", $id)->with("city")->get();

        return view("weather", [
            "weather" => $weather,
        ]);
    }
}
