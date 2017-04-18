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
                                            <tr>
                                                <td>{{ $staff->firstItem() + $no }}</td>
                                                <td>{{$p->name}}</td>
                                                <td>{{$p->email}}</td>
                                                <td>{{$p->created_at->format('d-M-Y')}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="" data-title="" data-target="#{{$p->icNumber}}">
                                                      <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="{{$p->icNumber}}" tabindex="-1" role="dialog" aria-labelledby="favoritesModalLabel">
                                              <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" 
                                                      aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="favoritesModalLabel">
                                                        {{$p->name}}
                                                    </h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="img/usr_profile/{{$p->img_path}}" class="img-rounded" style="width:200px" />
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" 
                                                       class="btn btn-default" 
                                                       data-dismiss="modal">Close</button>
                                                    <span class="pull-right">
                                                      <button type="button" class="btn btn-primary">
                                                        Add to Favorites
                                                      </button>
                                                    </span>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>

                                        @endforeach
                                    </table>
                                 </div>
                            </div> 

                        </div>    
                        {{ $staff->links() }}
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

