@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <!--<div class="title title-singer">-->
    <!--    <ul>-->
    <!--    	<li><img src="images/singer.png" alt="" /></li>-->
    <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
    <!--    </ul>-->
    <div class="logo title title-singer">
        <img src="images/singer.png" alt="" />
        <h1 class="border-grad">@lang('front.complaints_text')</h1>
    </div>
</div>
<div class="form-style animation-fast">
    <form method="POST" enctype="multipart/form-data" action="{{ action('ComplainController@store') }}">
        @csrf
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label"> @lang('front.full_name')</label>
                <input maxlength="100" type="text" name="name" class="form-control" placeholder="الاسم " required />
                <i class="fa fa-user"></i>
            </div>
        </div>
        
        
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">@lang('front.phone')</label>
                <input maxlength="100" type="text" name="phone" class="form-control" placeholder="رقم الجوال" required />
                <i class="fa fa-phone"></i>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-12  wow animation-div">
            <div class="form-group">
                <label class="control-label">@lang('front.Type of complaint')</label>
                <div class="select">
                    <select name="sort">
                        <option value="problem">@lang('front.problem') </option>
                        <option value="Suggestion">@lang('front.Suggestion') </option>
                    
                    </select>
                    <i class="fa fa-list-alt"></i>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">@lang('front.write_complaint') </label>
                <textarea class="form-control" placeholder="@lang('front.write_complaint')" name="text" ></textarea>
                <i class="fa fa-file-text-o"></i>
            </div>
        </div>
        
        <div class="col-md-6 col-xs-12  wow fadeInDownBig wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">@lang('front.Attach documents') </label>
                <input type="file" name="image" id="file-3" class="inputfile inputfile-2" />
                <label class="upload" for="file-3"><i class="fa fa-vcard"></i> <span>@lang('front.Attach documents')  </span> </label>
            </div>
        </div>
        
        <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{trans('front.send complaint')}}" />
            </div>
        </div>
    </form>

</div>

@endsection
