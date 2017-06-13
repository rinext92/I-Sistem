@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    @include('includes.navbar_menu')
                </div>
            {{ Form::open(array('url' => 'profileUpdate','class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) }}
            {{ csrf_field() }}
                <div class="panel-body">
                    <div class="content">
                      <div class="row">
                        @foreach ($userDetails as $no => $ud)
                          <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  &nbsp; this is edit profile
                              </div>

                              <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                      @if ($ud->img_path == "default.jpg")
                                        <img src="{{ asset('img/usr_profile/'.$ud->img_path)}}" class="img-rounded" alt="under-maintenance" width="200" height="200"/>
                                      @else
                                        <img src="{{ asset('img/usr_profile/'.$ud->id.'.'.$ud->img_path)}}" class="img-rounded" alt="under-maintenance" width="200" height="200"/>
                                        <input type="file" name="image" align="left" />
                                      @endif
                                    </div>

                                    <div class="col-sm-8">
                                      <div class="form-group{{ $errors->has('t_name') ? ' has-error' : '' }}">
                                              {{ Form::label('inputName', 'Name : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::text('t_name', $ud->name , array('class' => 'form-control','placeholder' => 'Enter Name Here', 'required' => 'required', 'style' => 'width:100%')) }}
                                              {{ $errors->first('t_name', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_icNumber') ? ' has-error' : '' }}">
                                              {{ Form::label('inputICNumber', 'IC Number : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::text('t_icNumber', $ud->icNumber , array('class' => 'form-control','placeholder' => 'Enter IC Number Here', 'required' => 'required', 'style' => 'width:100%')) }}
                                              {{ $errors->first('t_icNumber', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_password') ? ' has-error' : '' }}">
                                              {{ Form::label('inputPassword', 'New Password : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::password('t_password', array('class' => 'form-control', 'data-toggle' => 'password')) }}
                                              {{ $errors->first('t_password', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_cpassword') ? ' has-error' : '' }}">
                                              {{ Form::label('inputCPassword', 'Confirm Password : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::password('t_cpassword', array('class' => 'form-control', 'data-toggle' => 'password')) }}
                                              {{ $errors->first('t_cpassword', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_email') ? ' has-error' : '' }}">
                                              {{ Form::label('inputEmail', 'Email : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::email('t_email', $ud->email , array('class' => 'form-control','placeholder' => 'Enter Email Here', 'required' => 'required', 'style' => 'width:100%')) }}
                                              {{ $errors->first('t_email', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_age') ? ' has-error' : '' }}">
                                              {{ Form::label('inputAge', 'Age : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::number('t_age', $ud->age , array('class' => 'form-control','placeholder' => 'Enter Age Here', 'required' => 'required', 'style' => 'width:100%')) }}
                                              {{ $errors->first('t_age', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_gender') ? ' has-error' : '' }}">
                                              {{ Form::label('inputGender', 'Gender : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::select('t_gender', array('Male' => 'Male', 'Female' => 'Female'), $ud->gender, ['class' => 'form-control']) }}
                                              {{ $errors->first('t_gender', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_status') ? ' has-error' : '' }}">
                                              {{ Form::label('inputStatus', 'Status : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::select('t_status', array('Single' => 'Single', 'Married' => 'Married', 'Divorced' => 'Divorced'), $ud->status, ['class' => 'form-control']) }}
                                              {{ $errors->first('t_status', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                      <div class="form-group{{ $errors->has('t_address') ? ' has-error' : '' }}">
                                              {{ Form::label('inputAddress', 'Address : ', array('class' => 'col-sm-3 control-label')) }}
                                              <div class="col-sm-7">
                                              {{ Form::textarea('t_address', $ud->address, ['class' => 'form-control', 'size' => '30x5', 'style' => 'resize:none']) }}
                                              {{ $errors->first('t_address', '<p class="help-block">:message</p>') }}
                                          </div>
                                      </div>
                                  

                                
                                    </div>
                                </div>
                              </div>

                              <div class="panel-footer" id="footerProfile">
                                  {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript">

  $("#password").password('toggle');

</script>
