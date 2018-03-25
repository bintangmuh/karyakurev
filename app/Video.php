<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = ['youtube_url'];

    public function karya()
    {
    	return $this->belongsTo('App\Karya');
    }
}
