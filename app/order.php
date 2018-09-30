<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\item;
use app\bill;
use app\customer;

class order extends Model
{

    public function customer(){
        return $this->belongsTo(customer::class);
    }
    public function items(){
        return $this->hasMany(item::class);
    }
    public function bill(){
        return $this->hasOne(bill::class);
    }
}
