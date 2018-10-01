<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\order;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int block
 * @property mixed user_id
 * @property mixed balance
 */
class customer extends Model{
    public $timestamps = false;
    protected $fillable = [
        'block', 'balance'
    ];

    /**
     * customer constructor.
     */
    public function __construct() {
        $this->block=0;
    }

    public function orders(){
        return $this->hasMany(order::class);
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
