<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Http\Models\Users\Role', 'role_id');
    }

    static function getUsers($per_page=10){
        return \DB::table('users')->leftJoin('roles', 'users.role_id','=','roles.id')->select('users.*', 'roles.permission', 'roles.name as role_name')->paginate($per_page);
    }

}
