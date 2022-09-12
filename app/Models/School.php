<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->hasMany(Student::class , 'school_id');
    }

    public function canteen()
    {
        return $this->hasOne(Canteen::class , 'school_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class , 'school_id');
    }
}
