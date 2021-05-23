    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e734f4feec7650c332115f5/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
  Tawk_API = Tawk_API || {};
  Tawk_API.onStatusChange = function (status){
    if(status === 'online')
    {
    document.getElementById('status').innerHTML = 'Online';
    }
    else if(status === 'away')
    {
    document.getElementById('status').innerHTML = 'We are currently away';
    }
    else if(status === 'offline')
    {
    document.getElementById('status').innerHTML = 'Live chat is Offline';
    }
  };
</script>

<script>
   var hijDay = {message :"{{(int)(setting('site.hijry_date'))}}"};
</script>
        <a class="chatLive" href="javascript:void(Tawk_API.toggle())"> <img src="{{url('images/cs.png')}}" /> </a>
 
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
        <script src="{{url('js/jquery-1.11.0.min.js')}}"></script>
        <script src="{{url('js/moment.min.js')}}"></script>
        <script src="{{url('js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{url('js/bootstrap.js')}}"></script>
        <script src="{{url('js/bootstrap-carousel.js')}}"></script>
        <script src="{{url('js/owl.carousel.js')}}"></script>
        <script src="{{url('js/wow.min.js')}}"></script>
        <script src="{{url('js/responsiveCarousel.min.js')}}"></script>
        <script src="{{url('js/materialize.js')}}"></script>
        <script src="{{url('js/ekko-lightbox.js')}}"></script>
        <script src="{{url('js/jquery.tooltipster.min.js')}}"></script>
        <script src="{{url('js/jquery.validate.min.js')}}"></script>
        <script src="{{url('js/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{url('js/jquery.smoothState.js')}}"></script>
        <script src="{{url('js/hijri-date.js')}}"></script>
        <script src="{{url('js/datepicker.js')}}"></script>
        <script src="{{url('js/select2.min.js')}}"></script>
        <script src="{{url('js/java.js')}}"></script>

    @stack('js')
</body>
</html>