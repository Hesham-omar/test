<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\item;
use App\bill;
use App\customer;

class order extends Model {

    public function customer(){
        return $this->belongsTo(customer::class);
    }

    public function items(){
        return $this->belongsToMany(item::class)->withPivot('amount');
    }

    public function bill(){
        return $this->hasOne(bill::class);
    }

}
