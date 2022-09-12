<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
    ];

    //protected $notFoundMessage = 'The book could not be found';

    public function school()
    {
        return $this->belongsTo(School::class , 'school_id');
    }

    public function meals()
    {
        return $this->hasMany(Meal::class , 'canteen_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class , 'canteen_id');
    }
}
