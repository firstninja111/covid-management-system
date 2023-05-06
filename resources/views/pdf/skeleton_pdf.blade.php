<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$test_type}}</title>
    <style>
        body {
            margin: 0px;
        }
        .detail {
            display: flex;
        }
        h3{
            margin:0px;
        }
        p{
            margin:0px;
        }

        .detail-margin {
            margin-top: 10px;
        }

        .divider {
            border-bottom: solid 1px gray;
            margin: 0px 20px;
        }

        html{
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        td{
            width: 12%;            
        }
        
        .code_area {
            width: 100%;
            background: transparent;
            border: none;
            padding: 0px;
            font-size: 14px;
            resize: none;
        }
    </style>
</head>
<body style="background:url({{public_path('uploads/appLogo/pdf-background.png')}}) no-repeat;background-size:cover !important">
    <table style="border-collapse: collapse; width:100%;">
        <tr style="height: 70px;">
            <td colspan="2" style=" height: 5px;">
                <img src="{{ public_path('uploads/appLogo/pdf-logo.png') }}" alt="App Logo" style="width:150px; height:auto; margin-left: 20px; margin-top:40px;">
            </td>
            <td colspan="3" style="text-align:center">
                
            </td>
            <td colspan="3" style="vertical-align: bottom; padding-right: 40px;">
                <table style="border-collapse: collapse; width:100%;">
                    <tr><td style="position: relative; text-align:right; ">
                        <img src="{{ public_path('uploads/appLogo/phone.png') }}" style="position:absolute; top:-5px; right: 100px; width:18px">
                        <p style="margin-bottom: 7px; font-weight:bold; font-size: 17px; color:#232334;">786-321-7545</p>
                    </td></tr>
                    <tr><td style="position: relative; text-align:right; ">
                        <img src="{{ public_path('uploads/appLogo/email.png') }}" style="position:absolute; top:0px; right: 165px; width: 22px">
                        <p style="margin-bottom: 7px; font-weight:bold; font-size: 17px; color:#232334;">info@rapid-labs.com</p>
                        </td></tr>
                    <tr><td style="position: relative; text-align:right; ">
                        <img src="{{ public_path('uploads/appLogo/domain.png') }}" style="position:absolute; top:0px; right: 155px; width: 22px">
                        <p style="margin-bottom: 7px; font-weight:bold; font-size: 17px; color:#232334;">www.rapid-labs.com</p>
                    </td></tr>
                </table>
            </td>
        </tr>
        <tr style="">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p class="" style="border-bottom: solid 4px #71c2e0;"></p> 
    <p class=""  style="border-bottom: solid 4px #333;padding-top:3px;"></p> 
    <table style="border-collapse: collapse; width:100%; padding: 15px 90px 10px 90px;">
        <tr>
            <td colspan="2">
                <p style="font-size: 14px;">ID</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$test_id}}</p>
            </td>
            <td colspan="2">
                <p style="font-size: 14px;">Collection</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$collected_time}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-size: 14px;">Name</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$lastname. ' '. $firstname}} </p>
            </td>
            <td colspan="2>
                <p style="font-size: 14px;">Reported</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$reported_time}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-size: 14px;">DOB</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$birth_date}} </p>
            </td>
            <td colspan="2">
                <p style="font-size: 14px;">Email</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$email}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="font-size: 14px;">Passport No.</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$pass_number}} </p>
            </td>
            <td colspan="2">
                <p style="font-size: 14px;">Gender</p>
            </td>
            <td colspan="4">
                <p style="font-size: 14px;">: {{$gender}}</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <h5 style="margin-left:90px; margin-bottom:5px; margin-top: 5px;">{{$test_type}}</h5>
    <p class="divider"></p> 

    <table style="border-collapse: collapse; width:100%; padding: 15px 90px 10px 90px;">
        <tr>
            <td>
                <p style="font-size: 14px; font-weight: bold;">Collection Method:</p>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size: 14px;">{{$sample_type}}</p>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <textarea class="code_area" rows="<?= substr_count($description, "\n") + 1 ?>" disabled><?= $description ?></textarea>
            </td>
            <td valign="top">
                <p style="font-size: 14px; font-weight: bold;">{{$result_type == 'Positive/Negative' ? 'NOT DETECTED' : '250mg/Dl' }}</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p class="divider"></p> 

    <h5 style="margin-left:70px; margin-bottom:10px; margin-top: 10px;">RESULT INTERPRETATION:</h5>
    <div style="margin-right: 70px; margin-left:70px;">{!! $rich_description !!}</div>
    
    <p style="font-size: 14px; margin-left: 70px; margin-right:70px; margin-bottom:10px; margin-top:10px;">Additional information can be found at the Rapid-Labs website: 
        <span><a href="https://www.rapid-labs.com">https://www.rapid-labs.com</a></span>
    </p>

    <p class="divider"></p> 
    
    <table style="border-collapse: collapse; width:100%; margin-top: 10px; margin-bottom: 20px;">
        <tr>
            <td colspan="2" rowspan="2" style="padding-left: 30px;">
                @if($qr_code_show == 1)
                <img style="width: 70px; margin-left: 30px; border:solid 1px black;" src="{{ public_path($qrcode_url) }}" alt="QR Code">
                @endif
            </td>
            <td colspan="6" style="vertical-align: baseline; text-align:center;">
                <p style="font-size: 15px; margin-bottom:15px;">** END OF REPORT**</p>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="vertical-align: baseline; text-align:center;">
                <p style="font-size: 15px; margin-bottom:15px;">917 Alton Road, Miami Beach, FL 33139 | CLIA#10D2247306</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
</html>