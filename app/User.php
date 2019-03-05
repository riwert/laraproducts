<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany('App\Products');
    }

    public function setFromRequest()
    {
        $this->name = request('name');
        $this->email = request('email');
    }

    public function setNewPasswordFromRequest()
    {
        $this->password = bcrypt(request('new_password'));
    }

    public function isAdmin()
    {
        return $this->id == 1;
    }
}
