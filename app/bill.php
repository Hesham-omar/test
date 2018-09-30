<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\order;
class bill extends Model
{
    protected $fillable = [
        'totalPrice'
    ];
    protected $defaults = [
        'fees' => 0.14,
    ];

    public function order(){
        return $this->belongsTo(order::class);
    }
}
