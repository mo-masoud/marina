@extends('layouts.app')

@section('header')
<span>البحث عن المطرب</span>
@endsection

@section('content')

@php
    
        $modrator =\App\Models\Modrator::find(auth("moderator")->user());
        if($modrator != null)  {  
        $user =\App\User::where('id',$modrator->first()->user_id)->first();
        }
        @endphp
        
    <div class="col-xs-12 wow fadeInDownBig">
        <div class="logo singer title title-singer">
            <img src="{{ $modrator ? Voyager::image($user->avatar) : Voyager::image(Auth::user()->avatar)}}" alt="" />
            <h1 class="border-grad">
                
                                        @if(Request::segment(2) == "management")
                        إسم  مدير الموقع
                        @elseif(Request::segment(2) == "client")
                        إسم العميل
                        @elseif(Request::segment(2) == "singer_manager")
                        إسم مدير الأعمال
                        @endif
                 </h1>
        </div>
    </div>
    <div class="form-style animation-fast">
        <form method="post" action="{{ action('MessageController@messageform') }}">
            @csrf
            <div class="col-md-12 col-xs-12  wow animation-div">
                <div class="form-group">
                    <label class="control-label">
                                   @if(Request::segment(2) == "management")
                        إسم  مدير الموقع
                        @elseif(Request::segment(2) == "client")
                        إسم العميل
                        @elseif(Request::segment(2) == "singer_manager")
                        إسم مدير الأعمال
                        @endif
                         </label>
                        <div class="select select2">
                            <select class="chz-select" name="user_id" data-placeholder="Select..." required> 
                               @foreach($users as $user)
                                     <option value="{{ $user->id }}">{{ $user->name }}</option>
                               @endforeach
                            </select>
                        </div>
                        <i class="fa fa-user"></i>
                </div>
            </div>
            <input type="hidden" name="message_model" value="{{$message_model ?? 'user'}}">
            
            <div class="col-xs-12 wow animation-div">
                <div class="form-group">
                    <input type="submit" class="nextPage" value="بـحـث" />
                </div>
            </div>
        </form>

    </div>
@endsection
