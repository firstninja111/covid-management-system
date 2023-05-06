<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
use App\Appointment;
use App\Test;
use App\Role;
use App\User;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;
use UxWeb\SweetAlert\SweetAlert;
use PragmaRX\Countries\Package\Countries;
use PDF;
use QrCode;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use DB;
use File;

use Storage;

use Mail;

class AppointmentController extends Controller
{
    protected $test;
    protected $appointment;
    public function __construct(Test $test, Appointment $appointment, User $user, Countries $country)
    {
        // if (setting('email_verification')) {
        //     $this->middleware(['verified']);
        // }

        $this->test = $test;
        $this->appointment = $appointment;
        $this->user = $user;
        $this->countries = $country->all()->sortBy('name.common')->pluck('name.common');
    }

    /**
     * View all users
     * @return Model User model
     */
    public function index()
    {   
        $user_id = Auth::user()->id;
        $user = $this->user->find($user_id);
        // Get user's current role
        $role = $user->roles->first()->name;

        $today = date('Y-m-d');
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $weekago = date('Y-m-d',strtotime("-7 days"));

        $search = request()->input('search');
        $start_date = request()->input('start_date');
        $end_date = request()->input('end_date');

        if($role == "admin"){
            $appointments = $this->fetchAllAppointmentsOrderByTestResult(15, $search, $start_date, $end_date, ['payment_status' => 'Paid']);
            return view("appointments.admin_index", ['appointments'=>$appointments, 'today' => $today, 'yesterday' => $yesterday, 'weekago' => $weekago]);
        } else if($role == "users") {
            $appointments = $this->fetchAllAppointments(15, $search, ['user_id' => $user_id]);
            return view("appointments.client_index", ['appointments'=>$appointments]);
        } else if($role == "clerical") {
            $appointments = $this->fetchAllAppointmentsOrderByTestResult(15, $search, $start_date, $end_date, ['payment_status' => 'Paid']);
            return view("appointments.clerical_index", ['appointments'=>$appointments, 'today' => $today, 'yesterday' => $yesterday, 'weekago' => $weekago]);
        }
    }

    public function resendPdf(Request $request){
        $appointment_id = $request['appointment_id'];
        $appointment = $this->appointment->find($appointment_id);

        // Generate Test Id and pdf again
        $new_app_str = $this->generateRandomString(15);
        $appointment->app_str = $new_app_str;
        $appointment->pdf = "public/results/report_". $appointment->app_str. ".pdf";
        $appointment->save();

        //  ======== Generate new QR Code =========== ///
        
        QrCode::size(300)
            ->format('png')
            ->generate(asset('/'). $appointment->pdf, 'public/qrcodes/'. $appointment->app_str. '.png');

        /// ========== Generate new PDF ======= ////
        $apppointment_str = $appointment->app_str;
        
        $data = [
            'test_type' => $appointment->test->test_type,
            'test_id' => $apppointment_str, // 15 digits code
            'reported_time' => date('m/d/Y, H:i', strtotime($appointment->reported_time)). ' ET',
            'collected_time' => date('m/d/Y, H:i', strtotime($appointment->collected_time)). ' ET',
            'firstname' => $appointment->user->firstname,
            'lastname' => $appointment->user->lastname,
            'gender' => $appointment->user->gender,
            'result' => $appointment->result, 
            'birth_date' => $appointment->user->birth_date,
            'email' => $appointment->user->email,
            'sample_type' => $appointment->test->sample_type,
            'description' => $appointment->test->description,
            'qrcode_url' => "qrcodes/". $apppointment_str. ".png",
            'pass_number' => $appointment->user->pass_number,
            'rich_description' => $appointment->test->template->description,
            'qr_code_show' => $appointment->test->template->qr_code,
            'result_type' => $appointment->test->template->result_type,
            'positive_display' => $appointment->test->template->positive_display,
            'negative_display' => $appointment->test->template->negative_display,
            'inconclusive_display' => $appointment->test->template->inconclusive_display,
        ];

        $pdf = PDF::loadView('pdf/live_pdf', $data);
        $content = $pdf->download()->getOriginalContent();
        file_put_contents($appointment->pdf, $pdf->output());
        
        // Send email to user for pdf results

        $mail_to = $appointment->user->email;
        $test_type = $appointment->test->test_type;
        $param = array(
            'test_type' => $appointment->test->test_type,
            'pdf_url' => asset('/'). $appointment->pdf,
            'full_name' => $appointment->user->firstname == "" ? $appointment->user->lastname : $appointment->user->firstname,
            'pdf_name' => $appointment->app_str. ".pdf",
        );

        Mail::send('email.testresult_pdf', $param, function ($message)  use ($mail_to, $test_type) {
            $message->to($mail_to, 'Rapid-Labs LLC')->subject($test_type);
            $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        });

        return json_encode("success");
    }
    public function saveTemporaryCollectedTime(Request $request)
    {
        $collected_time = $request['collected_time'];
        $appointment_id = $request['appointment_id'];

        $appointment = $this->appointment->find($appointment_id);
        $appointment->collected_time = $collected_time;
        $appointment->save();

        return json_encode("success");

    }

