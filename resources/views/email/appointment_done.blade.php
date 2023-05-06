<div style="font-family: 'Malgun Gothic'; font-size: 14px; width: 600px;">
    <div style="background:url({{asset('public/uploads/appLogo/email_header.jpg')}}) no-repeat;background-size:cover !important; height: 60px;">
    </div>
    <img src="{{asset('public/uploads/appLogo/app-logo-dark.png')}}" style="width:100px; float:right; margin-top:10px;">
    <h1 style="margin-bottom: 0px; margin-top:50x;">Hi, {{$full_name}}</h1>
    <h1 style="margin-top: 0px; margin-bottom: 30px;">Welcome to Rapid-Labs</h1>

    <h3 style="color:black;">You have scheduled appointment successfully.</h3>

    <p style="color:black; margin-top:5px; margin-bottom:5px; font-weight:bold;">{{$test_view}}</p>
    <p style="color:black; margin:0px;">Appointment ID : # {{$id}}</p>
    <p style="color:black; margin:0px;">Time / Date : {{$date_time}}</p>
    <p style="color:black; margin:0px;">Price Paid : ${{number_format($price_paid, 2)}}</p>
    
</div>