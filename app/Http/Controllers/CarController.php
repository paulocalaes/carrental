<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    public function index()
    {
        return Car::all();
    }
 
    public function show(Car $car)
    {
        return $car;
    }

    public function store(Request $request)
    {
        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    public function update(Request $request, Car $car)
    {
        $car->update($request->all());
        return response()->json($car, 200);
    }

    public function delete(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}
