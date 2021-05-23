@extends('layouts.app')

@section('content')"

<div class="col-xs-12">
    <div class="title title-singer">
        <ul>
            <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">{{ trans('front.terms_agreements') }}</h1>
    </div>
</div>

<div class="form-style">
    <form action="{{ url('step2') }}" method="POST">
        {{ csrf_field() }}

        <div class="col-md-12 col-xs-12 padding wow animation-div">
            <div class="form-group otherStyle">
                <span class="small-text"><i class="fa fa-info-circle"></i>
               {{ trans('front.read_terms') }} :</span>
            </div>
        </div>@if($conditionsPersonal->isNotEmpty())
        @foreach($conditionsPersonal as $condition )

            <div class="col-md-6 col-xs-12 wow animation-div">
                <div class="form-group otherStyle">
                    <label class="checkB"> {{ $condition->condition }}
                      <input type="checkbox"  class="agree"  required name="condition[]" checked>

                      <span class="checkmark"></span>
                    </label>
                </div>
            </div>

        @endforeach
@endif
        <div class="col-md-12 col-xs-12 wow fadeInDownBig">
            <div class="form-group allDone">
                <label class="checkB">
                  <input type="checkbox" checked="checked"  required class="all"  name="agree">
                  <span>{{ trans('front.agree_terms') }}</span>
                  <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" />
            </div>
        </div>
    </form>

</div>
@endsection


@section("script")

    <script>
    $(document).on("click", ".all" , function() {
    $('.agree').checked=true;
    });
    </script>
    @endsection