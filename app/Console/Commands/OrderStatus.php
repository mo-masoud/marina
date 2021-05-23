<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class OrderStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Im Here For Test';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        
         $orders = DB::table('orders')->where('approved',1)->where('canceled',0)->get();
         
            foreach($orders as $item){
                
               if(strtotime($item->date) - strtotime(date('Y-m-d')) <1){
                   
                   if((strtotime($item->end_time)-7300) - strtotime("now") < 1 ){
                   DB::table('orders')->where('id',$item->id)->update([
                       'is_done'=>1
                       ]);
                   }
                   
               }
                
                
            }

         
       
        
        return "done" ;
    }
}

