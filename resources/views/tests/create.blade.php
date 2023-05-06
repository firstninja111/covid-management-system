@extends('layouts.template')

@section('title','Create Test Type')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{__('app.create_test_type')}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
              <li class="breadcrumb-item"><a href="{{route('test.index')}}">{{__('app.test_types')}}</a></li>
              <li class="breadcrumb-item active">{{__('app.create')}}</li>
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
                  <form class="form-horizontal" method="POST" action="{{route('test.store')}}">
                      @csrf
                    <!-- Test Type Details -->
                      <div class="card">
                          <!-- /.card-header -->
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12 mb-2">
                                <h5 class="pull-right">{{__('app.test_type_detail')}}</h5>
                                <hr class="my-4">
                              </div>
                                <hr>
                              <div class="col-md-12">
                                <div class="form-row mb-3">
                                  <div class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.test_view')}}</label>
                                      <input type="text" name="test_view" value="{{old('test_view')}}" placeholder="{{__('app.test_view')}}" class="form-control" id="test_view">
                                      @error('test_view')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.test_type')}}</label>
                                      <input type="text" name="test_type" value="{{old('test_type')}}" placeholder="{{__('app.test_type')}}" class="form-control" id="test_type">
                                      @error('test_type')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.sample_type')}}</label>
                                      <input type="text" name="sample_type" value="{{old('sample_type')}}" placeholder="{{__('app.sample_type')}}" class="form-control" id="sample_type">
                                      @error('sample_type')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div class="col-sm-12 mb-1">
                                      <label for="name">{{__('app.pdf_template')}}</label>
                                      <select name="template_id" class="form-control">
                                        @foreach($templates as $template)
                                        <option value="{{$template->id}}">{{$template->name}}</option>
                                        @endforeach
                                      </select>
                                      @error('template_id')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                
                                <div class="form-row mb-3">
                                  <div id="description" class="col-sm-12">
                                     <label for="name" class="mb-1">{{__('app.description')}}</label>
                                      <textarea type="text" name="description" value="{{old('description')}}" placeholder="{{__('app.description')}}" class="form-control" rows="4"></textarea>
                                      @error('description')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div id="features" class="col-sm-12 mb-1">
                                     <label for="name">{{__('app.features')}}</label>
                                      <textarea type="text" name="features" value="{{old('features')}}" placeholder="{{__('app.features')}}" class="form-control" rows="4"></textarea>
                                      @error('features')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div id="price" class="col-sm-12 mb-1">
                                     <label for="name">{{__('app.price')}} ($)</label>
                                      <input type="text" name="price" value="{{old('price')}}" placeholder="{{__('app.price')}}" class="form-control">
                                      @error('price')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3" style="margin-top: 20px;">
                                  <div id="color" class="col-sm-12">
                                    <label for="head" class="mb-1" style="margin-right: 20px;">{{__('app.font_color')}}</label>
                                    <input type="color" id="test_color" name="test_color"
                                          value="{{old('test_color')}}" style="width:200px; padding: 3px; height: 35px;">
                                    @error('test_color')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-row mb-3" style="margin-top: 20px;">
                                  <div id="color" class="col-sm-12">
                                    <label for="head" class="mb-1" style="margin-right: 20px;">{{__('app.background_color')}}</label>
                                    <input type="color" id="test_backgroundcolor" name="test_backgroundcolor"
                                          value="{{old('test_backgroundcolor')}}" style="width:200px; padding: 3px; height: 35px;">
                                    @error('test_backgroundcolor')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-8 mx-auto mt-4">
                              <button type="submit" class="btn btn-primary col-md-12">{{__('app.create_test_type')}}</button>
                            </div>
                          </div>
                          <!-- /.card-body -->
                      </div>
                    <!-- Test Type Details -->
                  </form>
                  <!-- form end -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
