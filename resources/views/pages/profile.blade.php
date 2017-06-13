@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    @include('includes.navbar_menu')
                </div>

                <div class="panel-body">
                    <div class="content">
                      <div class="row">
                        @foreach ($userDetails as $no => $ud)
                          <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                  &nbsp;
                              </div>

                              <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                      @if ($ud->img_path == "default.jpg")
                                        <img src="{{ asset('img/usr_profile/'.$ud->img_path)}}" class="img-rounded" alt="under-maintenance" width="200" height="200"/>
                                      @else
                                        <img src="{{ asset('img/usr_profile/'.$ud->id.'.'.$ud->img_path)}}" class="img-rounded" alt="under-maintenance" width="200" height="200"/>
                                      @endif
                                    </div>

                                    <div class="col-sm-8">
                                      <p><label>Name :</label> {{$ud->name}}</p>
                                      <p><label>IC Number :</label> {{$ud->icNumber}}</p>
                                      <p><label>Email :</label> {{$ud->email}}</p>
                                      <p><label>Age :</label> {{$ud->age}}</p>
                                      <p><label>Gender :</label> {{$ud->gender}}</p>
                                      <p><label>Status :</label> {{$ud->status}}</p>
                                      <p><label>Address :</label> {{$ud->address}}</p>
                                    </div>
                                </div>
                              </div>

                              <div class="panel-footer" id="footerProfile">
                                  <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ url("/editProfile/$ud->id") }}'">Edit <span class="glyphicon glyphicon-edit"></span>
                                  </button>
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
