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

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    List Of Staff 
                                </div>

                                 <div class="panel-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Start Date</th>
                                            <th></th>
                                        </tr>
                                        @foreach ($staff as $no => $p)
                                            @include('staff.view_all_staff')
                                        @endforeach
                                        <tr>
                                          <td colspan="5" align="right">{{ $staff->links() }}</td>
                                        </tr>
                                    </table>
                                 </div>
                            </div> 
                        </div>                       

                        <hr>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                User Role
                            </div>

                             <div class="panel-body">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>IC Number</th>
                                        <th>Level Access</th>
                                    </tr>
                                    @foreach ($LevelAccess as $no2 => $l)
                                            @include('staff.view_levelAccess')
                                    @endforeach
                                    <tr>
                                      <td colspan="5" align="right">{{ $LevelAccess->links() }}</td>
                                    </tr>
                                </table>
                             </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
    $('#favoritesModal').on("show.bs.modal", function (e) {
         $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
         $("#fav-title").html($(e.relatedTarget).data('title'));
    });
});
</script>

@endsection

