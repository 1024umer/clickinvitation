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
        'id', 'ban', 'name', 'surname', 'email', 'role', 'confirmation_code', 'language', 'remember_token', 'active', 'password', 'last_login', 'ip', 'created_at', 'updated_at',
    ];


    /**
     * Get the pdfs of the user
     */
    public function pdfs()
    {
        return $this->hasMany('App\Preventivo', 'user_id');
    }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id';
}
