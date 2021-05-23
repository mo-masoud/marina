@extends('layouts.app')

@section('content')
<div class="tabs-style animation-div">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#myinbox">{{ trans('front.myinbox') }}</a></li>
        <li><a data-toggle="tab" href="#mysent">{{ trans('front.mysent') }}</a></li>
    </ul>
    <div class="tab-content">
       <div id="myinbox" class="tab-pane fade in active">
          @if($inboxs->count() > 0)
              @foreach($inboxs as $message)

                  <div class="col-xs-12">
                      <div class="notifiction">
                          <div class="icon"><i class="fa fa-bell"></i></div>
                          <div class="text">
                           {{--  <span>{{ trans('front.from') }} : {{ auth()->guard('moderator')->check()?\App\Models\Modrator::find($message->to)->name :\App\User::find($message->to)->name }}</span>
                          --}}

                              <span>{{ trans('front.from') }} : {{ $message->sender_model==1?\App\Models\Modrator::find($message->from)->name:\App\User::find($message->from)->name }}</span>


                              <h3>{{ $message->subject }}</h3>
                                 <a href="{{url('messageshow/'.$message->id)}}"> {{ trans('front.show message content') }}</a>
                          </div>
                      </div>
                  </div>

              @endforeach
          @else
              <p style="color: #fff;">{{ trans('front.no_messages_found') }}</p>
          @endif
        </div>
      
        <div id="mysent" class="tab-pane fade ">
         
            @if($mysent->count() > 0)
                @foreach($mysent as $message)

                    <div class="col-xs-12">
                        <div class="notifiction">
                            <div class="icon"><i class="fa fa-bell"></i></div>
                            <div class="text">
                                <span>{{ trans('front.to') }} : {{ $message->receiver_model==1?\App\Models\Modrator::find($message->to)->name:\App\User::find($message->to) ->name }}</span>

                                <h3>{{ $message->subject }}</h3>
                                <a href="{{url('messageshow/'.$message->id)}}"> {{ trans('front.show message content') }}</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            @else
                <p style="color: #fff;">{{ trans('front.no_messages_found') }}</p>
            @endif
        </div>
       
    </div>
</div>

@endsection


@push('js')
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<script>
	$(document).ready(function(){
      $('#action_menu_btn').click(function(){
        $('.action_menu').toggle();
      });
	});
</script>
@endpush
