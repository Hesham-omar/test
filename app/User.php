<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\customer;


/**
 * @property int type
 * @property mixed password
 * @property mixed phone
 * @property mixed name
 * @property mixed email
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * User constructor.
     * @param int $type
     * @internal param array $attributes
     */
    public function __construct($type=0) {
        $this->type=$type;
    }

    protected $fillable = [
        'name', 'email', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($pass) {
        $this->attributes['password'] = bcrypt($pass);
    }

    public function getCreatedAtAttribute($date) {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    /**
     * @param int $type
     */

    public function customer(){
        return $this->hasOne(customer::class);
    }

}
