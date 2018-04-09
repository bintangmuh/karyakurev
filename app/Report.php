<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable  = ['alasan', 'pelapor', 'karya_id'];

    public function karya()
    {
    	return $this->belongsTo('App\Karya', 'karya_id', 'id');
    }
}
