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

        <div class="col-md-12" id="scrollTblLog">
            <table class="table table-bordered" id="inventoryLog">
                <thead>
                <tr>
                    <th style="width: 50px">No</th>
                    <th style="width: 250px">Item Name</th>
                    <th style="width: 250px">Serial Number</th>
                    <th style="width: 180px">Category</th>
                    <th style="width: 180px">Date</th>
                    <th style="width: 210px">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 50px">1</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 180px">Escort</td>
                    <td class="filterable-cell" style="width: 180px">Blue</td>
                    <td class="filterable-cell" style="width: 210px">2000</td>
                </tr>
                <tr>
                    <td style="width: 50px">2</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 180px">Escort</td>
                    <td class="filterable-cell" style="width: 180px">Blue</td>
                    <td class="filterable-cell" style="width: 210px">2000</td>
                </tr>
                <tr>
                    <td style="width: 50px">3</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 180px">Escort</td>
                    <td class="filterable-cell" style="width: 180px">Blue</td>
                    <td class="filterable-cell" style="width: 210px">2000</td>
                </tr>
                <tr>
                    <td style="width: 50px">4</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 180px">Escort</td>
                    <td class="filterable-cell" style="width: 180px">Blue</td>
                    <td class="filterable-cell" style="width: 210px">2000</td>
                </tr>
                <tr>
                    <td style="width: 50px">5</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 250px">Ford</td>
                    <td class="filterable-cell" style="width: 180px">Escort</td>
                    <td class="filterable-cell" style="width: 180px">Blue</td>
                    <td class="filterable-cell" style="width: 210px">2000</td>
                </tr>
                </tbody>
        </div>

        <!--// table log-->
        <div class="col-md-12">
            <table class="table table-stripped">

            </table>
        </div>
    </div>
</div>
@endsection
