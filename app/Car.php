<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['make', 'model','owner','description', 'horsepower', 'number_of_doors', 'number_of_seats', 'transmission', 'fuel', 'video' ];
}
