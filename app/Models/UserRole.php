<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'users_roles';
    protected $guarded = [];

    public function roleUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
