<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $city = City::query()->get();

        return view("cities", [
            "city" => $city,
        ]);
    }
}
