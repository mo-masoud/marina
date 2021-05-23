@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
            <!--<li><img src="{{ url('images/singer.png') }}" alt=""></li>-->
            <!--<li><img src="{{ url('images/singer-icon.png') }}" alt=""></li>-->

        </ul>
        <h1 class="border-grad">{{ trans('front.agreements') }}</h1>
    </div>
</div>

<div class="form-style">

<form action="{{ url('singer/step4') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-6 col-xs-12 wow animation-div">
        <div class="form-group">
            <label class="control-label">{{ trans('front.number_of_hits') }}</label>
            <div class="select">
                <select name="number_of_hits">
                    <option value="1" {{ ( agreements('number_of_hits') == 1  ) ? 'selected' :'' }} >  1 </option>
                    <option value="2" {{ ( agreements('number_of_hits') == 2  ) ? 'selected' :'' }} >  2 </option>
                    <option value="3" {{ ( agreements('number_of_hits') == 3  ) ? 'selected' :'' }} >  3 </option>
                    <option value="4" {{ ( agreements('number_of_hits') == 4  ) ? 'selected' :'' }} >  4 </option>
                    <option value="5" {{ ( agreements('number_of_hits') == 5  ) ? 'selected' :'' }} >  5 </option>

                </select>
                <i class="fa fa-male lefti"></i>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xs-12 margin topP wow animation-div">
        <span class="small-text"><i class="fa fa-smile-o"></i> @lang('front.first_widding_free')</span>
        <span class="small-text"><i class="fa fa-info-circle"></i> @lang('front.second_widding')</span>
    </div>

    <div class="col-md-6 col-xs-12 pull-left wow animation-div">
        <div class="form-group otherStyle">
            <label class="control-label">{{ trans('front.agree_ribbons') }}</label>
            <label class="checkB"> {{ trans('front.agree') }}
              <input type="checkbox" {{ ( agreements('agree') == 'on'  ) ? 'checked' :'' }} name="agree">
              <span class="checkmark"></span>
            </label>
            <span class="text-s">@lang('front.operating_of_widding')</span>
        </div>
    </div>

    <div class="col-md-6 col-xs-12 pull-right wow fadeInDownBig">
        <div class="form-group">
            <label class="control-label">{{ trans('front.number_ribbons') }}</label>
            <div class="select">
                <select name="number_ribbons">
                    <option value="1" {{ ( agreements('number_ribbons') == 1  ) ? 'selected' :'' }} >  1 </option>
                    <option value="2" {{ ( agreements('number_ribbons') == 2  ) ? 'selected' :'' }} >  2 </option>
                    <option value="3" {{ ( agreements('number_ribbons') == 3  ) ? 'selected' :'' }} >  3 </option>
                    <option value="4" {{ ( agreements('number_ribbons') == 4  ) ? 'selected' :'' }} >  4 </option>
                    <option value="5" {{ ( agreements('number_ribbons') == 5  ) ? 'selected' :'' }} >  5 </option>
                </select>
                <i class="fa fa-viadeo"></i>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <hr />
    </div>

    <div class="col-md-6 col-xs-12 wow fadeInDownBig ">
        <div class="form-group">
            <label class="control-label">{{ trans('front.price') }}</label>
            <div class="select">
                <select name="price" class="price">

                    @foreach(prices() as $price)
                        <option value="{{ $price->price }}" {{ ( agreements('price') == $price->price  ) ? 'selected' :'' }} >
                            {{ $price->price }}
                        </option>
                    @endforeach

                </select>
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

     <div class="col-md-6 col-xs-12 wow fadeInDownBig ">

           <div class="form-group text-right">
            <label class="control-label"><i class="fa fa-money"></i> {{ trans('front.deposit') }}</label>
            <label class="checkB"> @lang('front.Western Region')
              <input type="checkbox" class="deposit"  value='3000' name="deposit"  {{ ( agreements('deposit') == 3000  ) ? 'checked' :'' }}>
              <span class="checkmark"></span>
            </label>
        </div>

        <div class="form-group text-right wow fadeInDownBig">
            <label class="checkB"> @lang('front.central region')
              <input type="checkbox"  class="deposit"  value='10000' name="deposit" {{ ( agreements('deposit') == 10000  ) ? 'checked' :'' }}>
              <span class="checkmark"></span>
            </label>
        </div>

        <div class="form-group text-right wow fadeInDownBig">
            <label class="checkB">   @lang('front.the eastern zone')
              <input type="checkbox"  class="deposit"  value='10000' name="deposit" {{ ( agreements('deposit') == 10000  ) ? 'checked' :'' }}>
              <span class="checkmark"></span>
            </label>
        </div>
       
        <div class="form-group text-right wow fadeInDownBig">
            <label class="checkB">   @lang('front.Southern area')
              <input type="checkbox"  class="deposit"  value='3000' name="deposit" {{ ( agreements('deposit') == 3000  ) ? 'checked' :'' }}>
              <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="col-xs-12">
        <hr class="dashed" />
    </div>

    <div class="col-md-12 col-xs-12 wow fadeInDownBig ">
        <div class="form-group disabled">
            <label class="control-label"><i class="fa fa-money"></i> {{ trans('front.remaining_amount') }}</label>
            <input maxlength="100" type="text" class="form-control remaining_amount"  name="remaining_amount" value="{{ agreements('remaining_amount') }}"  readonly/>
        </div>
    </div>

    <div class="col-xs-12 wow fadeInDownBig ">
        <div class="form-group">
            <input type="submit" class="nextPage" value="{{ trans('front.continue') }}" {{ ( agreements('deposit') >= agreements('price') ) ? 'disabled' :'' }} />
        </div>
    </div>

</form>

</div>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            //choose only one of all deposit
            $('.deposit').on('change', function() {
                $('.deposit').not(this).prop('checked', false);
            });

            $(".deposit").click(function() {

                var deposit = parseInt ( $(this).val() );
                var price = parseInt ( $('.price').val() );

                if (deposit >= price ) {

                    $("input[type=submit]").attr("disabled", "disabled"); //disabled submit button if deposit >= price

                    Swal.fire({
                      type: 'warning',
                      text: 'لا يمكن إختيار قيمة العربون بحيث تكون أقل من المبلغ الإجمالى',
                      showConfirmButton: true,


                    });

                }else{
                    $('.remaining_amount').attr('value',price-deposit);
                    $("input[type=submit]").removeAttr("disabled", "disabled"); //remove disabled
                }

            });

            $(".price").on('change',function() {

                var deposit = parseInt ( $('.deposit:checked').val() );
                var price = parseInt ( $(this).val() );

                if(deposit != NaN){

                    $("input[type=submit]").attr("disabled", "disabled"); //disabled submit button if deposit is null

                    if (deposit >= price  ) {

                        $("input[type=submit]").attr("disabled", "disabled"); //disabled submit button if deposit >= price

                        Swal.fire({
                          type: 'warning',
                          text: 'please change your deposit to agree with this price!',
                          showConfirmButton: true,


                        });
                    }else{
                        $('.remaining_amount').attr('value',price-deposit);
                        $("input[type=submit]").removeAttr("disabled", "disabled"); //remove disabled
                    }
                }


            });

        });

    </script>

@endpush
