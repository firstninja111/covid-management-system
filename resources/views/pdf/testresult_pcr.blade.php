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
                <textarea class="code_area" rows="<?= substr_count($description, "\n") + 1 ?>" disabled><?= $description ?></textarea>
            </td>
            <td>
                <p style="font-size: 14px; font-weight: bold;">{{$result == 'Negative' ? 'Not Detected (Negative)' : 'Detected (Positive)' }}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size: 12px;">({{$sample_type}})</p>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <p class="divider"></p> 

    <h5 style="margin-left:60px; margin-bottom:20px; margin-top: 5px;">RESULT INTERPRETATION:</h5>
    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">A Not Detected (negative) test result for this test means that the RNA (Ribonucleic acid) contained within the SARS-CoV-2
        virus were not present in the specimen above the limit of detection. A negative result does not rule out the possibility of
        COVID-19 and should not be used as the sole basis for treatment or patient management decisions. If COVID-19 is still
        suspected, based on exposure history together with other clinical findings, re-testing should be considered in consultation
        with public health authorities. Laboratory test results should always be considered in the context of clinical observations and
        epidemiological data in making a final diagnosis and patient management decisions.</p>
    
    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">A Detected (positive) test result indicates that the RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus were
        detectable in the specimen above the limit of detection. Positive results are indicative of active infection with SARS-COV-2,
        but do not rule out bacterial infection or co-infection with other viruses. The agent detected may not be the definite cause of
        disease. This test is intended for the qualitative detection of Ribonucleic acid from the SARS-COV-2 virus in the specimens
        collected from individuals who meet CDC criteria.</p>

    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">Please review the "Fact Sheets" and FDA authorized labeling available for health care providers using the following website: 
        <span><a href="https://www.fda.gov/media/136523/download">https://www.fda.gov/media/136523/download</a></span>; and patients using the following websites: 
        <span><a href="https://www.fda.gov/media/136523/download"> https://www.fda.gov/media/136524/download</a></span>.</p>

    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">This test has been authorized by the FDA under an Emergency Use Authorization (EUA) for use by authorized laboratories.</p>

    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">Due to the current public health emergency, Rapid-Labs is performing a high volume of samples. In order to serve patients,
        only samples performed at Rapid-Labs facilities will be tested at Rapid-Labs. Positive results do not rule out a bacterial
        infection or co-infection with other viruses. Negative results should be treated as presumptive and, if inconsistent with clinical
        signs and symptoms or necessary for patient management should be tested with different authorized or cleared molecular
        tests.</p>

    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">Methodology: Qualitative detection of RNA (Ribonucleic acid) contained within the SARS-CoV-2 virus in nasal/oral swabs
        from individuals who are suspected of COVID-19.</p>
    
    <p style="font-size: 14px; margin-left: 60px; margin-right:60px; margin-bottom:10px;">Additional information can be found at the Rapid-Labs website: 
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