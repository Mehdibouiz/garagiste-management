<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'type',
        'registration number',
        'photo',
    ];

    public function gestionVoiture()
    {
        $cars = Car::all();

        return view('gestionVoiture', compact('cars'));
    }
}
