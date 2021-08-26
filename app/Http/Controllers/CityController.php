<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Client\Factory as httpFactory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    protected DatabaseManager $manager;
    protected httpFactory $http;

    public function __construct(DatabaseManager $manager, httpFactory $http)
    {
        $this->manager = $manager;
        $this->http = $http;
    }

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

        WeatherController::store($request->name,$this->http,$this->manager);

        return redirect("/")->with("message", "City added");
    }
}
