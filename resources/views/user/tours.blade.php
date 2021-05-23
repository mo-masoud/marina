@extends('layouts.app')

@section('header')
<span>فـرقــة مــاريـنـــا الـغــربـيـــة</span>
@endsection

@section('content')





<div class="tabs-style animation-div">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#accredited">الحفلات المعتمدة</a></li>
        <li><a data-toggle="tab" href="#done">الحفلات المنفذة</a></li>
        <li><a data-toggle="tab" href="#postponed">الحفلات المؤجله</a></li>
        <li><a data-toggle="tab" href="#cancel">الحفلات الملغية</a></li>

    </ul>
    <div class="tab-content">
        <div id="done" class="tab-pane fade in active">
            
            

            
              @foreach ($orders->where('is_done',1) as $order)
                
                        
                        
                        
                        
                        
                        
                        
                        
              @php
              
              
                
                /*$theDate    = new DateTime($order->date);
                $stringDate = $theDate->format('m-d-y');
                $delayDate=new DateTime($order->new_date);
                $delayDateY=$delayDate->format('y');
                $delayDatem=$delayDate->format('m');
                $delayDated=$delayDate->format('d');

                $delay=Hijri2Greg($delayDated, $delayDatem, $delayDateY,true);

               $theDate=new DateTime($order->date);
            $delay=(new DateTime($order->new_date))->format('m-d-y');

            $stringDate=$theDate->format('m-d-y');
            */
                @endphp
                {{--@if( $stringDate < date('m-d-y') && $order->canceled!=1&& $order->approved==1  || $stringDate<date('m-d-y') ) --}}
                
                
                @if($order->canceled!=1&& $order->approved==1)
                    <div class="col-xs-12">
                        <a href="{{'/contract/print-singer/'.$order->code_number}}" class="notifiction">
                            <div class="icon"><i class="fa fa-music"></i></div>
                            <div class="text">
                                <h3>العريس :- {{ $order->name_bridal ?  $order->name_bridal : \App\User::find($order->user_id)->name }}</h3>
                                <p>{{ $order->phone_bridal }}</p>
                            </div>

                            <div>
                                {{$order->code_number}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
           
        </div>
        <div id="cancel" class="tab-pane fade">
          
                @foreach ($orders as $order)
               
                @if( $order->canceled == 1)
                    <div class="col-xs-12">
                        <a href="{{'/contract/print-singer/'.$order->code_number}}" class="notifiction">
                            <div class="icon"><i class="fa fa-music"></i></div>
                            <div class="text">
                                <h3>العريس :- {{ $order->name_bridal ?  $order->name_bridal : \App\User::find($order->user_id)->name }}</h3>
                                <p>{{ $order->phone_bridal }}</p>
                            </div>

                            <div>
                                {{$order->code_number}}
                            </div>
                        </a>
                        
                            <div class="delete-form" style="margin-bottom:10px;">
                            <form action="{{route('DeleteOrder',$order->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-danger">Delete</button>
                            </form>            
                                                    
                            </div>

                        
                        
                        
                    </div>
   
                @endif
            @endforeach
          

      
        </div>
        <div id="postponed" class="tab-pane fade">
                
                @php
                $delied = \App\Models\Order::where('delied',1)->where('singer_id',auth()->user()->id)->get();
                   
                @endphp

                @foreach($delied as $order)
                    @php

                        $theDate=new DateTime($order->new_date);

         $stringDate=$theDate->format('m-d-y');

                    @endphp




                    
                    <div class="col-xs-12">
                        <a href="{{'/contract/print-singer/'.$order->code_number}}" class="notifiction">
                            <div class="icon"><i class="fa fa-music"></i></div>
                            <div class="text">


                                <h3>العريس :- {{ $order->name_bridal ?  $order->name_bridal : \App\User::find($order->user_id)->name }}</h3>
                                <p>{{ $order->phone_bridal }}

                                </p>
                            </div>

                            <div>
                                {{$order->code_number}}
                            </div>
                        </a>      </div>

                
            @endforeach



        </div>
  <div id="accredited" class="tab-pane fade">
      
      
         @foreach($orders as $order)
                @php

                $theDate=new DateTime($order->date);
              
 $stringDate=$theDate->format('m-d-y');
 
                @endphp
            @if($order->approved==1&& $order->canceled!=1)
                @if( $stringDate>= date('m-d-y'))
                    <div class="col-xs-12">
                        <a href="{{'/contract/print-singer/'.$order->code_number}}" class="notifiction">
                            <div class="icon"><i class="fa fa-music"></i></div>
                            <div class="text">
                                <h3>العريس :- {{ $order->name_bridal ?  $order->name_bridal : \App\User::find($order->user_id)->name }}</h3>
                                <p>{{ $order->phone_bridal }}</p>
                            </div>

                            <div>
                                {{$order->code_number}}
                            </div>
                        </a>
                    </div>
                @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
    
@endsection