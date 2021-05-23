<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ConditionMsingerCompany extends Model
{
    use Translatable;
	protected $translatable = ['condition'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