    public function setTestResult(Request $request){
        
        $appointment_id = $request['appointment_id'];
        $result = $request['result'];
        // $collected_time = $request['collected_time'];
        $reported_time = $request['reported_time'];

        $appointment = $this->appointment->find($appointment_id);
        $appointment->result = $result;
        // $appointment->collected_time = $collected_time;
        $appointment->reported_time = $reported_time;
        $appointment->pdf = "public/results/report_". $appointment->app_str. ".pdf";

        $appointment->save();
        
        //  ======== Generate QR Code =========== ///
        
        QrCode::size(300)
            ->format('png')
            ->generate(asset('/'). $appointment->pdf, 'public/qrcodes/'. $appointment->app_str. '.png');

        // ===================================== //

        $apppointment_str = $appointment->app_str;
        
        $data = [
            'test_type' => $appointment->test->test_type,
            'test_id' => $apppointment_str, // 15 digits code
            'reported_time' => date('m/d/Y, H:i', strtotime($appointment->reported_time)). ' ET',
            'collected_time' => date('m/d/Y, H:i', strtotime($appointment->collected_time)). ' ET',
            'firstname' => $appointment->user->firstname,
            'lastname' => $appointment->user->lastname,
            'gender' => $appointment->user->gender,
            'result' => $appointment->result, 
            'birth_date' => $appointment->user->birth_date,
            'email' => $appointment->user->email,
            'sample_type' => $appointment->test->sample_type,
            'description' => $appointment->test->description,
            'qrcode_url' => "qrcodes/". $apppointment_str. ".png",
            'pass_number' => $appointment->user->pass_number,
            'rich_description' => $appointment->test->template->description,
            'qr_code_show' => $appointment->test->template->qr_code,
            'result_type' => $appointment->test->template->result_type,
            'positive_display' => $appointment->test->template->positive_display,
            'negative_display' => $appointment->test->template->negative_display,
            'inconclusive_display' => $appointment->test->template->inconclusive_display,
        ];
        
        $pdf = PDF::loadView('pdf/live_pdf', $data);
        $content = $pdf->download()->getOriginalContent();
        file_put_contents($appointment->pdf, $pdf->output());

        // Send pdf file to customer about result

        $mail_to = $data['email'];
        $test_type = $data['test_type'];
        $param = array(
            'test_type' => $data['test_type'],
            'pdf_url' => asset('/'). $appointment->pdf,
            'full_name' => $appointment->user->firstname == "" ? $appointment->user->lastname : $appointment->user->firstname,
            'pdf_name' => $appointment->app_str. ".pdf",
        );
        Mail::send('email.testresult_pdf', $param, function ($message)  use ($mail_to, $test_type) {
            $message->to($mail_to, 'Rapid-Labs LLC')->subject($test_type);
            $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        });

        return json_encode("success");
    }

