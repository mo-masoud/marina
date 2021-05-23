@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
	<div class="singer-img">
    	<img src="{{ Voyager::image( session('singer')->avatar )}}" alt="{{ session('singer')->name }}">
    </div>
</div>

@php
Request()->session()->put('company_r_type', 'singer');
@endphp

<div class="choose-login">
	<a href="{{ url('singer/persons') }}" class="btn-style nextPage animation-div">
      {{ trans('front.personal_login') }}
      </a>
	<a href="{{ url('/booking/marina/companies') }}" class="btn-style nextPage animation-div">
      {{ trans('front.companies_login') }}
    </a>
</div>

@endsection
