@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('includes.navbar_menu_inventory')                
        </div>
        <div class="col-md-12">
        	<fieldset>
                <legend>Search:</legend>
                    <form class="form-inline" id="searchGroup">
                        <div class="form-group">
                            <label for="email">Item Name/ Serial Number : </label>
                            <input type="text" class="form-control" id="searchbx" name="searchbx">&nbsp;
                        </div>
                    </form>
			 </fieldset>
        </div>
        <div id="loadingmessage" style="display: none">
            <img src="{{ asset('img/e-inventory/loading.gif') }}"/>
        </div>
        <div>
            &nbsp;
        </div>
        <div class="col-md-12">
        	<table class="table table-bordered" id="searchTbl">
                
            </table>
        </div>
        <div>
            &nbsp;
        </div>
        <div class="col-md-12">
        	<legend>List of all items:</legend>
            <table class="table table-striped">
                <tr>
                    <th style="width: 5%">No</th>
                    <th>Item Name</th>
                    <th>Serial Number</th>
                    <th>Category</th>
                    <th style="width: 7%">Quantity</th>
                </tr>
                @foreach ($item as $no => $i)
                	<tr>
                		<td>{{ $item->firstItem()+$no }}</td>
                    	<td>{{ $i->item_name }}</td>
                    	<td>{{ $i->serialNumber }}</td>
                    	<td>{{ $i->category }}</td>
                    	<td>{{ $i->total }}</td>
                    </tr>
                @endforeach  
                <tr>
                	<td colspan="5">{{ $item->links() }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-12">
            <fieldset>
                <form class="form-inline" id="searchGroup">
                    <div class="form-group">
                        <label>Search By Category: </label>
                            <select class="form-control">
                                @foreach ($categories as $noCategory => $c)
                                    <option value="{{ $c->category_name }}">{{ $c->category_name }}</option>
                                @endforeach
                            </select>
                            <input type="submit" name="searchCategory" value="Find!" class="btn btn-primary">
                    </div>
                </form>
             </fieldset>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('form input').on('keypress', function(e) {
    return e.which !== 13;
    });

    $('#searchbx').on('keyup', function(){
        $('#loadingmessage').show();
        $value = $(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('findItem')}}',
            data: {'searchText':$value},
            success:function(data){
                if(!$.trim($value))
                {
                    $empty = "";
                    $('#searchTbl').html($empty);
                    $('#loadingmessage').hide(); 
                }
                else
                {
                    $('#searchTbl').html(data);
                    $('#loadingmessage').hide();
                }
            }
        })
    });
</script>
@endsection

