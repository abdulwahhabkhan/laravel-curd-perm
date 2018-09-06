<?php

namespace App\Http\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected  $fillable = ['description', 'customer_id', 'created_by', 'amount'];

    public  function customer()
    {
        return $this->belongsTo('App\Http\Models\Sales\Customer');
    }
}
