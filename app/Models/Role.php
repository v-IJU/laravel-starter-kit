<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable = ['name','slug'];

    public function permissions(){
        return $this->belongsTomany(Permission::class,'roles_permissions');
    }

    public function users(){
        return $this->belongsTomany(User::class,'users_roles');
    }
    const WEEK_DAYS=[
    	'0'=>'Monday',
    	'1'=>'Tuesday',
    	'2'=>'Wednesday',
    	'3'=>'Thursday',
    	'4'=>'Friday',
    	'5'=>'Saturday',
    	'6'=>'Sunday'

    ];
}
