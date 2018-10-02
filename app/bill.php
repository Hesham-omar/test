<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order;
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
