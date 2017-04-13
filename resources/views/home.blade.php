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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
