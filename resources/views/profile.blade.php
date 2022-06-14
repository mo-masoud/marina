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
	
	<form class="form-edit-add" role="form"
              method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            {{ csrf_field() }}
		
        <div class="col-md-12">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="seal">شعار المطرب</label>
                                    <img src="{{ url('public/images/uploads/'.Auth::user()->seal) }}" style="width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;" />
                                <input type="file" data-name="seal" name="seal" id="seal">
                            </div>
                        </div>
                    </div>
        </div>
        
        <button type="submit" class="btn btn-primary pull-right save">
                {{ __('voyager::generic.save') }}
        </button>
        
    </form>

		</div>
	</div>

</div>

@endsection