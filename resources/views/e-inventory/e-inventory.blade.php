@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('includes.navbar_menu_inventory')                
        </div>
        <div class="col-md-12">
            <center><img src="{{ asset('img/under-maintenance.png')}}" alt="under-maintenance" /></center>
        </div>
    </div>
</div>
@endsection
