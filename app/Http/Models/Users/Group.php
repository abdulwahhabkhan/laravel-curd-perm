<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'user_groups';
    public $fillable = ['name','description', 'view_permission', 'update_permission'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
