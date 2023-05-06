<div style="font-family: 'Malgun Gothic'; font-size: 14px; width: 600px;">
    <div style="background:url({{asset('public/uploads/appLogo/email_header.jpg')}}) no-repeat;background-size:cover !important; height: 60px;">
    </div>
    <img src="{{asset('public/uploads/appLogo/app-logo-dark.png')}}" style="width:100px; float:right; margin-top:10px;">
    <h1 style="margin-bottom: 30px; margin-top:50x;">Contact US Form</h1>

    <h3 style="color:black; margin-bottom: 0px;">
        Name :
    </h3>
    <p style="color:black; margin:0px; padding-left: 10px; font-size: 16px;">
        {{$contact_name}}
    </p>

    <h3 style="color:black; margin-bottom: 0px;">
        Email :
    </h3>
    <p style="color:black; margin:0px; padding-left: 10px; font-size: 16px;">
        {{$contact_email}}
    </p>

    <h3 style="color:black; margin-bottom: 0px;">
        Subject :
    </h3>
    <p style="color:black; margin:0px; padding-left: 10px; font-size: 16px;">
        {{$subject}}
    </p>

    <h3 style="color:black; margin-bottom: 0px; margin-top:5px;">
        Message : 
    </h3>
    <textarea style="color:black; margin:0px; width: 100%; background: white; border: none; padding-left: 10px; font-size: 16px; resize: none;" rows="{{ substr_count($contact_message, '\n') + 4 }}" disabled>{{ $contact_message }}</textarea>
</div>