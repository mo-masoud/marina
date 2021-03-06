@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
           <li><img src="{{ url('images/singer.png') }}" alt=""></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.delay_joy') }}</h1>
    </div>
</div>

<span class="height"></span>
<div class="form-style animation-fast">
    <form action="{{ url('delay/'.$code_number) }}" method="POST">
          {{ csrf_field() }}

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.old_date') }}</label>
                <input type="text" class="form-control"  required readonly value="{{ isset($order->hejry_date)?$order->hejry_date:'' }}" />
                <i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.reason_of_edit') }}</label>
                <textarea class="form-control" name="reason_of_edit"></textarea>
                <i class="fa fa-info"></i>
            </div>
        </div>

        {{--  <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.new_date') }}</label>
                <input maxlength="100" type="text" placeholder="{{ trans('front.new_date') }}" class="form-control birthday"  required name="new_date" />
                <i class="fa fa-calendar"></i>
            </div>
        </div>  --}}

        <div class="col-md-6 col-xs-12  wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.new_date')}}</label>
                <input id="hijrDate" onclick="pickDate(event)" type="text" name="new_date" class="w3-input w3-border" placeholder="{{ trans('front.new_date') }}" required />
                <i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class="col-md-6 col-xs-12  wow fadeInDownBig" style="display:none">
            <div class="form-group">
                <label class="control-label">{{ trans('front.meladi_date') }}</label>
                <input id="gregDate" onclick="pickDate(event)" disabled type="text" name="date" class="w3-input w3-border" placeholder="yyy / mm / 01" required />
                <i class="fa fa-calendar"></i>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>


@endsection
