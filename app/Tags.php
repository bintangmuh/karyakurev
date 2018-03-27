<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tag'];

    public function tag() {
		return $this->belongsToMany('App\Karya', 'tags_karya');
	}
}
