@extends('layouts.template')
@section('title','Test Types')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.client_dashboard')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">{{__('app.client_dashboard')}}</a></li>
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
                        <div class="col-md-12 mb-3">
                          <a href="{{url('/')}}#schedule" class="pull-right btn btn-primary">{{__('app.add_appointments')}}</a>
                        </div>
                        <div class="col-md-4 mb-2">
                          <form class="form" action="" method="GET">
                            <div class="input-group">
                               <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control" placeholder="{{__('app.search')}}">
                               @if(request()->input('search') && request()->input('search')!= '')
                                 <div class="input-group-append">
                                   <a class="btn btn-outline-secondary" href="{{route('appointment.index')}}" type="submit"><i class="fa fa-close"></i></a>
                                 </div>
                               @endif
                               <div class="input-group-append">
                                 <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search text-muted"></i></button>
                               </div>
                            </div>
                          </form>
                        </div>
                        <div class="col-md-12">
                          <div class="table-responsive no-padding">
                  				  <table id="" class="table table-hover table-borderless table-striped" >
                              <thead>
                      					<tr>
                                  <th style="">{{__('app.date_time_appointment')}}</th>
                      					  <th style="">{{__('app.test_view')}}</th>
                      					  <th style="">{{__('app.paid')}} ($)</th>
                                  <th>{{__('app.date_time_collected')}}</th>
                                  <th>{{__('app.date_time_reported')}}</th>
                      					  <th style="">{{__('app.test_result')}}</th>
                                  <th style="">{{__('app.pdf')}}</th>
                      					</tr>
                              </thead>
                              <tbody>
                                @if(count($appointments))
                        					@foreach($appointments as $appointment)
                        					<tr>
                                    <td>{{date('n/j/Y', strtotime($appointment->s_time)). ' '. date('g:i A', strtotime($appointment->s_time))}}</td>
                                    <td><a target="_blank" href="{{route('testtype/show', $appointment->type_id)}}">{{$appointment->test->test_view}}</a></td>
                        						<td>${{number_format($appointment->paid, 2)}}</td>
                                    <td>
                                      @if($appointment->collected_time != '' && $appointment->collected_time != '0000-00-00 00:00:00')
                                      {{date('n/j/Y', strtotime($appointment->collected_time)). ' '. date('g:i A', strtotime($appointment->collected_time))}}</td>
                                      @endif
                                    </td>
                                    <td>
                                      @if($appointment->reported_time != '' && $appointment->reported_time != '0000-00-00 00:00:00')
                                      {{date('n/j/Y', strtotime($appointment->reported_time)). ' '. date('g:i A', strtotime($appointment->reported_time))}}
                                      @endif
                                    </td>
                                    <td>{{$appointment->result}}</td>
                                    <td>
                                      @if($appointment->pdf != '')
                                        <a href="{{asset($appointment->pdf)}}" download><i class="fa fa-file-pdf-o" style="font-size: 20px; color:red; cursor: pointer;"></i></a>
                                      @endif
                                    </td>
                        					</tr>
                        					@endforeach
                                @else
                                <tr>
                                  <td colspan="7" class="text-center">
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
@endsection
