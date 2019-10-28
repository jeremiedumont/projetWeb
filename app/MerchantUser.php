<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MerchantUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'merchant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'mobile', 'addr', 'postalcode', 'city','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      public function getRememberToken ()
        {
            return $this->RememberToken;
    
        }
}
