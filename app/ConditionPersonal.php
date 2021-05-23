<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ConditionPersonal extends Model
{
    use Translatable;
	protected $translatable = ['condition'];
}