    public function pdf()
    {

        $data = [
            'taken_time' => 'Tue, 14 December 2021 10:16:07 AM',
            'test_type' => 'RT-PCR Test Next Day',
            'test_id' => '874251242145664', // 15 digits code
            'reported_time' => '12/11/1996',
            'collected_time' => '12/11/1996',
            'firstname' => 'Djordjevic',
            'lastname' => 'Nemanja',
            'gender' => 'Male',
            'result' => 'Negative', 
            'birth_date' => '12/11/1996',
            'collected_time' => '12/11/2002',
            'reported_time' => '12/11/2002',
            'email' => 'cloudrider.m02@gmail.com',
            'passport' => 'pass3412',
            'sample_type' => 'Nasopharyngeal Swab',
            'description' => "SARS-CoV-2 Rt-PCR
            (Accula Medical)",
            'qrcode_url' => "qrcodes/2354324324.png",
            'address' => 'sfdsafdfdsf',
            'pass_country' => 'asdfsadfasdf',
            'phone' => '234234324',
            'pass_number' => '124656',
        ];
        return view('pdf/testresult_antigen', $data);
    }

    public function pdfExport()
    {

        $data = [
            'test_type' => 'RT-PCR Test Next Day',
            'test_id' => '874251242145664', // 15 digits code
            'reported_time' => '12/11/1996 10:35 ET',
            'collected_time' => '12/11/1996 10:20 ET',
            'firstname' => 'Djordjevic',
            'lastname' => 'Nemanja',
            'gender' => 'Male',
            'result' => 'Negative', 
            'birth_date' => '12/11/1996',
            'collected_time' => '12/11/2002',
            'reported_time' => '12/11/2002',
            'email' => 'cloudrider.m02@gmail.com',
            'passport' => 'pass3412',
            'sample_type' => 'Nasopharyngeal Swab',
            'description' => "SARS-CoV-2 Rt-PCR
            (Accula Medical)",
            'qrcode_url' => "qrcodes/2354324324.png",

        ];

        $pdf = PDF::loadView('pdf/testresult_antibody', $data);
        // $pdf->download('itsolutionstuff.pdf');

        $content = $pdf->download()->getOriginalContent();
        // Storage::put('public/csv/name.pdf',$content) ;
        file_put_contents("public/results/report_.pdf", $pdf->output());
    }

    /**
     * Create user form
     * @return string
     */
    public function create()
    {
        $test_fetch = $this->test->query()->where('delete_flag', 0)->orderBy('id', 'asc')->get();
        $today = date('Y-m-d');
        $date_slots = array();
        $time_slots = array();

        $setting_start_time = setting('start_time');
        $setting_end_time = setting('end_time');
        $now_time = date('H:i');
        $now_hour = intval(date('H'));

        for($i = 0; $i < 7; $i++)
        {
            // Date Slot Header Input array

            $date_slot = [];

            $offset_date = date('Y-m-d', strtotime(' +'. $i. 'day'));
            $date_slot['offset_day'] = ($i == 0 ? "TODAY" : ($i == 1 ? "TOMORROW" : ""));
            $date_slot['week_day'] = date('l', strtotime(' +'. $i. 'day'));
            $date_slot['month_str'] = date('F', strtotime(' +'. $i. 'day'));
            $date_slot['day'] = number_format(date('d', strtotime(' +'. $i. 'day')));

            array_push($date_slots, $date_slot);

            // Time Slot Array
            $start_time = $setting_start_time;
            $end_time = $setting_end_time;
            if($i == 0 && $setting_start_time < $now_time) // Only for today, set start time again according to curent time - because we can't schedule previous time slot.
                $start_time = $now_time;

            $start_hour = intval(substr($start_time, 0, 2));
            $end_hour = intval(substr($end_time, 0, 2));
            $start_min = intval(substr($start_time, 3, 2));
            $end_min = intval(substr($end_time, 3, 2));
            
            $time_slot = [];
            
            for($j = $start_hour; $j <= $end_hour; $j++)    // Generate Time (Hour : Minute) PM / AM
            {
                $k_min_min = ($j == $start_hour ? $start_min : '0');
                $k_min_max = ($j == $end_hour ? $end_min: '59');
                for($k_min = (($k_min_min % 5) == 0 ? (int)$k_min_min: ((int)($k_min_min / 5) + 1) * 5); $k_min <= $k_min_max; $k_min += 5)
                {
                    $s_time = $offset_date. ' '. sprintf("%02d", $j) . ':'. sprintf("%02d", $k_min). ':00';
                    $test_fetch_cnt = $this->appointment->query()->where('s_time', $s_time)->get()->count();
                    if($test_fetch_cnt == 0)
                        array_push($time_slot, ($j > 12 ? $j - 12 : $j). ':'. sprintf("%02d", $k_min). ($j >= 12 ? ' PM' : ' AM'));
                }
            }
            array_push($time_slots, $time_slot);
        }

        $customers = User::get(['id', 'firstname', 'lastname']);
        
        return view("appointments.create", [
              'tests' => $test_fetch,
              'date_slots' => $date_slots,
              'time_slots' => $time_slots,
              'countries' => $this->countries,
              'customers' => $customers,
            ]);
    }

