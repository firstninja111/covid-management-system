<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Test;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class HomeController extends Controller
{
    protected $test;
    protected $appointment;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Test $test, Appointment $appointment, Countries $country)
    {
                   
        // if(setting('email_verification')){
        //   $this->middleware(['verified']);
        // }
        // $this->middleware(['auth','2fa','web']);
        $this->test = $test;
        $this->appointment = $appointment;
        $this->countries = $country->all()->sortBy('name.common')->pluck('name.common');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->back();

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
        
        return view("home", [
              'tests' => $test_fetch,
              'date_slots' => $date_slots,
              'time_slots' => $time_slots,
              'countries' => $this->countries,
            ]);
    }


}
