@extends('layouts.template')

@section('title','Edit Users')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>{{$user->lastname. ' '. $user->firstname}}</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('app.home')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">{{__('app.users')}}</a></li>
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
      <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item shadow mb-3 mr-2">
                      <a class="nav-link active" id="account-details-tab" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">{{__('app.account_details')}}</a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content mt-3">
                    <div class="tab-pane active" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">                      
                          <form class="form-horizontal" method="POST" action="{{route('user.update',$user->id)}}">
                              @csrf
                              @method('put')
                                  <input id="redirect" name="redirect" value="{{$redirect}}" hidden>
                                  <div class="row form-group">
                                    <div class="col-md-6 mt-1" style="display: {{Auth::user()->roles->first()->name == 'admin' ? 'block' : 'none'}}">
                                        <label for="mobile">{{__('app.role')}}</label>
                                        <select name="role" class="form-control form-control-inline-block">
                                          @foreach($roles as $role)
                                            <option value="{{$role->name}}" {{((($user_role)? $user_role->name:'') == $role->name)? 'selected':''}}>{{$role->name}}</option>
                                          @endforeach
                                          @if ($errors->has('role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                          @endif
                                      </select>
                                    </div>
                                    <div class="col-md-6 mt-1" style="display: {{Auth::user()->roles->first()->name == 'admin' ? 'block' : 'none'}}">
                                        <label for="mobile">{{__('app.status')}}</label>
                                        <select name="status" class="form-control form-control-inline-block">
                                            <option value="active" {{($user->status == 'active')? 'selected':''}}>{{'Active'}}</option>
                                            <option value="banned" {{($user->status == 'banned')? 'selected':''}}>{{'Banned'}}</option>
                                          @if ($errors->has('status'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                          @endif
                                      </select>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.lastname')}} <span style="color:red">*</span></label></div>
                                      <input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control" >
                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.pass_country')}} </label></div>
                                      <input type="text" name="pass_country" value="{{ $user->pass_country }}" class="form-control" >
                                        @if ($errors->has('pass_country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('pass_country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.firstname')}} <span style="color:red">*</span></label></div>
                                      <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control" >
                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.pass_number')}}</label></div>
                                      <input type="text" name="pass_number" value="{{$user->pass_number}}" class="form-control" placeholder="Passport No." >
                                      @if ($errors->has('pass_number'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('pass_number') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.email')}} <span style="color:red">*</span></label></div>
                                      <input type="text" name="email" value="{{$user->email}}" class="form-control" >
                                      @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.confirm_email')}} <span style="color:red">*</span></label></div>
                                      <input type="text" name="confirm_email" value="{{$user->email}}" class="form-control" >
                                      @if ($errors->has('confirm_email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('confirm_email') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    
                                    <div class="col-md-6 mt-1">
                                      <label for="mobile">{{__('app.gender')}}</label>
                                      <select name="gender" class="form-control form-control-inline-block">
                                        
                                          <option value="Male" {{ ($user->gender == 'Male')? 'selected':'' }}>Male</option>
                                          <option value="Female" {{ ($user->gender == 'Female')? 'selected':'' }}>Female</option>
                                        
                                          @if ($errors->has('gender'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('gender') }}</strong>
                                          </span>
                                          @endif
                                      </select>
                                    </div>
                                    
                                    
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.birthday')}}</label></div>
                                      <input type="date" name="birth_date" value="{{$user->birth_date}}" class="form-control" placeholder="Birthday" >
                                      @if ($errors->has('birth_date'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('birth_date') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.address')}}</label></div>
                                      <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="Address" >
                                      @if ($errors->has('address'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('address') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.phone')}}</label></div>
                                      <input type="text" name="phone" value="{{$user->phone}}" class="form-control" placeholder="Phone" >
                                      @if ($errors->has('phone'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('phone') }}</strong>
                                          </span>
                                      @endif
                                    </div>

                                    <div class="col-md-6 mt-1">
                                      <div><label class="label-block">{{__('app.zipcode')}}</label></div>
                                      <input type="text" name="zipcode" value="{{$user->zipcode}}" class="form-control" placeholder="Zip Code" >
                                      @if ($errors->has('zipcode'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('zipcode') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                                    
                                    <div class="col-md-6 mt-1">
                                      <label for="mobile">{{__('app.ethnicity')}}</label>
                                      <select name="ethnicity" class="form-control form-control-inline-block">
                                          <option value="white" {{ ($user->ethnicity == 'white')? 'selected':'' }}> White / Caucasian </option>
                                          <option value="hispanic" {{ ($user->ethnicity == 'hispanic')? 'selected':'' }}> Hispanic or Latino </option>
                                          <option value="indian" {{ ($user->ethnicity == 'indian')? 'selected':'' }}> American Indian or Alaska Native </option>
                                          <option value="asian" {{ ($user->ethnicity == 'asian')? 'selected':'' }}> Asian </option>
                                          <option value="black" {{ ($user->ethnicity == 'black')? 'selected':'' }}> Black or African American </option>
                                          <option value="islander" {{ ($user->ethnicity == 'islander')? 'selected':'' }}> Native Hawaiian or Other Pacific Islander </option>
                                          <option value="other" {{ ($user->ethnicity == 'other')? 'selected':'' }}> Other </option>
                                        
                                          @if ($errors->has('ethnicity'))
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $errors->first('ethnicity') }}</strong>
                                          </span>
                                          @endif
                                      </select>
                                    </div>  
                                    <div class="col-md-6 mt-1" style="display: {{Auth::user()->roles->first()->name == 'admin' ? 'block' : 'none'}}">
                                      <div><label class="label-block">{{__('app.username')}} <span style="color:red">*</span></label></div>
                                      <input type="text" name="username" value="{{$user->username}}" class="form-control" autocomplete="off">
                                      @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="col-md-6  mt-1" style="display: {{Auth::user()->roles->first()->name == 'admin' ? 'block' : 'none'}}">
                                      <div><label class="label-block">{{__('app.password')}}</label></div>
                                      <input type="password" name="password" value="" placeholder="{{__('app.leave_blank')}}" class="form-control" autocomplete="off">
                                      @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="col-md-6  mt-1" style="display: {{Auth::user()->roles->first()->name == 'admin' ? 'block' : 'none'}}">
                                      <div><label class="label-block">{{__('app.confirm_password')}}</label></div>
                                      <input type="password" name="password_confirmation" value="" placeholder="{{__('app.leave_blank')}}" class="form-control" autocomplete="off">
                                      @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                      @endif
                                    </div>


                                  </div>

                                <div class="col-md-8 mx-auto">
                                  <button type="submit" class="btn btn-primary col-sm-12">{{__('app.update_account')}}</button>
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