    private function generateRandomString($length)
    {
        $string = "";
        for($i = 0; $i < $length; $i++)
        {
            $string .= rand() % 10;
        }
        return $string;
    }
    /**
     * Save user details
     * @param  Request $request
     * @return string
     */

    public function email_send(Request $request)
    {
        // $random_str = $this->generateRandomString(6);
        // $mail_to = 'cloudrider.m92@gmail.com';
        // $data = array(
        //     'user_name' => strtolower('abc'),
        //     'full_name' => 'Nemanja Djordjevic',
        //     'email' => 'cloudrider.m92@gmail.com',
        //     'password' => $random_str,
        // );
        // Mail::send('email.password', $data, function ($message)  use ($mail_to) {
        //     $message->to($mail_to, 'Rapid-Labs LLC')->subject('Welcome to Rapid-Labs LLC service.');
        //     $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        // });

        // $mail_to = 'cloudrider.m92@gmail.com';
        // $test_type = 'COVID-19 Accula Rt-PCR Screening Results';
        // $param = array(
        //     'test_type' => 'COVID-19 Accula Rt-PCR Screening Results',
        //     'pdf_url' => asset('/'),
        //     'full_name' => 'Nemanja',
        //     'pdf_name' => "782643789542398.pdf",
        // );
        // Mail::send('email.testresult_pdf', $param, function ($message)  use ($mail_to, $test_type) {
        //     $message->to($mail_to, 'Rapid-Labs LLC')->subject('Rapid-Labs LLC');
        //     $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        // });

        // $mail_to = 'cloudrider.m92@gmail.com';
        // $param = array(
        //     'id' => '789564231624321',
        //     'date_time' => '01/16/2022, 01:37 ET',
        //     'price_paid' => 25,
        //     'full_name' => 'Nemanja',
        // );
        // Mail::send('email.appointment_done', $param, function ($message)  use ($mail_to) {
        //     $message->to($mail_to, 'Rapid-Labs LLC')->subject('Appointment has been scheduled.');
        //     $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        // });
    }

    public function contact_mailsend(Request $request)
    {
        $mail_to = 'info@rapid-labs.com';
        // $mail_to = 'info@rapid-labs.com';

        $param = array(
            'contact_name' => $request->contact_name,
            'contact_email' => $request->contact_email,
            'subject' => $request->subject,
            'contact_message' => $request->message,
            'date' => date('m/d/Y'),
        );

        Mail::send('email.contact_mail', $param, function ($message)  use ($mail_to) {
            $message->to($mail_to, 'Rapid-Labs LLC')->subject('Contact US');
            $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
        });
        return redirect()
                ->route('home')
                ->with('success', 'Mail sent successfully');
    }

    public function covid_inform(Request $request)
    {
        return view('staticpages/covid_inform');
    }

    public function refund_policy(Request $request)
    {
        return view('staticpages/refund_policy');
    }

    public function terms_conditions(Request $request)
    {
        return view('staticpages/terms_conditions');
    }

    public function email_view(Request $request)
    {
        return redirect()->route('home');
        return view('email/password');
    }

