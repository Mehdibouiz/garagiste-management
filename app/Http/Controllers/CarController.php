<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function gestionVoiture()
    {
        $cars = Car::all();

        return view('gestionVoiture')->with('cars', $cars);
    }

    public function addCar(Request $request)
    {
        $car = new Car();
        $car->brand = $request->input('marque');
        $car->model = $request->input('modele');
        $car->type = $request->input('carburant');
        $car->registration_number = $request->input('immatriculation');
        $car->photo = $request->input('photo');
        $car->save();

        return redirect()->route('gestionVoiture')->with('success', 'Car added successfully.');
    }

    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('gestionVoiture')->with('success', 'Car deleted successfully.');
    }

    public function updateCar(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->brand = $request->input('marque');
        $car->model = $request->input('modele');
        $car->type = $request->input('carburant');
        $car->registration_number = $request->input('immatriculation');
        $car->photo = $request->input('photo');
        $car->save();

        return redirect()->route('gestionVoiture')->with('success', 'Car updated successfully.');
    }
}
