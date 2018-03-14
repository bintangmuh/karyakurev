<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = "karya";

	public function gallery() {
		return $this->hasMany('App\Gallery', 'karya_id');
	}

	public function video() {
		return $this->hasMany('App\Video', 'karya_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
}
