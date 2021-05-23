<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class ConditionFsinger extends Model
{
    use Translatable;
	protected $translatable = ['condition'];
}
