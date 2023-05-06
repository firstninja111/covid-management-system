@extends('layouts.template')
@section('title','Appointments')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.admin_dashboard')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('app.admin_dashboard')}}</a></li>
              <li class="breadcrumb-item active">{{__('app.view')}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
          <div class="row">
             <div class="col-12">
  		           @include('layouts.includes.alerts')
                  <div class="card">

                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 mb-3 d-flex" style="justify-content:space-between">
                          <a href="{{route('appointment.create')}}" class="pull-right btn btn-primary">{{__('app.add_report')}}</a>
                          <a href="{{route('export_csv')}}" class="pull-right btn btn-danger mr-3">{{__('app.export_csv')}}</a>
                        </div>


                        <form id="searchForm" class="form w-100" action="" method="GET">
                          <div class="row">
                            <div class="col-lg-2 col-md-5 col-sm-5 mb-2">
                                <div class="">
                                  <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control" placeholder="{{__('app.search')}}">
                                  
                                  <div style="position:absolute; right:20px; font-size:16px; top:5px;">
                                    <i class="fa fa-search text-muted"></i>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-7 mb-2">
                              <div class="d-flex mb-2">
                                <input type="date" id="start_date" name="start_date" value="{{ request()->input('start_date') }}" class="form-control" style="width: 150px;">
                                <label style="margin-right: 10px; margin-left: 10px; font-size: 20px;"> ~ </label>
                                <input type="date" id="end_date" name="end_date" value="{{ request()->input('end_date') }}" class="form-control" style="width: 150px;">
                                <button class="btn btn-danger" style="margin-left: 10px;" type="submit">Filter</button>
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-2 d-flex justify-content-end">
                                <button id="searchToday" class="btn btn-primary rangeSearch" type="button" style="margin-left: 30px;" data-start-date = "{{$today}}" data-end-date = "{{$today}}">Today</button>
                                <button id="searchYesterday" class="btn btn-primary rangeSearch" type="button" style="margin-left: 10px;" data-start-date = "{{$yesterday}}" data-end-date = "{{$today}}">Yesterday</button>
                                <button id="searchLastWeek" class="btn btn-primary rangeSearch" type="button" style="margin-left: 10px;" data-start-date = "{{$weekago}}" data-end-date = "{{$today}}">Last Week</button>
                            </div>
                          </div>
                        
                        </form>

                        <div class="col-md-12">
                          <div class="table-responsive no-padding">
                  				  <table id="" class="table table-hover table-borderless table-striped" >
                              <thead>
                      					<tr>
                                  <!-- <th style="width:10%;">{{__('app.date_time_appointment')}}</th> -->
                      					  <th style="width:6%;">{{__('app.lastname')}}</th>
                      					  <th style="width:6%;">{{__('app.firstname')}}</th>
                                  <th style="width:30%;">{{__('app.test_view')}}</th>
                                  <th style="width:5%;">{{__('app.date_time_collected')}}</th>
                                  <th style="width:5%;">{{__('app.date_time_reported')}}</th>
                                  <th style="width:8%;">{{__('app.test_result')}}</th>
                                  <th style="width:5%;">{{__('app.confirm')}} / {{__('app.pdf')}}</th>
                                  <th style="width:9%;">{{__('app.resend_pdf')}}</th>
                                  <th style="width:5%;">{{__('app.action')}}</th>
                      					</tr>
                              </thead>
                              <tbody>
                                @if(count($appointments))
                        					@foreach($appointments as $appointment)
                        					<tr style="background-color: {{$appointment->test->test_backgroundcolor}}">
                                    <!-- <td>
                                      <form action="{{route('updateAppointmentDate',$appointment->id)}}" method="POST">
                                        @csrf
                                        <span class="bouncing" data-toggle="modal"  data-target="#editAppointmentTime{{$appointment->id}}">{{date('n/j/Y', strtotime($appointment->s_time)). ' '. date('g:i A', strtotime($appointment->s_time))}}</span>
                                        <div class="modal fade" id="editAppointmentTime{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="editAppointmentLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body text-center">
                                                <h3 class="mb-3">{{__('app.please_confirm')}}</h3>
                                                <p class="mb-4">{{__('app.change_appointment_time_confirm')}}</p>
                                                <p class="mb-2">Original Time: {{date('n/j/Y', strtotime($appointment->s_time)). ' '. date('g:i A', strtotime($appointment->s_time))}}</p>
                                                <div class="mb-4">
                                                  <input name="appointment_time" type="datetime-local" style="font-size: 20px;" value="{{$appointment->s_time}}">
                                                </div>
                                                <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.change')}}</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                    </td> -->
                        						<td><a class="bouncing" href="{{route('user.edit',$appointment->user->id)}}?redirect=appointment" style="color: {{$appointment->test->test_color}} !important;">{{$appointment->user->lastname}}</a></td>
                                    <td><a class="bouncing" href="{{route('user.edit',$appointment->user->id)}}?redirect=appointment" style="color: {{$appointment->test->test_color}} !important;">{{$appointment->user->firstname}}</a></td>
                                    
                        						<td style="font-weight:bold; color: {{$appointment->test->test_color}} !important;">{{$appointment->test->test_view}}</td>
                                    <td>
                                      @if($appointment->payment_status != "Cancelled")
                                        @if($appointment->collected_time != '' && $appointment->collected_time != '0000-00-00 00:00:00')
                                          <form action="{{route('updateCollectedDate',$appointment->id)}}" method="POST">
                                          @csrf
                                          <span class="bouncing" data-toggle="modal"  data-target="#editCollectedTime{{$appointment->id}}" style="color: {{$appointment->test->test_color}} !important;">{{date('n/j/Y', strtotime($appointment->collected_time)). ' '. date('g:i A', strtotime($appointment->collected_time))}}</span>
                                          <div class="modal fade" id="editCollectedTime{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="editCollectedLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-body text-center">
                                                  <h3 class="mb-3">{{__('app.please_confirm')}}</h3>
                                                  <p class="mb-4">{{__('app.change_collected_time_confirm')}}</p>
                                                  <p class="mb-2">Original Time: {{date('n/j/Y', strtotime($appointment->collected_time)). ' '. date('g:i A', strtotime($appointment->collected_time))}}</p>
                                                  <div class="mb-4">
                                                    <input class="form-control" name="collected_time" type="datetime-local" style="font-size: 20px; width:250px; margin:auto;" value="{{$appointment->collected_time}}">
                                                  </div>
                                                  <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                  <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.change')}}</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </form>
                                        @else
                                          <input class="form-control collected_time" id="collected_time_{{$appointment->id}}" type="datetime-local" style="width:200px;" data-id="{{$appointment->id}}">
                                        @endif
                                      @endif
                                    </td>
                                    <td>
                                      @if($appointment->payment_status != "Cancelled")
                                        @if($appointment->reported_time != '' && $appointment->reported_time != '0000-00-00 00:00:00')
                                          <form action="{{route('updateReportedDate',$appointment->id)}}" method="POST">
                                            @csrf
                                            <span class="bouncing" data-toggle="modal" data-target="#editReportedTime{{$appointment->id}}" style="color: {{$appointment->test->test_color}} !important;">{{date('n/j/Y', strtotime($appointment->reported_time)). ' '. date('g:i A', strtotime($appointment->reported_time))}}</span>
                                            <div class="modal fade" id="editReportedTime{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="editReportedLabel" aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-body text-center">
                                                    <h3 class="mb-3">{{__('app.please_confirm')}}</h3>
                                                    <p class="mb-4">{{__('app.change_reported_time_confirm')}}</p>
                                                    <p class="mb-2">Original Time: {{date('n/j/Y', strtotime($appointment->reported_time)). ' '. date('g:i A', strtotime($appointment->reported_time))}}</p>
                                                    <div class="mb-4">
                                                      <input class="form-control" name="reported_time" type="datetime-local" style="font-size: 20px; width:250px; margin:auto;" value="{{$appointment->reported_time}}">
                                                    </div>
                                                    <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                    <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.change')}}</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </form>
                                        @else
                                          <input class="form-control" id="reported_time_{{$appointment->id}}" type="datetime-local" style="width:200px;">
                                        @endif
                                      @endif
                                    </td>
                                    @if($appointment->result == '')
                                    <td>
                                      @if($appointment->payment_status != "Cancelled")
                                        @if($appointment->test->template->result_type == "Positive/Negative")
                                        <select name="result" style="padding: 0px;" class="form-control result" id="result_{{$appointment->id}}" data-id="{{$appointment->id}}">
                                            <option value=""> -- Select -- </option>
                                            <option value="Positive"> Positive </option>
                                            <option value="Negative"> Negative </option>
                                            <option value="Inconclusive"> Inconclusive </option>
                                        </select>
                                        @else
                                        <input class="form-control" id="result_{{$appointment->id}}" type="text">
                                        @endif
                                      @endif
                                    </td>
                                    @else
                                    <td>
                                      <form action="{{route('updateTestResult',$appointment->id)}}" method="POST">
                                        @csrf
                                        <span class="bouncing" data-toggle="modal"  data-target="#editResult{{$appointment->id}}" style="color: {{$appointment->test->test_color}} !important;">{{$appointment->result}}</span>
                                        <div class="modal fade" id="editResult{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="editResultLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body text-center">
                                                <h3 class="mb-3">{{__('app.please_confirm')}}</h3>
                                                <p class="mb-4">{{__('app.change_result_confirm')}}</p>
                                                <p class="mb-2">Original Result: {{$appointment->result}}</p>
                                                <div class="mb-4" style="width: 80%; margin: auto;">
                                                  @if($appointment->test->template->result_type == "Positive/Negative")
                                                  <select name="update_result" style="padding: 0px;" class="form-control result">
                                                      <option value=""> -- Select -- </option>
                                                      <option value="Positive"> Positive </option>
                                                      <option value="Negative"> Negative </option>
                                                  </select>
                                                  @else
                                                  <input class="form-control" name="update_result" type="text">
                                                  @endif
                                                </div>
                                                <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.change')}}</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                    </td>
                                    @endif
                                    <td style="text-align:center; ">
                                      @if($appointment->payment_status != "Cancelled")
                                        @if($appointment->reported_time == '0000-00-00 00:00:00' || $appointment->collected_time == '0000-00-00 00:00:00' || $appointment->reported_time == '' || $appointment->collected_time == '' || $appointment->result == '')
                                        <button class="btn-success confirm" style="width:100%;" data-id="{{$appointment->id}}"><i class="fa fa-check" style="cursor: pointer;"></i></button>
                                        @endif
                                        @if($appointment->pdf != '')
                                          <a href="{{asset($appointment->pdf)}}" download><i class="fa fa-file-pdf-o" style="font-size: 20px; color:red; cursor: pointer;"></i></a>
                                        @endif
                                      @endif
                                    </td>
                                    <td style="text-align:center; ">
                                      @if($appointment->pdf != '')
                                      <button class="btn-primary btn resend_pdf" style="width:100%; font-size: 14px;" data-email="{{$appointment->email}}" data-id="{{$appointment->id}}"><i class="fa fa-refresh" style="cursor: pointer; margin-right:5px;"></i>Resend</button>
                                      @endif
                                    </td>
                                    <td>
                                      @if(Auth::user()->roles->first()->name == 'admin')
                                        <form action="{{route('appointment.destroy',$appointment->id)}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAppointment{{$appointment->id}}"><i class='fa fa-trash' style='font-size: 16px;'></i></button>
                                          <div class="modal fade" id="deleteAppointment{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteAppointmentLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-body text-center">
                                                <h3 class="mb-4">{{__('app.please_confirm')}}</h3>
                                                <p class="mb-5">{{__('app.delete_appointment_confirm')}}</p>
                                                <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.delete')}}</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </form>
                                      @endif
                                    </td>
                        					</tr>
                        					@endforeach
                                @else
                                <tr>
                                  <td colspan="13" class="text-center">
                                    <p><i>{{__('app.no_record')}}</i></p>
                                  </td>
                                </tr>
                                @endif
                              </tbody>
                  				  </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
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
          <div class="text" style="font-size: 16px;"> Processing Appointment ...</div>
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
@endsection

@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

<script>
  $('.collected_time').change(function(){
    var appointment_id = $(this).attr('data-id');
    var collected_time = $(this).val();

    var param = {
        appointment_id : appointment_id,
        collected_time : collected_time,
      };
    $.ajax({
          url: "{{URL::to('/saveTemporaryCollectedTime')}}",
          type: 'POST',
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify(param),
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (result) {
              console.log(result);
              if(result == "success"){
                window.location.reload();
              }
          },
      });
    // alert(appointment_id);
  });

  $('.confirm').click(function(){
    var appoint_id = $(this).attr('data-id');
    
    var collected_time = $("#collected_time_" + appoint_id).val();
    if(collected_time == "")
    {
      swal("Confirm", "Please fill the collected time first.", "error");
      return;
    }
    var reported_time = $("#reported_time_" + appoint_id).val();
    var result = $("#result_" + appoint_id).val();

    if(reported_time == '')
    {
      swal("Confirm", "Please fill the reported time.", "error");
      return;
    }
    if(result == '')
    {
      swal("Confirm", "Please fill the test result.", "error");
      return;
    }

    swal({
      title: "Confirm",
      text: "Do you confirm to set test result to " + result + "?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: (result == "Positive" ? "btn-danger" : "btn-primary"),
      confirmButtonText: "Set To " + result,
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
          var param = {
            appointment_id : appoint_id,
            // collected_time : collected_time,
            reported_time : reported_time,
            result : result,
          };
          $('.block-ui').removeClass('clear');

          $.ajax({
              url: "{{URL::to('/setTestResult')}}",
              type: 'POST',
              dataType: 'json',
              contentType: 'application/json',
              data: JSON.stringify(param),
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (result) {
                  console.log(result);
                  if(result == "success"){
                    $('.block-ui').addClass('clear');

                    window.location.reload();
                  }
              },
          });
         
      } else {
        swal("Cancelled", "You have cancelled to set test result.", "error");
      }
    });
  });

  $('.resend_pdf').click(function(){
    var appoint_id = $(this).attr('data-id');
    var appoint_email = $(this).attr('data-email');

    swal({
      title: "Confirm",
      text: "Do you confirm to resend pdf to " + appoint_email + "?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-primary",
      confirmButtonText: "Resend",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
          var param = {
            appointment_id : appoint_id,
          };
          $('.block-ui').removeClass('clear');

          $.ajax({
              url: "{{URL::to('/resendPdf')}}",
              type: 'POST',
              dataType: 'json',
              contentType: 'application/json',
              data: JSON.stringify(param),
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function (result) {
                  console.log(result);
                  if(result == "success"){                    
                    swal("Success", "You resend pdf via email successfully.", "success");
                    $('.block-ui').addClass('clear');

                    window.location.reload();
                  }
              },
          });
         
      } else {
        swal("Cancelled", "You have cancelled to resend pdf via email.", "error");
      }
    });
  });

  $(".rangeSearch").click(function(){
    $("#search_key").val('');
    $("#start_date").val($(this).attr('data-start-date'));
    $("#end_date").val($(this).attr('data-end-date'));
    $("#searchForm").submit();
  });

</script>
@endsection