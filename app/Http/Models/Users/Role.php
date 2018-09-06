<?php

namespace App\Http\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $fillable = ['name','permission', 'status'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
