<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Role extends Model
{
    protected $fillable = ['name'];
    protected $table = 'roles';
    public $timestamps = true;

    public function users()
    {
        return $this->belongsToMany(User::class,'user_roles');
    }

     public function hasPermissions($name)
    {
        return DB::table('roles_permissions')
                  ->where('role_id', $this->id)
                  ->where('permission',$name)
                  ->count();
    }
}
