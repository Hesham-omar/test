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
        'name', 'email', 'password','phone'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($pass) {
        $this->attributes['password'] = bcrypt($pass);
    }

    /**
     * @param int $type
     */

    public function customer(){
        return $this->hasOne(customer::class);
    }

}
