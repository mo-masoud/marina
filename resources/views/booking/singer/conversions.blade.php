@extends('layouts.app')

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <div class="title title-singer">
        <ul>
            <!--<li><img src="{{ url('images/singer.png') }}" alt="" /></li>-->
            <!--<li><img src="{{ url('images/singer-icon.png') }}" alt="" /></li>-->
        </ul>
        <h1 class="border-grad">{{ trans('front.bank_transfer') }}</h1>
    </div>
</div>

<div class="form-style">
    <form action="{{ url('singer/step5') }}" method="POST">
        {{ csrf_field() }}
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.sender_name') }}</label>
                <input maxlength="100" type="text" name="sender_name" value="{{ Remittances('sender_name') }}" class="form-control" placeholder="{{ trans('front.sender_name') }}" required />
                <i class="fa fa-male lefti"></i>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 wow animation-div">
            <div class="form-group">
                <label class="control-label">{{ trans('front.relation_contact') }}</label>
                <div class="select">
                    <select name="relative_relation">
                                                
                        @foreach(\App\FamilyMember::get() as $member)
                        
                                                <option value="{{ $member->name }}" >
                            {{ $member->getTranslatedAttribute('name', session('lang') ) }}
                        </option>
                        @endforeach
                    </select>
                    <i class="fa fa-handshake-o"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.bank_name') }}</label>
                <div class="select">
                    <select name="bank_name">
                        @foreach(\App\BankClient::get() as $bank)
                        <option value="{{ $bank->name }}"  {{ ( Remittances('bank_name') == $bank->name  ) ? 'selected' :'' }}> {{ $bank->name }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-bank"></i>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.account_number') }}</label>
                <input maxlength="100" type="text" name="account_number" value="{{ Remittances('account_number') }}" class="form-control" placeholder="{{ trans('front.account_number') }}" required />
                <i class="fa fa-credit-card-alt"></i>
            </div>
        </div>

        <div class="col-md-12 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <span class="small-text">{{ trans('front.confirmation_deposit') }}</span>
                <p>
                    {{ trans('front.confirmation_deposit_text') }}
                </p>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 wow fadeInDownBig">
            <div class="form-group">
                <label class="control-label">{{ trans('front.sender_phone') }}</label>
                <input maxlength="100" type="text" name="sender_phone" value="{{ Remittances('sender_phone') }}" class="form-control" placeholder="{{ trans('front.sender_phone') }}" required />
                <i class="fa fa-phone"></i>
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