<?php

namespace App;

use App\Traits\HasDataTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mockery\Exception;

class User extends Authenticatable
{
    use Notifiable, HasDataTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'data'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setDataAttribute($value) {
        $this->attributes['data'] = json_encode($value);
    }

    public function getDataAttribute($value) {
        return json_decode($value);
    }
}
