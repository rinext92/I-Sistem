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
                        <div class="title m-b-md">
                            <center><img src="{{ asset('img/under-maintenance.png')}}" alt="under-maintenance" /></center>
                            <div class="row">
                                <div class="col-md-6">
                                    <center>
                                        <!-- <a href='{{ url("e-asset") }}'> -->
                                            <img src="{{ asset('img/e-asset/e-asset_logo.png')}}" alt="e-asset" style="width: 300px; height: 100px" />
                                       <!--  </a> -->
                                    </center>
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <a href='{{ url("e-inventory") }}' target="_blank">
                                            <img src="{{ asset('img/e-inventory/e-inventory_logo2.png')}}" alt="e-inventory" style="width: 300px;height: 100px"/>
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
