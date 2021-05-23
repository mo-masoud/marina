<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Complain extends Model {

	

	protected $fillable = ['name', 'phone', 'sort', 'text', 'image' ];



}