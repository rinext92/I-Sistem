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
                          <div class="col col-md-8">.col .col-md-8</div>
                          <div class="col-6 col-md-4">.col-6 .col-md-4</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
