@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
             <li><img src="{{ url('images/singer.png') }}" alt="" /></li>
            <li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>
        </ul>
        <h1 class="border-grad">{{trans('front.banks_title')}}</h1>
    </div>
</div>

<div class="form-style">
    <form action="{{ url('contract_view') }}" method="POST">
        {{ csrf_field() }}

              @foreach($banks as $bank)
        <div class="col-md-6 col-xs-12 wow animation-div " style="margin-bottom: 50px;">

            <label class="checkBK">
                        	    
                <input type="radio" name="bank_value" value="{{ $bank->id }}" style=" visibility: inherit; margin-right: 138px; " required>
                <span class="checkBK2">
            <div class="bank">
                <div class="img-bank">
                    <img src="{{Voyager::image( $bank->image )}}" alt="" />
                </div>

                <div class="text-bank">
                    <table>
                        <tbody>
                                                        <tr>
                                <td>{{trans('front.bank_name2')}} </td>
                                <td>{{ $bank->bank_name }}</td>
                            </tr>
                            <tr>
                                <td>{{trans('front.account_number')}} </td>
                                <td>{{ $bank->account_number }}</td>
                            </tr>
                            <tr>
                                <td>{{trans('front.account_number_with')}}  </td>
                                <td>{{ $bank->account_number_with }}</td>
                            </tr>
                            <tr>
                                <td>{{trans('front.name_of_owner')}} </td>
                                <td>{{ $bank->name_of_owner }}</td>
                            </tr>
                            <tr>
                                <td>{{trans('front.number_of_owner')}}</td>
                                <td>{{ $bank->number_of_owner }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </span>
    </label>
        </div>
        @endforeach

        {!! $banks->links() !!}

                                                 <div class="col-xs-12 wow fadeInDownBig ">
            <div class="form-group">
                <input type="submit" class="nextPage" value="{{trans('front.continue')}}" style="margin-top: 35px;"/>
            </div>
        </div>
    </form>

</div>

@endsection
