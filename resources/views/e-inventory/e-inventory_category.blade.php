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
                            {{ Form::open(array('url' => 'add-new-category','class' => 'form-inline')) }}
                            {{ csrf_field() }}
                               {{ Form::label('inputName', 'Category Name : ', array('class' => 'form-inline')) }}
                               {{ Form::text('txtbxCategory', '' , ['class' => 'form-control', 'id' => 'txtbxCategory']) }}
                              <img src="{{ asset('img/e-inventory/loading.gif') }}" style="width: 150px;display: none" id="loadingmessage"/>
                              <span id="checkCategory"></span>
                            {{ Form::close() }}
                    </div>
                </div>

            </div>
        </div>       
    </div>
</div>
<script type="text/javascript">
    
$('#txtbxCategory').on('keyup', function(){
         $value = $(this).val();
         $('#loadingmessage').show();
        $value = $(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('findCategory')}}',
            data: {'searchCategory':$value},
            success:function(data){
                if(!$.trim($value))
                {
                    $empty = "";
                    $('#checkCategory').html($empty);
                    $('#loadingmessage').hide(); 
                }
                else
                {
                    $('#checkCategory').html(data);
                    $('#loadingmessage').hide();
                }
            }
        })
    });
</script>
@endsection

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif