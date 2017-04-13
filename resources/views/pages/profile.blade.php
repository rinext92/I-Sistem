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
                        
                          <div class="col-sm-8">
                              <img src="{{ asset('img/usr_profile/default.jpg')}}" class="img-rounded" alt="under-maintenance" width="200" height="236"/>
                          </div>

                          <div class="col-sm-4">
                              col-sm-4
                          </div>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
