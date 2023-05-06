@extends('layouts.template')

@section('title','Create Users')
@section('style')
<style>
.dropdown-toggle::after {
  margin-left: 0.75em !important;
  color: white !important;
}  
</style>
@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.add_appointments')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('app.appointments')}}</a></li>
              <li class="breadcrumb-item active">{{__('app.add_appointments')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="schedule">
    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.includes.alerts')
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                      <div class="card wizard-card" data-color="orange" id="wizardProfile">   <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
                          <form class="form-horizontal" method="POST" action="{{route('store_walkin')}}">
                            @csrf
                              
                            <div class="wizard-header">
                                <h3>
                                  <b>Schedule</b> Your Appointment <br>
                                  <small>You can schedule appointment by following steps</small>
                                </h3>
                            </div>

                            <div class="wizard-navigation">
                                <ul>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_test_type" data-toggle="tab" >Choose Test Type</a></li>
                                    <li style="display:flex; justify-content:center; align-items:center;"><a href="#choose_information" data-toggle="tab">Information</a></li>
                                </ul>
                            </div>
                            <div class="wizard-footer height-wizard" style="margin-top:20px">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Save' />
                                </div>
                                
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-content">
                              <div class="tab-pane" id="choose_test_type">
                                  <h5>South Beach</h5>
                                  <input class="hidden-input" name="type_id" id="type_id"/>
                                  @foreach($tests as $test)
                                  <div class="test-type" test-id="{{$test->id}}" test-type="{{$test->test_type}}" price="{{$test->price}}">
                                    <input class="form-check-input radio-type" style="cursor:pointer;" type="radio" name="test_type" id="flexCheck_{{$test->id}}">
                                    <label class="form-check-label" style="cursor:pointer; width: 100%; color:#504e4e; font-weight:bold;" for="flexCheck_{{ $test->id }}">{{$test->test_view}}&nbsp;&nbsp; <span  style="color:black">${{number_format($test->price, 2)}}</span></label>
                                    <?php
                                      $descriptions = explode("\n", $test->description);
                                      foreach($descriptions as $description) {?>
                                      <label class="form-check-label" style="cursor:pointer; width: 100%; padding-left: 20px;" for="flexCheck_{{ $test->id }}">  {{ $description }}</label>
                                    <?php
                                      }?>
                                    <label class="form-check-label" style="cursor:pointer; width: 100%; padding-left: 20px; padding-top:5px; padding-bottom:5px; color:gray;" for="flexCheck_{{ $test->id }}">{{$test->sample_type}}</label>
                                    <?php
                                      $features = explode("\n", $test->features);
                                      foreach($features as $feature) {?>
                                      <label class="form-check-label" style="cursor:pointer; width: 100%; color:black; padding-left:10px;" for="flexCheck_{{ $test->id }}"> ~ {{ $feature }}</label>
                                    <?php
                                      }?>
                                  </div>
                                  @endforeach
                              </div>
                              <div class="tab-pane" id="choose_information">
                                  <div class="row">
                                      <div class="row" style="margin: auto;">
                                        <label style="font-size: 20px; font-weight:400; margin-right: 10px;">Select Customer</label>
                                        
                                        <div class="dropdown hierarchy-select" id="cusomter_select">
                                          <button type="button" class="btn btn-primary dropdown-toggle" id="example-two-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                          <div class="dropdown-menu" aria-labelledby="example-two-button">
                                              <div class="hs-searchbox">
                                                  <input type="text" class="form-control" autocomplete="off">
                                              </div>
                                              <div class="hs-menu-inner">
                                                  <a class="dropdown-item select-customer" data-value="0" data-default-selected="" style="cursor:pointer;">-- Select --</a>
                                                  @foreach($customers as $customer)
                                                  <a class="dropdown-item select-customer" data-value="{{$customer->id}}" style="cursor:pointer;">{{$customer->lastname. ' '. $customer->firstname}}</a>
                                                  @endforeach
                                              </div>
                                          </div>
                                          <input class="d-none" id="customer_id" aria-hidden="true" type="text"/>
                                        </div>
                                      </div>
                                      

                                      <div class="col-sm-12">
                                          <h4 class="info-text" style="text-align:left;"> Your information </h4>
                                      </div>

                                      <div class="col-sm-6" style="padding-right: 20px;">
                                          <div class="form-group">
                                              <label>Name <span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-5">
                                                  <input id="firstname" type="text" class="form-control" placeholder="First Name" name="firstname" value="">
                                                </div>
                                                <div class="col-sm-7">
                                                  <input id="lastname" type="text" class="form-control" placeholder="Last Name" name="lastname" value="">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Phone </label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="phone" type="text" class="form-control" placeholder="Phone number" name="phone" value="">
                                                  <label class="form-guide-level">You will receive a text message reminder before your appointment.</label>
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Email <span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="email" type="email" class="form-control" placeholder="Email Address" name="email" value="">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Confirm Email <span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="confirm_email" type="email" class="form-control" placeholder="Confirm Email Address" name="confirm_email" value="">
                                                </div>
                                              </div>
                                          </div>
                                          <label class="form-guide-level" style="font-size: 20px;">Patient Intake Form</label>
                                          <label class="form-guide-level">Please make sure that this information is entered correctly. This information needs to match your government passport or ID</label>
                                          <div class="form-group">
                                              <label>Gender <span style="color:red">*</span></label>
                                              <select id="gender" name="gender" class="form-control">
                                                  <option value="Male"> Male </option>
                                                  <option value="Female"> Female </option>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <label>Date of Birth (MM/DD/YYYY) - WARNING:USE CORRECT FORMAT<span style="color:red">*</span></label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="birth_date" name="birth_date" type="date" class="form-control" value="">
                                                </div>
                                              </div>
                                          </div>                                          
                                          <div class="form-group">
                                              <label>Passport Country</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="pass_country" name="pass_country" type="text" class="form-control">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>Passport Number</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="pass_number" name="pass_number" type="text" class="form-control">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>What is your address? (only U.S.addresses accepted)</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="address" type="text" name="address" class="form-control"  value="">
                                                </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>What is your zip code?</label>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                  <input id="zipcode" name="zipcode" type="text" class="form-control">
                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label>What is your ethnicity? <span style="color:red">*</span></label>
                                              <select name="ethnicity" class="form-control">
                                                  <option value="white"> White / Caucasian </option>
                                                  <option value="hispanic"> Hispanic or Latino </option>
                                                  <option value="indian"> American Indian or Alaska Native </option>
                                                  <option value="asian"> Asian </option>
                                                  <option value="black"> Black or African American </option>
                                                  <option value="islander"> Native Hawaiian or Other Pacific Islander </option>
                                                  <option value="other"> Other </option>
                                              </select>
                                          </div>
                                          <div class="form-group symptoms_group">
                                              <label>Symptoms <span style="color:red">*</span></label>
                                              <input class="hidden-input" id="symptoms" name="symptoms">
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="none_label">
                                                <label class="form-check-label" for="none_label">
                                                  None
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="contact_label">
                                                <label class="form-check-label" for="contact_label">
                                                  Contact with and (suspected) exposure
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="fever_label">
                                                <label class="form-check-label" for="fever_label">
                                                  Fever or chills
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="cough_label">
                                                <label class="form-check-label" for="cough_label">
                                                  Cough
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="breath_label">
                                                <label class="form-check-label" for="breath_label">
                                                  Shortness of breath / difficulty breathing
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="fatigue_label">
                                                <label class="form-check-label" for="fatigue_label">
                                                  Fatigue
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="muscle_label">
                                                <label class="form-check-label" for="muscle_label">
                                                  Muscle / body aches
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="loss_label">
                                                <label class="form-check-label" for="loss_label">
                                                  Loss of taste or smell
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="sore_label">
                                                <label class="form-check-label" for="sore_label">
                                                  Sore throats
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="runny_label">
                                                <label class="form-check-label" for="runny_label">
                                                  Congestion or runny nose
                                                </label>
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="vomiting_label">
                                                <label class="form-check-label" for="vomiting_label">
                                                  Nausea or vomiting
                                                </label>
                                              </div>
                                          </div>
                                          <label class="form-guide-level" style="font-size: 20px; font-weight:bold !important;">AKNOWLEDGMENT AND AGREEMENT</label>
                                          <label class="form-guide-level">
                                            <span><a href="{{route('refund_policy')}}" target="_blank"> Refund Policy, </a></span>
                                            <span><a href="{{route('covid_inform')}}" target="_blank"> COVID-19 Testing Authorization and Consent </a></span> and 
                                            <span><a href="{{route('terms_conditions')}}" target="_blank"> Terms and Conditions </a></span>
                                          </label>
                                          <div class="form-group">
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="label_read_it">
                                                <label class="form-check-label" for="label_read_it">
                                                  I have read and agree to the above <span style="color:red">*</span>
                                                </label>
                                                <p style="margin:0px"></p>
                                                <input class="hidden-input" name="covid_inform1" id="covid_inform1">
                                              </div>
                                              <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="label_contact_agree">
                                                <label class="form-check-label" for="label_contact_agree">
                                                  I agree to be contacted by <span style="color:#0043ff; font-weight: bold;"> rapid-labs.com </span> for transactional emails details regarding my appointment, test results and supporting content <span style="color:red">*</span>
                                                </label>
                                                <p style="margin:0px"></p>
                                                <input class="hidden-input" name="covid_inform2" id="covid_inform2">
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                              </div>
                            </div>
                            <div class="wizard-footer height-wizard">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                    <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Save' />
                                </div>

                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                          </form>
                      </div>
                    </div> <!-- wizard container -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <div class="block-ui clear">
    <div class="loading-info">
      <div class="loading-text loading">
        <div class="text" style="font-size: 16px;"> Processing Customer Info ...</div>
        <div class="loader" role="progressbar">
          <div class="rect1"></div>
          <div class="rect2"></div>
          <div class="rect3"></div>
          <div class="rect4"></div>
          <div class="rect5"></div>
        </div>
      </div>
    </div>
  </div>
    
  <!-- /.content-wrapper -->
@endsection

@section('script')
<script>
  $('document').ready(function(){
    $('#cusomter_select').hierarchySelect({
      hierarchy: false,
      width: 'auto'
    });
    
    display_width = $(document).width();
    // console.log(display_width);

    if(display_width <= 540)
    {
      $(".timeslot-header").find(".width-1-7").each(function(index) {
        if(index >= 3)
        $(this).remove();
      });
      
      $(".timeslot-body").find(".width-1-7").each(function(index) {
        if(index >= 3)
        $(this).remove();
      });
    }

    $(".select-customer").click(function(){
      var customer_id = $(this).attr('data-value');
      var param = {
        customer_id: customer_id,
      };

      $('.block-ui').removeClass('clear');

      $.ajax({
          url: "{{URL::to('/get-customer-info')}}",
          type: 'POST',
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify(param),
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (result) {
              $('.block-ui').addClass('clear');
              if(result == null)
              {
                $("#firstname").val('');
                $("#lastname").val('');
                $("#phone").val('');
                $("#email").val('');
                $("#confirm_email").val('');
                $("#gender").val('Male');
                $("#birth_date").val('');
                $("#pass_country").val('');
                $("#pass_number").val('');
                $("#address").val('');
                $("#zipcode").val('');
              } else {
                $("#firstname").val(result['firstname']);
                $("#lastname").val(result['lastname']);
                $("#phone").val(result['phone']);
                $("#email").val(result['email']);
                $("#confirm_email").val(result['email']);
                $("#gender").val(result['gender']);
                $("#birth_date").val(result['birth_date']);
                $("#pass_country").val(result['pass_country']);
                $("#pass_number").val(result['pass_number']);
                $("#address").val(result['address']);
                $("#zipcode").val(result['zipcode']);
              }
              console.log(result);
          },
      });
    })
  })

  $('.radio-type').click(function(){
    var parent = $(this).parent();

    var test_title = parent.attr('test-type');
    var price = parent.attr('price');

    $('.payment_label').html("You will be billed $"+ price + " for " + test_title + ".");

		parent.siblings().removeClass('choose-check');
		$(this).parent().addClass('choose-check');

    test_id = parent.attr('test-id');
    $("#type_id").val(test_id);
  });
  

  $('.timeslot').click(function(){
    $('.timeslot').removeClass('select-timeslot');
    $(this).addClass('select-timeslot');
    
    var time = $(this).html();
    var date = $(this).attr('date');
    var time_str = time.trim();

    var time_hour = parseInt(time_str.substr(0, time_str.length - 5));
    var time_min =  time_str.substr(time_str.length - 5, 2);
    var time_type = time_str.substr(time_str.length - 2, 2);
  

    if(time_type == "PM" && time_hour != 12)
      time_hour += 12;

    $("#s_time").val(date + " " + time_hour + ":" + time_min);
  })

  $('.symptoms_group').click(function(){
    var values = [];
    $('.symptoms_group').each(function() {
        $(this).find(".form-check-input").each(function() {
            console.log($(this)[0].checked);
            values.push($(this)[0].checked ? 1 : 0);
        });
    });

    var checked_cnt = 0;
    for(var i = 0; i < values.length - 1; i++) {
      value = values[i];
      if(value == 1){
        checked_cnt ++;
        break;
      }
    }
    if(checked_cnt == 0)
      $('#symptoms').val('');
    else
      $('#symptoms').val(JSON.stringify(values));
  })

  $("#firstname").change(function(){
    $("#pay_firstname").val($(this).val());
  })

  $("#lastname").change(function(){
    $("#pay_lastname").val($(this).val());
  })

  $("#zipcode").change(function(){
    $("#pay_zipcode").val($(this).val());
  })

  $("#label_read_it").click(function(){
    var checked = $(this)[0].checked;
    $("#covid_inform1").val(checked ? 'true' : '');
  })
  
  $("#label_contact_agree").click(function(){
    var checked = $(this)[0].checked;
    $("#covid_inform2").val(checked ? 'true' : '');
  })

  $("#label_refund_policy").click(function(){
    var checked = $(this)[0].checked;
    $("#refund_policy").val(checked ? 'true' : '');
  });

  
</script>
@endsection
