@extends('layouts.app')

@section('content')

<div class="col-xs-12">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">
            
            @if(Request::segment(3) == "male")
            شروط وبنود العقد على المطرب
            @else
            شروط وبنود العقد على المطربة
            @endif
            </h1>
    </div>
</div>

<div class="form-style">
    <form>
        <div class="col-md-12 col-xs-12 padding wow animation-div">
            <div class="form-group otherStyle">
                <span class="small-text"><i class="fa fa-info-circle"></i>
               {{ trans('front.read_terms') }} :</span>
            </div>
        </div>

        @foreach($conditions as $condition )
        <div class="col-md-6 col-xs-12 wow animation-div">
            <ul>
            <li><p class="text-white">&#9830; {{$condition->getTranslatedAttribute('condition', 'ar' ) }}</p><br><br></li>
            </ul>
        </div>
        
        @endforeach

    </form>

</div>

@endsection