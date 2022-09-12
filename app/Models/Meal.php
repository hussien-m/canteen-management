<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function canteen()
    {
        return $this->belongsTo(Canteen::class ,'canteen_id');
    }

    public function images()
    {
        return $this->hasMany(MealImage::class , 'meal_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class , 'meal_id');
    }
}
