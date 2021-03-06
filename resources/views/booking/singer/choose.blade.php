@extends('layouts.app')

@section('content')
<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
        	<!--<li><img src="{{ url('images/singer.png') }}" alt=""></li>-->
         <!--   <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>-->

        </ul>
        <h1 class="border-grad"> 
            @if($singer->gender == 0)
                اسم المطرب
            @else
                اسم المطربة
            @endif
         </h1>
    </div>
</div>
@php
Request()->session()->put('contract_print_type',   $singer->id);
@endphp

<div class="form-style animation-fast">
    <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            <img src="{{ Voyager::image( $singer->avatar )}}" alt="{{ $singer->name }}">
        </div>
    </div>

    <div class="col-xs-12 wow animation-div" style="visibility: visible;">
        <a href="{{ url('singer/booking') }}" class="nextPage">{{ trans('front.booking') }}</a>
    </div>

    <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('contract') }}" class="nextPage">{{ trans('front.edit') }}</a>
    </div>

    <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
        <a href="{{ url('contract/print') }}" class="nextPage">{{ trans('front.print') }}</a>
    </div>

</div>

@endsection