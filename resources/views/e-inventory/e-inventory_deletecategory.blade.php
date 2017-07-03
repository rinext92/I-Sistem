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
                        <p id="deleteCategoryReminder">Item in deleted category will be assign into uncategorized category until the uncategorized category removed!</p>
                        <table class="table table-bordered" id="tableAccess">
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Total Number Of Item</th>
                                <th><i class="glyphicon glyphicon-trash"></i></th>
                            </tr>
                            @foreach ($categories as $no => $c) 
                                {{ Form::open(array('url' => 'UnCategorizedCategory/'.$c->id, 'method' => 'put', 'onsubmit' => 'return confirm("Are you sure want to delete this category? Once you delete this, all the item under this category will uncategorized and unavailable.")'))}}
                                <tr>
                                    <td>{{ $categories->firstItem() + $no }}</td>
                                    <td>{{ $c->category_name }}</td>
                                    <td>{{ $c->total }}</td>
                                    <td>
                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i>', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}
                                    </td>
                                </tr>
                              {{ Form::close()}}
                            @endforeach
                                <tr>
                                  <td colspan="4" align="right">{{ $categories->links() }}
                                  </td>
                                </tr>
                        </table>

                        <div>&nbsp;</div>
                        
                        <!-- Inactive status table-->
                        <label>Uncategorized Categories</label>
                        <table class="table table-bordered" id="tableInactiveStatus">
                            <tr>
                                <th>No</th>
                                <th>Before</th>
                                <th>After</th>
                                <th>Total Number Of Item</th>
                                <th><i class="glyphicon glyphicon-trash"></i></th>
                                <th><i class="glyphicon glyphicon-pencil"></i></th>
                            </tr>
                            @foreach ($inactiveStats as $no2 => $in)
                                <tr>
                                    <td>{{ $inactiveStats->firstItem() + $no2 }}</td>
                                    <td>{{ $in->category_name }}</td>
                                    <td>Unknown {{ $inactiveStats->firstItem() + $no2 }}</td>
                                    <td>{{ $in->total }}</td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'route' => ['delCategory.destroy', $in->id], 'onsubmit' => 'return confirm("Are you sure want to delete this category? Once you delete this, it will be permenantly remove from this system and all the item under this category will also be deleted.")']) }}
                                            {{ method_field('DELETE') }}
                                       

                                            {{ Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) }}

                                        {{ Form::close()}}
                                    </td>
                                    <td>
                                        {{ Form::open(array('url' => 'ChangeCategoryStats/'.$in->id, 'method' => 'put', 'onsubmit' => 'return confirm("Are you sure want to change this category to active and available back?")'))}}

                                            {{ Form::button('<i class="glyphicon glyphicon-pencil"></i> Active', ['class' => 'btn btn-success btn-sm', 'type' => 'submit']) }}

                                        {{ Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
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