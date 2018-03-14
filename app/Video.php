<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';

    public function karya()
    {
    	return $this->belongsTo('App\Karya');
    }
}
