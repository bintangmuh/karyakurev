<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //table 
    protected $table = 'admin';

    protected $fillable = ['username', 'name','email', 'password'];
    protected $hidden = ['password'];
}