    public function remove_old_appointments(Request $request)
    {
        
        // ======== Don't run this code =========//
    
        // Remove not assigned pdf result files with db
        $dir = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/results';

        $templateUrl = array_diff(scandir($dir), array('..', '.'));
        foreach($templateUrl as $url) {
            $pdf = substr($url, 7, strlen($url) - 11);
            if(Appointment::where('app_str', $pdf)->get()->count() == 0){
                $path = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/results/report_'. $pdf. '.pdf';
                File::delete($path);
            }
        }

        // // Remove not assigned qr code image files with db
        $dir = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/qrcodes';

        $templateUrl = array_diff(scandir($dir), array('..', '.'));
        foreach($templateUrl as $url) {
            $qrcode = substr($url, 0, strlen($url) - 4);
            if(Appointment::where('app_str', $qrcode)->get()->count() == 0){
                $path = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/qrcodes/'. $qrcode. '.png';
                File::delete($path);
            }
        }

        ////////////////////////////////////////////

        $appointments = Appointment::where('reported_time', '<', '2022-10-01 00:00:00')->get();
        foreach($appointments as $appointment) {
            $path = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/results/report_'. $appointment->app_str. '.pdf';
            $qr_path = __DIR__ . DIRECTORY_SEPARATOR. '../../../public/qrcodes/'. $appointment->app_str. '.png';

            File::delete($path);
            File::delete($qr_path);
        }

        // =============== Remove Database ================ //
        Appointment::where('reported_time', '<', '2022-10-01 00:00:00')->delete();

        exit(0);
    }

