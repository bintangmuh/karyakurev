<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    //table 
    protected $table = 'admin';

    protected $guard = 'admin';

    protected $fillable = ['username', 'name','email', 'password'];
    protected $hidden = ['password'];
}
