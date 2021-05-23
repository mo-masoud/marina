@extends('layouts.app')

@section('content')

<div class="choose-login wow fadeInDownBig padding">
    
    @foreach($orders as $order)
    
        <div class="col-xs-12">
            <a href="{{ url('/invoice/'.$order->id) }}" class="notifiction">
                <div class="icon"><i class="fa fa-bell"></i></div>
                <div class="text">
                    <h3>الفاتورة رقم {{ $order->code_number }}</h3>
                    <p>{{ $order->name_bridal }}</p>
                </div>
            </a>
        </div>

    @endforeach
    
</div>
@endsection
