@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
	<div class="logo">
    	<img src="{{ url('images/singer.png') }}" alt="" />
        	<span class="text-grad">{{ trans('front.site_title') }}</span>
        <!--<img src="{{ url('images/logo/text-logo-black.png') }}" alt="" />-->
    </div>
</div>
@php
Request()->session()->put('company_r_type', 'marina');
Request()->session()->put('contract_print_type',  'marina');

@endphp
<div class="choose-login">
  <a href="{{ url('booking/step2') }}" class="btn-style nextPage animation-div">{{ trans('front.booking') }}</a>
  <a href="{{ url('contract') }}" class="btn-style nextPage animation-div">{{ trans('front.edit') }}</a>
  <a href="{{ url('contract/print') }}" class="btn-style nextPage animation-div">{{ trans('front.print') }}</a>
</div>

@endsection
