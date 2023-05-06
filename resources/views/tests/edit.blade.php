@extends('layouts.template')

@section('title','Edit Users')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>{{__('app.edit_test_type')}}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('test.index')}}">{{__('app.test_types')}}</a></li>
            <li class="breadcrumb-item active">{{__('app.edit')}}</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
         @include('layouts.includes.alerts')
        <!-- Profile Image -->
        <div class="card">
          <div class="card-body text-center">
          <div class="row">
            <div class="col-md-12">
              <i class="fa fa-ambulance" style="font-size: 60px;"></i>
              <h4 class="mt-3 mb-0"><b>{{$test->test_view}}</b></h4>
              <h5 class="mt-3 mb-0"><b>{{$test->test_type}}</b></h5>
              <p class="mb-0">{{$test->sample_type}}</p>
              <p>$ {{number_format($test->price, 2)}}</p>
            </div>
            <div class="col-md-12">
              <code><textarea class="code_area" rows="<?= substr_count($test->description, "\n") + 4 ?>" disabled><?= "Description: \n  ". str_replace("\n", "\n  ", $test->description) ?></textarea></code>
            </div>
            <div class="col-md-12">
              <code><textarea class="code_area" rows="<?= substr_count($test->features, "\n") + 4 ?>" disabled><?= "Features: \n ~ ". str_replace("\n", "\n ~ ", $test->features) ?></textarea></code>
            </div>
            <div class="col-md-12">
              <span class="mt-0 d-block">
                <p><b>Last Updated:</b>
                    {{empty($test->updated_at)? 'Yet to update': ($test->updated_at)->diffForHumans() }}
                </p>
              </span>
            </div>
          </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link active" id="test-type-details-tab" data-toggle="tab" href="#test-type-details" role="tab" aria-controls="account-details" aria-selected="false">{{__('app.test_type_detail')}}</a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  
                  <div class="tab-content mt-3">
                    <div class="tab-pane active" id="test-type-details" role="tabpanel" aria-labelledby="test-type-details-tab">
                          <form class="form-horizontal" method="POST" action="{{route('test.update',$test->id)}}">
                              @csrf
                              @method('put')
                                  <div class="row form-group">
                                    <div class="col-sm-12 mt-3">
                                      <label for="test_view" class="control-label mb-1">{{__('app.test_view')}}</label>
                                      <input type="text" name="test_view" class="form-control" value="{{$test->test_view}}" id="test_view" placeholder="{{__('app.test_view')}}">
                                      @if ($errors->has('test_view'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('test_view') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                      <label for="test_type" class="control-label mb-1">{{__('app.test_type')}}</label>
                                      <input type="text" name="test_type" class="form-control" value="{{$test->test_type}}" id="test_type" placeholder="{{__('app.test_type')}}">
                                      @if ($errors->has('test_type'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('test_type') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                      <label for="sample_type" class="control-label mb-1">{{__('app.sample_type')}}</label>
                                      <input type="text" name="sample_type" class="form-control" value="{{$test->sample_type}}" id="sample_type" placeholder="{{__('app.sample_type')}}">
                                      @if ($errors->has('sample_type'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('sample_type') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                      <label for="name" class="mb-1">{{__('app.pdf_template')}}</label>
                                      <select name="template_id" class="form-control">
                                        @foreach($templates as $template)
                                        <option value="{{$template->id}}" {{$test->template_id == $template->id ? 'selected' : ''}}>{{$template->name}}</option>
                                        @endforeach
                                      </select>
                                      @error('template_id')
                                          <span class="text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                      <label for="description" class="control-label mb-1">{{__('app.description')}}</label>
                                      <textarea type="text" name="description" class="form-control" value="{{$test->description}}" id="description" placeholder="{{__('app.description')}}" rows="4">{{$test->description}}</textarea>
                                      @if ($errors->has('description'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('description') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    
                                    <div id="features" class="col-sm-12 mt-3">
                                        <label for="name" class=" mb-1">{{__('app.features')}}</label>
                                        <textarea type="text" name="features" value="{{$test->features}}" placeholder="{{__('app.features')}}" class="form-control" rows="4">{{$test->features}}</textarea>
                                        @if ($errors->has('features'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('features') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                    
                                    <div class="col-sm-12 mt-3">
                                      <label for="price" class="control-label mb-1">{{__('app.price')}} ($)</label>
                                      <input type="text" name="price" class="form-control" value="{{$test->price}}" id="price" placeholder="{{__('app.price')}}">
                                      @if ($errors->has('price'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('price') }}</strong>
                                          </span>
                                      @endif
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                      <label for="color" class="control-label mb-1">{{__('app.font_color')}}</label>
                                      <input type="color" id="test_color" name="test_color" class="form-control" value="{{ $test->test_color }}" style="width:200px; padding: 3px;">
                                      @if ($errors->has('test_color'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('test_color') }}</strong>
                                          </span>
                                      @endif
                                    </div>

                                    <div class="col-sm-12 mt-3">
                                      <label for="color" class="control-label mb-1">{{__('app.background_color')}}</label>
                                      <input type="color" id="test_backgroundcolor" name="test_backgroundcolor" class="form-control" value="{{ $test->test_backgroundcolor }}" style="width:200px; padding: 3px;">
                                      @if ($errors->has('test_backgroundcolor'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('test_backgroundcolor') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                  </div>

                                <div class="col-md-8 mx-auto">
                                  @if($mode == "edit")
                                  <button type="submit" class="btn btn-primary col-sm-12">{{__('app.update_test_type')}}</button>
                                  @endif
                                </div>
                        </form>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div>
  </section>
        <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
