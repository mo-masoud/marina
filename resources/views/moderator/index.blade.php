@extends('layouts.app')

@section('header')

 <span>@lang('front.site_title')</span>

@endsection

@section('content')

<div class="col-xs-12 wow fadeInDownBig">
    <!--<div class="title title-singer">-->
    <!--    <ul>-->
    <!--    	<li><img src="images/singer.png" alt="" /></li>-->
    <!--        <li><img src="images/singer-icon.png" alt="" /></li>-->
    <!--    </ul>-->
    @php
        $avatar=auth()->user()->avatar;
    @endphp



    <div class="logo singer title title-singer">
        <img src="{{url('storage/'.Auth::user()->avatar)}}" alt="" />
  
  
  {{--  <div class="logo singer title title-singer">
        <img src="images/singer.png" alt="" />
        <h1 class="border-grad">{{trans('front.createModrator')}}</h1>
    </div>--}}
</div>
<div class="col-xs-12">
<div class="contract box two wow animatio wow animation-div">
    <a href="{{ url('managers/create') }}" class="btn"><i class="fa fa-add"></i> {{trans('front.createNewModrators')}}</a>
    <table class="display moderators" style="width:100%">
        <thead>
            <tr>
                <th>{{ trans('front.name') }}</th>
                <th>{{ trans('front.email_address') }}</th>
                {{--<th>{{ trans('front.permssions') }}</th>--}}
                <th>{{ trans('front.created_at') }} </th>
                <th>{{ trans('front.edit') }} </th>
            </tr>
        </thead>
        <tbody>
            @foreach($moderators as $moderator)
            <tr>
                <td>{{ $moderator->name }}</td>
                <td>{{ $moderator->email }}</td>
                {{--<td>
                 @foreach(json_decode($moderator->additional_permssions) as $key => $permssion)
                   <span>{{ trans('front.'.$key) }}</span> : <span> {{ $permssion }} </span>
                  @endforeach
                </td>--}}
                <td>{{ $moderator->created_at }}</td>
                <td>
                  <a href="{{ url('managers/'.$moderator->id.'/edit') }}" class="btn"><i class="fa fa-edit"></i></a>
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn" data-toggle="modal" data-target="#del_moderator{{ $moderator->id }}"><i class="fa fa-trash"></i></button>
                    <!-- Modal -->
                    <div id="del_moderator{{ $moderator->id }}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{ trans('front.delete') }}</h4>
                          </div>
                          <form action="{{ route('managers.destroy',$moderator->id) }}" method="post">
                             @csrf
                            <input type="hidden" name="_method" value="delete">
                            <div class="modal-body">
                              <h4>{{ trans('front.are_you_sure_to_delete') }}</h4>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('front.close') }}</button>
                              
                              <button type="submit" class="btn btn-primary" >{{ trans('front.delete') }}</button>
                            </div>
                         </form>
                        </div>

                      </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
</div>
</div>

@endsection

@push('js')
<script type="text/javascript">
$(document).ready(function() {
       $('.moderators').DataTable();
} );
</script>

@endpush