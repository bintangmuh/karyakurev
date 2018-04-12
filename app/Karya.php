<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{

	use SoftDeletes;
	
    protected $table = "karya";

	public function gallery() {
		return $this->hasMany('App\Gallery', 'karya_id');
	}

	public function videos() {
		return $this->hasMany('App\Video', 'karya_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id')->withTrashed();
	}

	public function tags() {
		return $this->belongsToMany('App\Tags', 'tags_karya');
	}
}
