<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class State extends Model {

	use Translatable;
	protected $translatable = ['name'];

	public function cities(){
	return $this->hasMany('App\Models\City');
	}
	
	public function country(){
	    return $this->belongsTo('App\Models\Country');
	}

}