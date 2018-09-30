<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order;

class customer extends Model{
    protected $fillable = [
        'block', 'balance'
    ];
    public function orders(){
        return $this->hasMany(order::class);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
