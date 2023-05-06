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
            <h1>{{__('app.pdf_templates')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('test.index')}}">{{__('app.pdf_templates')}}</a></li>
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
                          <a href="{{route('pdf_template.create')}}" class="pull-right btn btn-primary">{{__('app.create_template')}}</a>
                        </div>
                        <div class="col-md-4 mb-2">
                          <form class="form" action="" method="GET">
                            <div class="input-group">
                               <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control" placeholder="{{__('app.search')}}">
                               @if(request()->input('search') && request()->input('search')!= '')
                                 <div class="input-group-append">
                                   <a class="btn btn-outline-secondary" href="{{route('test.index')}}" type="submit"><i class="fa fa-close"></i></a>
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
                                  <th>{{__('app.id')}}</th>
                                  <th>{{__('app.template_name')}}</th>
                                  <th>{{__('app.result_type')}}</th>
                                  <th>{{__('app.qrcode_visibility')}}</th>
                                  <th></th>
                      					</tr>
                              </thead>
                              <tbody>
                                @if(count($templates))
                        					@foreach($templates as $template)
                        					<tr>
                                    <td>{{$template->id}}</td>
                        						<td><a href="{{route('pdf_template.edit',$template->id)}}">{{$template->name}}</a></td>
                                    <td>{{$template->result_type}}</td>
                                    <td>{{$template->qr_code == 1 ? 'Show' : 'Hide'}}</td>
                        						<td>
                                        <div class="d-inline-block">
                                          <a href="{{url($template->preview_url)}}" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-eye" data-toggle="tooltip"  data-placement="bottom" title="{{__('app.view_template')}}"></i></a>
                                        </div>
                                        <div class="d-inline-block">
                                          <a href="{{route('pdf_template.edit',$template->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit" data-toggle="tooltip"  data-placement="bottom" title="{{__('app.edit_template')}}"></i></a>
                                        </div>
                                        <div class="d-inline-block">
                                          <form action="{{route('pdf_template.destroy',$template->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteTemplate{{$template->id}}"><i class='fa fa-trash'></i></button>
                                            <div class="modal fade" id="deleteTemplate{{$template->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteTemplateLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-body text-center">
                                                  <h3 class="mb-4">{{__('app.please_confirm')}}</h3>
                                                  <p class="mb-5">{{__('app.delete_template_confirm')}}</p>
                                                  <button type="button" class="btn btn-secondary col-md-5 pull-left" data-dismiss="modal">{{__('app.close')}}</button>
                                                  <button type="submit" class="btn btn-danger col-md-6 pull-right">{{__('app.delete')}}</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          </form>
                                        </div>
                                      <!-- </div> -->
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

