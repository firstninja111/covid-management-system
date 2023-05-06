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
                <p style="font-size: 14px; font-weight: bold;">{{$result == 'Negative' ? 'NOT DETECTED' : 'DETECTED' }}</p>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p class="divider" style="margin-bottom: 20px"></p> 

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;"><span style="font-weight: bold;">Detected</span> (positive): You produced the COVID-19 IgG antibody and have a high likelihood of prior infection. Some
        patients with past infections may not have experienced any symptoms. It is unclear at this time if a positive IgG
        infers immunity against future COVID-10 infection. Please continue with universal precautions: social distancing,
        hand washing and when applicable PPE such as masks or gloves.</p>
    
    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;"><span style="font-weight: bold;">Not Detected</span> (negative): You tested negative for the COVID-19 IgG antibody. This means you have not been
        infected with COVID-19. Please note, it may take 14-21 days to produce detectable levels of IgG following infection.
        If you have symptoms consistent with COVID-19 within the past 3 weeks and tested negative, repeat testing in 1 -2
        weeks may yield a positive result.</p>

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:10px;">Please review the "Fact Sheets" and FDA authorized labeling available for health care providers using the following website:
        <span><a href="https://www.fda.gov/media/136523/download">https://www.fda.gov/media/136523/download</a></span>; and patients using the following websites: 
        <span><a href="https://www.fda.gov/media/136523/download"> https://www.fda.gov/media/136524/download</a></span>.This test has been authorized by the FDA under an
        Emergency Use Authorization (EUA) for use by authorized laboratories.</p>

    <p style="font-size: 14px; margin-left: 90px; margin-right:90px; margin-bottom:5px; font-weight: bold;">
        Next Steps:
    </p>
    <table style="border-collapse: collapse; width:100%; padding: 15px 90px 10px 90px;">
        <tr>
            <td style="vertical-align: baseline; padding-left: 10px;">
                <p style="font-size: 14px; font-weight: bold;">1.</p>
            </td>
            <td colspan="11">
                <p style="font-size: 14px;"><span style="font-weight: bold;">Maintain social distance-</span> Stay home from work, school, and all activities when you have any COVID-19
                    symptoms. Keep away from others who are sick and limit close contacts as much as possible (about 6
                    feet).</p>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: baseline; padding-left: 10px;">
                <p style="font-size: 14px; font-weight: bold;">2.</p>
            </td>
            <td colspan="11">
                <p style="font-size: 14px;"><span style="font-weight: bold">Wear a mask-</span> Wear a facial covering over your mouth and nose when you are unable to social distance.</p>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: baseline; padding-left: 10px;">
                <p style="font-size: 14px; font-weight: bold;">3.</p>
            </td>
            <td colspan="11">
                <p style="font-size: 14px;"><span style="font-weight: bold;">Wash your hands</span>- Clean your hands often, either with soap and water for 20 seconds or with a hand
                    sanitizer that contains at least 60% alcohol.</p>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: baseline; padding-left: 10px;">
                <p style="font-size: 14px; font-weight: bold;">4.</p>
            </td>
            <td colspan="11">
                <p style="font-size: 14px;"><span style="font-weight: bold;">Lean more-</span> COVID-19 is in a family of viruses known as coronaviruses. To learn more about COVID-
                    19 and how you can help reduce the spread of the virus in your community, <span><a href="https://floridahealthcovid19.gov">https://floridahealthcovid19.gov</a></span></p>
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