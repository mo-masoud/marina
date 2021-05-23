@extends('layouts.app')

@section('header')

 <span>فـرقــة مــاريـنـــا الـغــربـيـــة</span>

@endsection

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <!--<div class="title title-singer">-->
    <!--    <ul>-->
    <!--    	<li><img src="images/singer.png" alt="" /></li>-->
    <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
    <!--    </ul>-->


    @php
        $avatar=auth()->user()->avatar;
    @endphp



    <div class="logo singer title title-singer">
        @if(auth()->user()->role_id==4)
        <img src="{{url('storage/'.Auth::user()->avatar)}}" alt="" />
        @else

        <img src="images/singer.png" alt="" />
        @endif
        <h1 class="border-grad">الجداول والعقود</h1>
    </div>
</div>
<div class="col-xs-12">
<div class="contract box two wow animatio wow animation-div">
     @if(Auth::user()->role_id == 4)
        <form action="{{route('deleteOrders')}}" method="post">
            @csrf
          

            <button class="btn btn-danger">حذف</button>
          @endif
    <table class="display tableExample" style="width:100%">
        <thead>
            <tr>
                <th>التاريخ</th>
                <th>رقم العقد</th>
                <th>إسم مرسل العربون</th>
                <th>الدولة </th>
                <th>المدينة</th>
                @if(Auth::user()->role_id == 4)
                <th>نحديد</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->date }}</td>


@if(auth()->guard('web')->check())
    @if(auth()->user()->role_id==4)
                        <td><a href="/contract/print-singer/{{$order->code_number}}">{{ $order->code_number }}</a></td>
@else <td><a href="/contract/{{$order->code_number}}">{{ $order->code_number }}</a></td>
                    @endif

                @endif
         <td>{{ $order->remittance->sender_name ?? 'لم يتم تحديده' }}</td>
                <td>{{ $order->country->name ?? 'غير معروف' }}</td>
                <td>{{ $order->city->name ?? 'غير معروف' }}</td>
               
               @if(Auth::user()->role_id == 4)
                <td>
                    <input class="form-control" type="checkbox" class="ids" name="ids[]" value="{{$order->id}}">
                    </td>
                    @endif
               
            </tr>
            @endforeach
        </tbody>
    </table>
     @if(Auth::user()->role_id == 4)
    </form>
    @endif
</div>
</div>

@endsection

@push('js')
<script type="text/javascript">
$(document).ready(function() {
       $('.tableExample').DataTable();
} );

$('.ids').on('change',function(){
    
    if($(this).is(':checked')){
       console.log($('.ids').val());
    }
    
    
});


</script>

@endpush