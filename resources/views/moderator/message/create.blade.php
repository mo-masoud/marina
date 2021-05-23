@extends('layouts.app')

@section('header')
<span>البحث عن المطرب</span>
@endsection

@section('content')
    <div class="col-xs-12 wow fadeInDownBig">
        <div class="logo singer title title-singer">
            <img src="images/singer.png" alt="" />
            <h1 class="border-grad"> ارسال رسالة</h1>
        </div>
    </div>
    <div class="form-style animation-fast">
        <form method="POST" action="{{ action('MessageController@store') }}">
            @csrf
           <input type="hidden" name="from" value="{{auth()->id()}}">
            <input type="hidden" name="sender_model" value="{{ auth()->user()->type }}">
           <input type="hidden" name="to" value="{{ $reciever->id }}">
            <input type="hidden" name="receiver_model" value="{{ $reciever->type }}">

           <input type="hidden" name="message_model" value="{{request('message_model')}}">
          
            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">الرسالة من :-</label>
                   
                    <input maxlength="100" type="text"  value="{{ auth()->user()->name }}"  disabled class="form-control" placeholder="الاسم "  required />
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">الرسالة إلى :-</label>
                   
                    <input maxlength="100" type="text"  value="{{ $reciever->name }}" disabled class="form-control" placeholder="الاسم "  required />
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">عنوان الرسالة :-</label>
                    <input maxlength="100" type="text" name="subject" class="form-control" placeholder="عنوان الرسالة " required />
                    <i class="fa fa-user"></i>
                </div>
            </div>
            
            <div class="col-md-6 col-xs-12  wow fadeInDownBig">
                <div class="form-group">
                    <label class="control-label">نص الرسالة</label>
                    <textarea class="form-control" name="message" placeholder="نص الرسالة " required ></textarea>
                    <i class="fa fa-file-text-o"></i>
                </div>
            </div>


            
           
            
            <div class="col-xs-12 wow fadeInDownBig ">
                <div class="form-group">
                    <input type="submit" class="nextPage" value="إرسال الرسالة" />
                </div>
            </div>
        </form>

    </div>
@endsection
