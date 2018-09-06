<?php

namespace App\Http\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','address','email','phone'];
}
