@extends('layouts.app')

@section('header')

 <span>@lang('front.site_title')</span>

@endsection

@section('content')

<div class="logo wow fadeInDownBig">

    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
    <div class="singer-img">
		@if(auth()->check('web'))
	<img src="{{ url('storage/'.Auth::user()->avatar) }}" alt="" />

			@else
			<img src="{{ url('storage/'.App\User::find(Auth::user()->user_id)->avatar) }}" alt="" />
		@endif
    </div>

    @else
    	<img src="images/singer.png" alt="" />

    @endif
       {{-- @if(Auth::user()->role_id == 1)

        <h2 style="color:#C39438">جارى تحويلك لصفحة الأدمن ...</h2>
    @endif--}}
		@if(Auth::guard('web')->user()->role_id == TCG\Voyager\Models\Role::whereName('singer')->firstOrFail()->id)

@else


@endif
    <!--	<span class="text-grad">@lang('front.site_title')</span>
	<img src="images/logo/text-logo.png" alt="" />  -->


	<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
		<div class="title other">
			<h1 class="border-grad">@if(Auth::user()->role_id == TCG\Voyager\Models\Role::whereName('singer')->firstOrFail()->id ){{-- @lang('front.singers_andfemalesingers')--}}    {{auth()->user()->name}}@elseif(Auth::user()->role_id == TCG\Voyager\Models\Role::whereName('user')->firstOrFail()->id) @lang('front.customers') @endif</h1>
		</div>
	</div>

</div>
@if(Auth::guard('web')->user()->role_id == TCG\Voyager\Models\Role::whereName('user')->firstOrFail()->id)
	<div class="choose-login">
		<a href="{{ url('booking/marina') }}" class="btn-style nextPage animation-div">@lang('front.order_from_marina')</a>
		<a href="{{ url('booking/singer_personal/female') }}" class="btn-style nextPage animation-div">@lang('front.order_from_singer_female_personal')</a>
		<a href="{{ url('booking/singer_personal/male') }}" class="btn-style nextPage animation-div">@lang('front.order_from_singer_personal')</a>
		<a href="{{setting('site.admin')}}" class="btn-style nextPage animation-div">@lang('front.order_from_photograph')</a>
	</div>
 @elseif(Auth::guard('web')->user()->role_id == TCG\Voyager\Models\Role::whereName('singer')->firstOrFail()->id)
	<div class="choose-login wow fadeInDownBig">
		<div class="col-xs-6 animation-div">
			<a href="{{ url('/my-orders') }}" class="box-style">
				<i class="fa fa-table"></i>
				@lang('front.Table and contracts')
			</a>
		</div>
		
		<div class="col-xs-6 wow fadeInDownBig">
		    
			<a href="{{ url('/notifications') }}" class="box-style">
			    <span class="notification-counter">{{$notifications}}</span>
				<i class="fa fa-bell"></i>
				@lang('front.Notifications and alarms')
			</a>
		</div>
		{{--<div class="col-xs-6 wow fadeInDownBig">
			<a href="{{ url('/invoices') }}" class="box-style">
				<i class="fa fa-file-text"></i>

        	@lang('front.Invoices')
			</a>
		</div>--}}
		<div class="col-xs-6 wow fadeInDownBig">
			<a href="{{url('managers')}}" class="box-style">
				<i class="fa fa-users"></i>
        @lang('front.Appointment of Managers')

			</a>
		</div>
		<div class="col-xs-6 wow fadeInDownBig">
			<a href="{{ url('/tours') }}" class="box-style">
				<i class="fa fa-music"></i>
				@lang('front.Concerts')

			</a>
		</div>
		<div class="col-xs-6 wow fadeInDownBig">
			<a href="{{ url('/messages') }}" class="box-style">
				<i class="fa fa-file-text"></i>
				@lang('front.Conversation and messages')
			</a>
		</div>
		<div class="col-xs-6 wow fadeInDownBig">
			<a href="{{ url('/profile') }}" class="box-style">
				<i class="fa fa-user"></i>
				@lang('front.Singer Logo')
			</a>
		</div>
	</div>
 @endif

         @if(Auth::user()->role_id == 1)

<script type="text/JavaScript">
      setTimeout("location.href = 'https://marina-al-gharbia.com/admin';",11000);
 </script>
  @endif

@endsection