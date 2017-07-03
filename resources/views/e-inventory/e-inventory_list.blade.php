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
            <table class="table table-striped" id="tblListItem">
                <tr>
                    <th style="width: 5%">No</th>
                    <th>Item Name</th>
                    <th>Serial Number</th>
                    <th>Category</th>
                    <th style="width: 7%">Quantity</th>
                    <th>&nbsp;</th>
                </tr>
                @foreach ($item as $no => $i)
                	<tr>
                		<td>{{ $item->firstItem()+$no }}</td>
                    	<td>{{ $i->item_name }}</td>
                    	<td>{{ $i->serialNumber }}</td>
                    	<td>
                            @foreach ($categories as $cN => $ctN)
                                @if ($i->category == $ctN->categorySerialID)
                                    @if ($ctN->status == 1)
                                        {{ $ctN->category_name }}
                                    @else
                                        <font style="background-color:#f45342;font-weight: bold">Unavailable</font>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                    	<td>{{ $i->total }}</td>
                        <td>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#itemSetting{{ $i->id}}">
                                <font style="color: blue;font-weight: bold">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </font>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#itemDelete{{ $i->id}}">
                                <font style="color: red;font-weight: bold">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </font>
                            </button>
                        </td>
                    </tr>
                    <!-- modal start edit -->
                    <div class="modal fade" id="itemSetting{{ $i->id}}" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $i->item_name }}</h4>
                                </div>
                                <div class="modal-body">                                                 
                                    {{ Form::open(array('route' => ['itemUpdate.update', $i->id], 'method' => 'put', 'onsubmit' => 'return confirm("Are sure want to save this edit?")')) }}
                                    {{ method_field('PUT') }}
                                    
                                    <div class="form-group">
                                        <div class="form-inline"> 
                                            {{ Form::label('forItemName' , 'Item Name :', array('class' => 'form-horizontal'))}}
                                            {{ Form::text('txtBxItemName', $i->item_name, array('class' => 'form-control', 'style' => 'width:80%', 'required' => 'required'))}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-inline">
                                            {{ Form::label('forSerialNumber' , 'Serial Number :', array('class' => 'form-horizontal'))}}
                                            {{ Form::text('txtBxSerialNumber', $i->serialNumber, array('class' => 'form-control', 'style' => 'width:50%', 'required' => 'required'))}}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-inline">
                                            {{ Form::label('forCategory' , 'Category :', array('class' => 'form-horizontal'))}}
                                            {{ Form::hidden('invisibleCategory', $i->category) }}
                                            <select class="form-control" name="selectCat" id="selectCat">
                                                @foreach ($categories as $noCategory => $sc)
                                                    @if ($i->category == $sc->categorySerialID)
                                                        <option value="{{ $sc->categorySerialID }}" selected="selected">{{ $sc->category_name }}</option>
                                                    @else
                                                        <option value="{{ $sc->categorySerialID }}">{{ $sc->category_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-inline">
                                            {{ Form::label('forTotal', 'Total :', array('class' => 'form-horizontal')) }}
                                            {{ Form::number('txtBxTotal', $i->total, array('class' => 'form-control', 'style' => 'width:50%'))}}
                                        </div>
                                    </div>
                                                  
                                </div>
                                <div class="modal-footer">
                                        {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'btnSave', 'style' => 'display:inline-block']) }}
                                    {{ Form::close() }} 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->

                    <!-- modal delete start -->
                    <div class="modal fade" id="itemDelete{{ $i->id}}" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">{{ $i->item_name }}</h4>
                                </div>

                                <div class="modal-body" style="text-align: center;">                                                 
                                    <img src="{{ asset('img/props/alert.jpg')}}" class="img-rounded" alt="under-maintenance" width="100" height="100"/>
                                    <p style="font-size: 200%; font-weight: bold;">Are you sure want to delete this item?</p>

                                    <div class="form-group">
                                        <div class="form-inline"> 
                                        {{ Form::submit('Yes', ['class' => 'btn btn-danger', 'id' => 'btnDelete', 'style' => 'display:inline-block']) }}
                                        {{ Form::close() }}  
                                        <button class="btn btn-default" data-dismiss="modal">No</button>
                                        </div>           
                                </div>
                                <div class="modal-footer">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                @endforeach  
                <tr>
                	<td colspan="5">{{ $item->links() }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-12">
            <fieldset>
                <div class="form-group">
                    <form class="form-inline" id="searchGroup">
                        <div class="form-inline">
                            <label>Search By Category: </label>
                                <select class="form-control" name="CategorySelection" id="CategorySelection">
                                    @foreach ($categories as $noCategory => $c)
                                        <option value="{{ $c->categorySerialID }}" class="form-control">{{ $c->category_name }}</option>
                                    @endforeach
                                </select>
                                <input type="button" id="searchCategory" name="searchCategory" value="Find!" class="btn btn-primary">
                        </div>
                    </form>
                </div>
             </fieldset>

             <div id="loadingmessage2" style="display: none">
                <img src="{{ asset('img/e-inventory/loading.gif') }}"/>
            </div>

            <div>&nbsp;</div>

            <div class="col-md-12">
                <table class="table table-bordered" id="TblCategory">
                    
                </table>
            </div>

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
        });
    });

    $('#searchCategory').click(function(){
        $('#loadingmessage2').show();
        $empty ="";
        $('#TblCategory').html($empty);
        $valueCategory = $('#CategorySelection').val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('ViewCategory')}}',
            data: {'categoryIs':$valueCategory},
            success:function(data){
                setTimeout(function(){
                    $('#loadingmessage2').hide();
                    $('#TblCategory').html(data);
                },700);
                      
            }
        });
    });
</script>
@endsection

