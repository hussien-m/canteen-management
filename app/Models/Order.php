<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable  = ['price','quantity','student_id','canteen_id ','meal_id','school_id ','status','total','reservation_date'];
    protected $dates = [
        'created_at',
        'updated_at',
        'reservation_date',
    ];

    use HasFactory;

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id');
    }

    public function canteen()
    {
        return $this->belongsTo(Canteen::class , 'canteen_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class , 'school_id');
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class , 'meal_id');
    }



}
