<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grooms;

class Order extends Model {

	protected $fillable = [
		'number_bridal', 'bank_id','permits','name_bridal', 'identity', 'birthday','music','final_submit', 'nationality', 'identity_source',
        'identity_image', 'email_address', 'phone_bridal', 'singer_gender', 'singer_name', 'singer_name_optional', 'code_number', 'carol_type',
         'hejry_date', 'date', 'hotel_name', 'start_time', 'end_time', 'street_name', 'company_type', 'company_name', 'commercial_registration_no',
          'company_owner_name', 'registration_id_number', 'director_name', 'price', 'concert', 'order_type', 'hall_id', 'user_id', 'country_id', 'city_id', 'state_id', 'tune_id',
         'occasion_id',
          'rhythms',
           'machines',
            'contacts',
             'agreements', 
             'approved', 'singer_id', 'prmits', 'reason_of_edit', 'new_date', 'closed', 'delied','canceled','provided_by_marina','day','extra_hour_price','is_done',
	];

	protected $casts = [
		'rhythms'    => 'array',
		'machines'   => 'array',
		'agreements' => 'array',
		'contacts'   => 'array',
	];

	public function scopeCurrentSinger($query) {

		if (request('new_date')) {
			$query->where('new_date', '!=', null);
		}

		if (request('closed')) {
			$query->where('closed', '!=', null);
		}

		if (request('canceled')) {
			$query->where('canceled', '!=', null);
		}

		if (auth()->user()->hasRole('singer')) {
			return $query->where('singer_id', auth()->user()->id);
		} elseif (auth()->user()->hasRole('moderator')) {
			return $query->where('singer_id', auth()->user()->singer_id);
		} else {
			return $query;
		}

	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
	


	public function singer() {
		return $this->belongsTo('App\User', 'singer_id', 'id');
	}

	public function states() {
		return $this->hasOne('App\Models\State','id','state_id');
	}

	public function hall() {
		return $this->hasOne('App\Models\Halls','id','hall_id');
	}

	public function occasions() {
		return $this->hasOne('App\Models\Occasion','id','occasion_id');
	}

	public function country() {
		return $this->belongsTo('App\Models\Country');
	}
	public function nationality() {
		return $this->belongsTo('App\Nationality','nationality');
	}
	public function ordernationality() {
		return $this->belongsTo('App\Nationality','nationality');
	}

	public function city() {
		return $this->belongsTo('App\Models\City');
	}

	public function remittance() {
		return $this->hasOne('App\Models\Remittance');
	}

	public function condition_id() {
		return $this->hasOne('App\Models\Condition');
	}

	public function tune() {
		return $this->hasMany('App\Models\Tune');
	}

	public function contacts() {
		return $this->hasMany('App\Models\Contact');
	}
	
	
	public function grooms(){


	    return $this->hasMany(Grooms::class);
    }

        
    public static function boot()
    {
        parent::boot();

        static::updated(function ($order){
            if($order->approved == 1&&$order->delied!=1&&$order->canceled!=1&&$order->closed!=1){
                
                $mobile = User::find($order->user_id)->phone;
// $message = "عزيري العميل لقد تم تأكيد حفلكم الكريم نأمل طباعة العقد الخاص من موقع مارينا الغربيه حيث أن رقم عقدكم هو ".$order->code_number." وشكرا لحسن تعاونكم معنا..";
$message = "عزيري العميل لقد تم تأكيد حفلكم الكريم نأمل طباعة العقد الخاص بكم من موقع مارينا الغربيه حيث أن رقم عقدكم هو ".$order->code_number." وشكرا لحسن تعاونكم معنا..";
                
                
                       $client = new \GuzzleHttp\Client();
    $request = $client->get("http://api.unifonic.com/wrapper/sendSMS.php?userid=Marinmusic2030@gmail.com&password=Hussain@123&msg=".$message."&sender=MARINA&to=".$mobile."");
    $response = $request->getBody();
   $response =  (explode("<br />",$response));
      return substr($response[0], -1) == "0" ? true : false ;
            }
        });
    }
    

    
}