<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order;

/**
 * @property mixed name
 * @property mixed price
 * @property mixed category_id
 */
class item extends Model
{
    protected $fillable = [
        'name', 'price', 'item_type'
    ];

    public function orders(){
        return $this->belongsToMany(order::class);
    }

    public function category(){
        return $this->belongsTo(category::class);
    }



}
