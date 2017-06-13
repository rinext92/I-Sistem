@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('includes.navbar_menu_inventory')                
        </div>
        <div class="col-md-8 col-md-offset-2">
          
            <div class="panel panel-info">
                <div class="panel-heading">
                    @include('includes.navbar_menuCategory')
                </div>

                <div class="panel-body">
                    <div class="content">
                       
                        <table class="table table-bordered" id="tableAccess">
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Total Number Of Item</th>
                                <th>&nbsp;</th>
                            </tr>
                            @foreach ($editCat as $no => $ec) 
                                
                                <tr>
                                    <td>{{ $editCat->firstItem() + $no }}</td>
                                    <td>{{ $ec->category_name }}</td>
                                    <td>{{ $ec->total }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#updateCategory{{ $ec->id}}">
                                            <i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;&nbsp;Edit
                                        </button>
                                    </td>
                                </tr>
                                    <!-- Modal -->
                                    <div class="modal fade" id="updateCategory{{ $ec->id}}" role="dialog">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">{{ $ec->category_name }}</h4>
                                                </div>
                                                <div class="modal-body">                                                 
                                                    {{ Form::open(array('url' => 'editCategory/'.$ec->id, 'class' => 'form-inline', 'method' => 'put', 'onsubmit' => 'return confirm("Are sure want to save this edit?")'))}}
                                                        {{ csrf_field() }}
                                                        <div class="form-inline">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                {{ Form::label('forCatName' , 'Category Name :', array('class' => 'form-horizontal'))}}
                                                                {{ Form::text('txtbxCatName', $ec->category_name, array('class' => 'form-control', 'style' => 'width:100%'))}}
                                                                </div>
                                                            </div> 

                                                        </div>
                                                        <div>&nbsp;</div>
                                                        <div class="form-inline">
                                                        {{ Form::label('forCatDateCreate' , 'Create Date :', array('class' => 'form-horizontal'))}}
                                                        {{ Form::text('txtbxCatDateCreate', $ec->created_at->format('Y-m-d'), array('class' => 'form-control', 'style' => 'width:150px', 'readonly' => 'true')) }}

                                                        {{ Form::label('forCatTimeCreate' , 'Create Time :', array('class' => 'form-horizontal'))}}
                                                        {{ Form::text('txtbxCatDateCreate', $ec->created_at->format('H:i:s'), array('class' => 'form-control', 'style' => 'width:150px', 'readonly' => 'true')) }}
                                                        </div>
                                                                                                       
                                                </div>
                                                <div class="modal-footer">
                                                    {{ Form::button('<i class="glyphicon glyphicon-pencil"></i> Save', ['class' => 'btn btn-primary btn-sm', 'type' => 'submit']) }}
                                                    {{ Form::close()}}
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                            @endforeach
                                <tr>
                                  <td colspan="4" align="right">{{ $editCat->links() }}
                                  </td>
                                </tr>
                        </table>


                    </div>
                </div>

            </div>
        </div>       
    </div>
</div>
@endsection

</script>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif