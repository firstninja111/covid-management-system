<div style="font-family: 'Malgun Gothic'; font-size: 14px; width: 600px;">
    <div style="background:url({{asset('public/uploads/appLogo/email_header.jpg')}}) no-repeat;background-size:cover !important; height: 60px;">
    </div>
    <img src="{{asset('public/uploads/appLogo/app-logo-dark.png')}}" style="width:100px; float:right; margin-top:10px;">
    <h1 style="margin-bottom: 0px; margin-top:50x;">Hi, {{$full_name}}</h1>
    <h1 style="margin-top: 0px; margin-bottom: 30px;">Welcome to Rapid-Labs</h1>

    <h3 style="color:black;">You can access to our service <span style="color: blue"><a href="https://rapid-labs.com">rapid-labs.com</a></span> with following credential from now.</h3>

    <h5 style="color:black; margin-bottom: 0px;">
        User Name
    </h5>
    <p style="color:black; margin:0px;">
        {{$user_name}}
    </p>

    <h5 style="color:black; margin-bottom: 0px;">
        Email
    </h5>
    <p style="color:black; margin:0px;">
        {{$email}}
    </p>

    <h5 style="color:black; margin-bottom: 0px;">
        Password
    </h5>
    <p style="color:black; margin:0px;">
        {{$password}}
    </p>
</div>