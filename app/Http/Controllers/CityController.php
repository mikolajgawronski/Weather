<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view("create");
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->save();
        return redirect("/")->with("message", "City added");
    }
}
