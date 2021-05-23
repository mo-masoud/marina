@extends('layouts.app')

@section('header')

 <span>@lang('front.site_title')</span>

@endsection

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <!--<div class="title title-singer">-->
    <!--    <ul>-->
    <!--    	<li><img src="images/singer.png" alt="" /></li>-->
    <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
    <!--    </ul>-->


    @php
        $modrator =\App\Models\Modrator::find(auth("moderator")->user());
        
        $user =\App\User::where('id',$modrator->first()->user_id)->first();
        
        @endphp



    <div class="logo singer title title-singer">
       
       {{-- <img src="{{url('storage/'.$user->avatar)}}" alt="" /> --}}
       
        {{--<img src="images/singer.png" alt="" /> --}}

        <h1 class="border-grad">{{trans('front.moderator')}} {{$modrator[0]->name}}</h1>
    </div>
</div>
<div class="col-xs-12">
<div class="contract box two wow animatio wow animation-div">
    <table class="display orders" style="width:100%">
        <thead>
            <tr>
                <th>{{ trans('front.order_type') }}</th>
                <th>{{ trans('front.code_number') }}</th>
                <th>{{ trans('front.date') }} </th>
                <th>{{ trans('front.hejry_date') }} </th>
                <th>{{ trans('front.status') }} </th>
                <th>{{ trans('front.permission') }} </th>
            </tr>
        </thead>
        <tbody>
          
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_type }}</td>



                <td><a href="moderator/order/{{$order->id}}">{{ $order->code_number }}</a></td>
                <td>{{ $order->date }}</td>
                <td>{{ $order->hejry_date }}</td>
                <td>@if($order->closed == '1') مغلق
                @elseif($order->canceled == '1') ملغي
                @elseif($order->delied == '1') مؤجل    
                @elseif($order->approved == '1') {{ trans('front.deposited') }} 
                @elseif($order->approved == '2') تحت المراجعة 
                
                
                @else {{ trans('front.pending') }} @endif
                
                
                </td>
                <td>
                  <a href="{{ url('moderator/order/'.$order->id) }}" class="btn"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</div>
</div>
@endsection

@push('js')
<script type="text/javascript">
$(document).ready(function() {
       $('.orders').DataTable();
} );
</script>

@endpush