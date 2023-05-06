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
            <td>
                <p style="font-size: 14px; font-weight: bold;">{{$result == 'Negative' ? 'non-reactive (Negative)' : 'reactive (Preliminary Positive)' }}</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p class="divider" style="margin-bottom: 20px"></p> 
    <h5 style="margin-left:90px; margin-bottom:10px; margin-top: 5px;">RESULT INTERPRETATION:</h5>

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;">A non-reactive <span style="font-weight: bold;">(Negative)</span> result means that HIV antibodies were not detected in your blood at the time
        of testing. However, this does not completely rule out the possibility of infection with HIV. HIV
        antibodies may not appear until a few months after infection with the virus. A very recent infection may
        not produce enough antibodies to be detected by this test. Ask your healthcare provider if you should
        consider getting tested again in the next 3 to 6 months to be sure that you are not infected. However, if
        you are certain that you have not had any of the contacts that could transmit HIV in the last 3 months
        before you're HIV test a negative test result means you were not infected with HIV at the time of
        testing. Ask your healthcare provider to help you understand what your test results mean for you.</p>
    
    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;">A reactive <span style="font-weight: bold;">Preliminary Positive</span> (negative):  test results suggest that your blood may contain HIV antibodies. This
        result, however, must be confirmed by another test. If you have participated in an HIV vaccine study, you should inform the person giving you the test. Until your HIV test is confirmed, you should be careful
        to avoid activities that might spread HIV. If your test result is confirmed positive (HIV-infected), new treatments can help you maintain your health. Some people who test positive for HIV infection stay
        healthy for many years. Even if you become ill, there are medications that can help to slow down the virus and maintain your immune system. You should tell your doctor that you are HIV positive, so that
        he or she can watch your health closely. You must take steps to protect others by practicing safe sex and by informing your past and present partners about your HIV test result.</p>
    
    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom: 10px;">This test has been authorized by the FDA for use by authorized laboratories.</p>

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom: 10px; font-weight:bold;">Where can you get more information about HIV and AIDS?</p>
    
    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom: 10px;">If you have any questions or want additional information, ask your healthcare provider or contact your
        local health department. You can also call <span style="font-weight: bold">the National AIDS Hotline at 1-800-CDC-INFO (1-800-232-
        4636)</span> to talk with an HIV specialist. They can give you quick, private answers at any time, day or night.
        Other AIDS service organizations near you can also provide information, education, and the help you
        may need.</p>

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;">Additional information can be found at the Rapid-Labs website: 
        <span><a href="https://www.rapid-labs.com">https://www.rapid-labs.com</a></span>
    </p>

    <p class="divider"></p> 
    
    <table style="border-collapse: collapse; width:100%; margin-top: 10px; margin-bottom: 20px;">
        <tr>
            <td colspan="2" rowspan="2" style="padding-left: 30px;">
                <img style="width: 70px; margin-left: 30px; border:solid 1px black;" src="{{ public_path($qrcode_url) }}" alt="QR Code">
            </td>
            <td colspan="6" style="vertical-align: baseline; text-align:center;">
                <p style="font-size: 15px; margin-bottom:15px;">** END OF REPORT**</p>
            </td>
        </tr>
        <tr>
            <td colspan="6" style="vertical-align: baseline; text-align:center;">
                <p style="font-size: 15px; margin-bottom:15px;">917 Alton Road, Miami Beach, FL 331 39 | CLIA#10D2247306</p>
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