    public function export_csv(Request $request)
    {
        $fileName = 'appointment report '. date('m-d-Y').'.csv';
        $appointments = Appointment::all(); 

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('First Name', 'Last Name', 'Phone', 'Email', 'Gender', 'Date of Birth', 'Passport Country', 'Passport Number', 'Address', 'Zip Code', 'Ethnicity', 'Symptoms', 'Test ID', 'Test Name', 'Sample Type', 'Payment Status', 'Price Paid', 'Scheduled Time', 'Collected Time', 'Reported Time');

        $callback = function() use($appointments, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            
            $symptom_types = array();
            $symptom_types[0] = 'None';
            $symptom_types[1] = 'Contact with and (suspected) exposure';
            $symptom_types[2] = 'Fever or chills';
            $symptom_types[3] = 'Cough';
            $symptom_types[4] = 'Shortness of breath / difficulty breathing';
            $symptom_types[5] = 'Fatigue';
            $symptom_types[6] = 'Muscle / bodyaches';
            $symptom_types[7] = 'Loss of taste or smell';
            $symptom_types[8] = 'Sore throats';
            $symptom_types[9] = 'Congestion or runny nose';
            $symptom_types[10] = 'Nausea or vomiting';

            $ethnicity_types = array();
            $ethnicity_types['white'] = 'White / Caucasian';
            $ethnicity_types['hispanic'] = 'Hispanic or Latino';
            $ethnicity_types['indian'] = 'American Indian or Alaska Native';
            $ethnicity_types['asian'] = 'Asian';
            $ethnicity_types['black'] = 'Black or African American';
            $ethnicity_types['islander'] = 'Native Hawaiian or Other Pacific Islander';
            $ethnicity_types['other'] = 'Other';
            $ethnicity_types[''] = '';
          
            foreach ($appointments as $appointment) {
                $row['firstname'] = $appointment->user->firstname;
                $row['lastname'] = $appointment->user->lastname;
                $row['phone'] = $appointment->user->phone;
                $row['email'] = $appointment->user->email;
                $row['gender'] = $appointment->user->gender;
                $row['dob'] = $appointment->user->birth_date;
                $row['pass_country'] = $appointment->user->pass_country;
                $row['pass_number'] = $appointment->user->pass_number;
                $row['address'] = $appointment->user->address;
                $row['zipcode'] = $appointment->user->zipcode;
                $row['ethnicity'] = $appointment->user->ethnicity;
                $row['symptoms'] = '';
                $symptoms = json_decode($appointment->symptoms);
                for($i = 0; $i < count($symptoms); $i++)
                {
                    if($symptoms[$i] == 1)
                        $row['symptoms'] .= $symptom_types[$i]. ' | ';
                }
                
                
                $row['test_id'] = '#'. $appointment->app_str;
                $row['test_name'] = $appointment->test->test_type;
                $row['sample_type'] = $appointment->test->sample_type;
                $row['payment_status'] = $appointment->payment_status;
                $row['price_paid'] = $appointment->payment_status == 'Paid' ? $appointment->paid : 0;
                $row['s_time'] = $appointment->s_time;
                $row['collected_time'] = $appointment->collected_time;
                $row['reported_time'] = $appointment->reported_time;
                

                fputcsv($file, array($row['firstname'], $row['lastname'], $row['phone'], $row['email'], $row['gender'], $row['dob'], $row['pass_country'], 
                                    $row['pass_number'], $row['address'], $row['zipcode'], $ethnicity_types[$row['ethnicity']], $row['symptoms'], $row['test_id'], $row['test_name'], 
                                    $row['sample_type'], $row['payment_status'], $row['price_paid'], $row['s_time'], $row['collected_time'], $row['reported_time']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function store_walkin(Request $request)
    {
        $random_str = $this->generateRandomString(6);
        // Create User 

        $result = $this->user->query()->where('email', $request->email)->where('firstname', $request->firstname)->where('lastname', $request->lastname)->get();
        if(count($result) != 0)
        {
            $user_id = $result[0]->id;
        }else{
            $add_username = '';
            $scopeResult = $this->user->query()->where('username', strtolower($request->firstname))->get();
            if(count($scopeResult) != 0) // If the same username exist
            {
                $add_username = $this->generateRandomString(4);
            }
            $user = $this->user->create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => strtolower($request->firstname). $add_username,
                'email' => $request->email,
                'password'=> bcrypt($random_str),   // Put random password
                'phone'=> $request->phone,
                'address' =>$request->address,
                'zipcode' =>$request->zipcode,
                'gender' =>$request->gender,
                'birth_date' =>$request->birth_date,
                'pass_country' =>$request->pass_country,
                'pass_number' =>$request->pass_number,
                'ethnicity' =>$request->ethnicity,
                
                'avatar' => URL::to('/')."/public/uploads/avatar/avatar.png",
            ]);
            $user->assignRole('users');
            $user_id = $user->id;
        }

        // Validation already done in front-end
        // $this->validate($request, [
        //         's_time' => 'required|unique:appointments',
        //     ]);

        // Get Price from Test Type Id;
        $type_id = $request->type_id;
        $test_fetch = $this->test->query()->where('id', $type_id)->first();

        $appointment = $this->appointment->create([
                'user_id' => $user_id,
                'type_id' => $request->type_id,
                // 's_time' => '0000-00-00 00:00:00',
                'symptoms' => $request->symptoms,
                'status' => 'scheduled',
                'payment_status' => 'Paid',
                'paid' => $test_fetch->price,
                'payment_gateway' => 'Cash',
                'app_str' => $this->generateRandomString(15),
            ]);
        
        return redirect()->route('appointment.index')->with('success', 'Appointment successfully scheduled');

    }

    public function store(Request $request)
    {
        $new_user_flag = 0;
        $random_str = $this->generateRandomString(6);
        // Create User 
        
        $result = $this->user->query()->where('email', $request->email)->where('firstname', $request->firstname)->where('lastname', $request->lastname)->get();
        if(count($result) != 0)
        {
            $user_id = $result[0]->id;
        }else{
            $add_username = '';
            $scopeResult = $this->user->query()->where('username', strtolower($request->firstname))->get();
            if(count($scopeResult) != 0) // If the same username exist generate random string and concat it.
            {
                $add_username = $this->generateRandomString(4);
            }
            $user = $this->user->create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => strtolower($request->firstname). $add_username,
                'email' => $request->email,
                'password'=> bcrypt($random_str),   // Put random password
                'phone'=> $request->phone,
                'address' =>$request->address,
                'zipcode' =>$request->zipcode,
                'gender' =>$request->gender,
                'birth_date' =>$request->birth_date,
                'pass_country' =>$request->pass_country,
                'pass_number' =>$request->pass_number,
                'ethnicity' =>$request->ethnicity,
                
                'avatar' => URL::to('/')."/public/uploads/avatar/avatar.png",
            ]);
            $user->assignRole('users');
            $user_id = $user->id;

            ###################  Mail Send to $request->email for newly generated password. ################### //
            
            $mail_to = $request->email;
            $data = array(
                'user_name' => strtolower($request->firstname). $add_username,
                'full_name' => $request->firstname == "" ? $request->lastname : $request->firstname,
                'email' => $request->email,
                'password' => $random_str,
            );
            Mail::send('email.password', $data, function ($message)  use ($mail_to) {
                $message->to($mail_to, 'Rapid-Labs LLC')->subject('Welcome to Rapid-Labs LLC service.');
                $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
    
                // echo $user->email;
            });
            // ////////////////////////////////////////////////////////////////////////////////////////////////////
            $new_user_flag = 1;
        }

        // Validation already done in front-end
        $this->validate($request, [
                's_time' => 'required|unique:appointments',
            ]);

        $appointment = $this->appointment->create([
                'user_id' => $user_id,
                'type_id' => $request->type_id,
                's_time' => $request->s_time,
                'symptoms' => $request->symptoms,
                'status' => 'scheduled',
                'payment_status' => 'Cancelled',
                'paid' => 0,
                'payment_gateway' => 'paypal',
                'app_str' => $this->generateRandomString(15),
            ]);
        
        $test_detail = Test::where('id', $request->type_id)->first();
        $price = $test_detail['price'];
        $title = $test_detail['test_type'];
        
        if($appointment) {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "brand_name" => $title,
                    "return_url" => route('successTransaction', ['id'=>$appointment->id, 'new_user_flag'=>$new_user_flag]),
                    "cancel_url" => route('cancelTransaction', ['id'=>$appointment->id]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $price
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                $appointment = $this->appointment->find($appointment->id);
                $appointment->payment_status = "Declined";
                $appointment->save();
                
                return redirect()
                    ->route('home')
                    ->with('error', 'Something went with transaction.');

            } else {
                $appointment = $this->appointment->find($appointment->id);
                $appointment->payment_status = "Declined";
                $appointment->save();

                return redirect()
                    ->route('createTransaction')
                    ->with('error', $response['message'] ?? 'Something went with transaction.');
            }
        } else {
            return redirect()->back()->with('fail', 'An error occured while scheduling!');
        }
    }

    public function successTransaction(Request $request)
    {
        $appointment_id = $request->id;
        $new_user_flag = $request->new_user_flag;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $appointment = $this->appointment->find($appointment_id);
            $appointment->payment_status = "Paid";
            $appointment->paid = $appointment->test->price;
            $appointment->save();

            $mail_to = $appointment->user->email;
            $param = array(
                'id' => $appointment->app_str,
                'date_time' => date('m/d/Y, H:i', strtotime($appointment->s_time)). ' ET',
                'full_name' => $appointment->user->firstname == "" ? $appointment->user->lastname : $appointment->user->firstname,
                'price_paid' => $appointment->test->price,
                'test_view' => $appointment->test->test_view,
            );
            Mail::send('email.appointment_done', $param, function ($message)  use ($mail_to) {
                $message->to($mail_to, 'Rapid-Labs LLC')->subject('Appointment has been scheduled.');
                $message->from('no-reply@rapid-labs.com', 'Rapid-Labs LLC');
            });

            if($new_user_flag == 0)
            {
                return redirect()
                // ->route('home')
                ->back()
                ->with('success', 'Appointment Is Scheduled Successfully.');
            } else {
                return redirect()
                ->back()
                // ->route('home')
                ->with('success', 'Login credential has been sent to email address and appointment is scheduled successfully.');
            }
        } else {
            $appointment = $this->appointment->find($appointment_id);
            $appointment->payment_status = "Cancelled";
            $appointment->save();
            
            return redirect()
                ->route('/')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function updateAppointmentDate(Request $request, $id)
    {
        $this->validate($request, [
            'appointment_time' => 'required',
        ]);
        $appointment = $this->appointment->find($id);
        $appointment->s_time = $request->appointment_time;
        $appointment->save();

        return redirect()->route('appointment.index')
                        ->with('success', 'Appointment time has been changed successfully');
    }

    public function updateCollectedDate(Request $request, $id)
    {
        $this->validate($request, [
            'collected_time' => 'required',
        ]);
        $appointment = $this->appointment->find($id);
        $appointment->collected_time = $request->collected_time;
        $appointment->save();

        return redirect()->route('appointment.index')
                        ->with('success', 'Collected time has been changed successfully');
    }

    public function updateReportedDate(Request $request, $id)
    {
        $this->validate($request, [
            'reported_time' => 'required',
        ]);

        $appointment = $this->appointment->find($id);
        $appointment->reported_time = $request->reported_time;
        $appointment->save();

        return redirect()->route('appointment.index')
                        ->with('success', 'Reported time has been changed successfully');
    }

    public function updateTestResult(Request $request, $id)
    {
        $this->validate($request, [
            'update_result' => 'required',
        ]);

        $appointment = $this->appointment->find($id);
        $appointment->result = $request->update_result;
        $appointment->save();

        return redirect()->route('appointment.index')
                        ->with('success', 'Test result has been changed successfully');
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        $appointment_id = $request->id;
        $appointment = $this->appointment->find($appointment_id);
            $appointment->payment_status = "Declined";
            $appointment->save();

        return redirect()
            ->route('home')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    private function fetchAllAppointmentsOrderByTestResult($pagination, $search = null, $start_date = null, $end_date = null, $filter)
    {   
        $query_output = Appointment::whereHas('user', function($q) use ($search){
            $q->where('firstname', 'like', '%'. $search. '%');
            $q->orWhere('lastname', 'like', '%'. $search. '%');
            $q->orWhere('email', 'like', '%'. $search. '%');
        })->where('payment_status', 'Paid');

        if($start_date != '' && $end_date != ''){
            $query_output = $query_output->whereBetween('reported_time', [$start_date. ' 00:00:00', $end_date. ' 23:59:59']);
        } else if($start_date != '' && $end_date == ''){
            $query_output = $query_output->where('reported_time', '>=', $start_date. ' 00:00:00');
        } else if($start_date == '' && $end_date != ''){
            $query_output = $query_output->where('reported_time', '<=', $end_date. ' 23:59:59');
        }
        
        $query_output = $query_output->orderBy('created_at', 'DESC')->get();

        return $query_output;

        // $query = $this->appointment->with('users')->query();

        // if ($search) {
        //     $query->where(function ($value) use ($search) {
        //         $value->where('user.firstname', 'like', "%{$search}%");
        //         $value->orWhere('lastname', 'like', "%{$search}%");
        //         $value->orWhere('email', 'like', "%{$search}%");
        //     });
        // }

        // $query_output = $query;

        // foreach($filter as $key => $value){
        //     $query_output = $query_output->where($key, $value);
        // }

        // $query_output = $query_output->orderBy('s_time', 'DESC')->paginate($pagination);

        // if ($search) {
        //     $query_output->appends(['search' => $search]);
        // }

        // return $query_output;
    }

    private function fetchAllAppointments($pagination, $search = null, $filter)
    {
        $query = $this->appointment->query();

        if ($search) {
            $query->where(function ($value) use ($search) {
                $value->where('firstname', 'like', "%{$search}%");
                $value->orWhere('lastname', 'like', "%{$search}%");
                $value->orWhere('email', 'like', "%{$search}%");
            });
        }

        $query_output = $query;

        foreach($filter as $key => $value){
            $query_output = $query_output->where($key, $value);
        }
        $query_output = $query_output->orderByDesc('created_at')->paginate($pagination);

        if ($search) {
            $query_output->appends(['search' => $search]);
        }

        return $query_output;
    }

    public function destroy($id)
    {
        $this->appointment = $this->appointment->find($id);
        activity()->performedOn($this->user)->withProperties(['name'=>$this->appointment->user->lastname. ' '. $this->appointment->user->firstname ,'by'=>Auth::user()->username])->causedBy(Auth::user())->log('Appointment has removed.');

        
        $this->appointment->delete();
        return redirect()->back()->with('success', 'Appointment deleted');

    }
}
