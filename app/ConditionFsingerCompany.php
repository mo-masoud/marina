<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ConditionFsingerCompany extends Model
{
    use Translatable;
	protected $translatable = ['condition'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
