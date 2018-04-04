<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table = 'prodi';
    protected $fillable = ['fakultas', 'nama'];

   	public function mahasiswa() {
   		return $this->hasMany('App\User', 'prodi_id', 'id');
   	}
}
