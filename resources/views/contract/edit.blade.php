@extends('layouts.app')

@section('content')


<div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
    <div class="title title-singer">
        <ul>
          <li><img src="images/singer.png" alt=""></li>
            <li><img src="images/singer-icon.png" alt=""></li>
        </ul>
        <h1 class="border-grad">إدخـل الـكـود</h1>
    </div>
</div>

<div class="form-style animation-fast" >


  <div class="col-md-12 col-xs-12  wow animation-div" style="visibility: visible;">
        <div class="singer-img">
            <img src="images/1.png" alt="">
        </div>
    </div>
    <form action="code-choose.html" method="POST">
      @method('PUT')
      @csrf
        <div class="col-md-6 col-xs-12  wow fadeInDownBig" style="visibility: visible;">
          <div class="form-group">
                <label class="control-label active">الكود</label>
                <input maxlength="100" type="text" class="form-control" placeholder="الكود" required="">
                <i class="fa fa-barcode"></i>
                <span class="small-text">إدخل الكود الذي تم ارساله علي جوالك</span>
            </div>
        </div>

        <div class="col-xs-12 wow fadeInDownBig" style="visibility: visible;">
          <div class="form-group">
              <input type="submit" class="nextPage" value="دخول">
            </div>
        </div>
    </form>

</div>


@endsection
