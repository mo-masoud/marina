<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['from', 'to', 'subject' ,'message','message_model','receiver_model','sender_model'];

    public function sender()
    {     
         if($this->message_model == 'user'){
            return $this->belongsTo('App\User' , 'from');
         }else{
            return $this->belongsTo('App\Models\Modrator' , 'from');
         }
         
    }

  
    public function reciever()
    {
        if($this->message_model == 'user'){
           return $this->belongsTo('App\User' , 'to');
         }else{
            return $this->belongsTo('App\Models\Modrator' , 'to');
         }
          
    }

}
