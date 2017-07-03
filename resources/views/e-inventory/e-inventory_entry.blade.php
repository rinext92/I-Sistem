@extends('layouts.inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('includes.navbar_menu_inventory')                
        </div>
        <div class="col-md-12">
           <button onclick="myFunction()" class="btn btn-default">
           		<span class="glyphicon glyphicon-plus" style="color:green"></span> 
           		Add New Row
           	</button>
           	<input type="text" value="1" id="rowValue">
           	<div>&nbsp;</div>
           {{ Form::open(array('url' => 'add-new-item','class' => 'form-horizontal')) }}
	       {{ csrf_field() }}
           <table class="table table-bordered table-hover" id="AddItemTable">
           		<tr>
           			<th style="width: 5%"></th>
           			<th>Item Name</th>
           			<th style="width: 20%">Serial Number</th>
           			<th>Category</th>
           			<th>Quantity</th>
           		</tr>
           		<tbody id="tblBody">
           			<tr id="no1">
           				<td id="rowNo1">
           					<span class="glyphicon glyphicon-trash form-control row-remover" style="color: red;" onclick="myFunctionRemove('1')"></span>
           				</td>
           				<td id="rowItemName1">
           					<input class="form-control" placeholder="Item Name Here1" name="txtbxItemName[]" type="text" required="required" autocomplete="off">
           				</td>
           				<td id="rowSerialNumber1">
           					<input class="form-control" placeholder="Serial Number Here" type="text" name="txtbxSerialNumber[]" required="required">
           				</td>
           				<td id="rowDropDown1">
           					<select id="myCategory" class="form-control" name="myCategory[]">
           						@foreach ($cat as $noCategory => $c)
                        @if ($c->status == 1)
                          <option class="form-control" value="{{ $c->categorySerialID }}">{{ $c->category_name }}</option>
                        @endif
                      @endforeach
           					</select>
           				</td>
           				<td id="rowTotal1">
           					<input class="form-control" placeholder="Quantity here" type="number" name="txbxtotal[]" required="required">
           				</td>
           			</tr>
           		</tbody>
           </table>
           {{ Form::submit('Submit', ['class' => 'btn btn-primary', 'id' => 'btnSave', 'style'=>'display:inline-block']) }}
           {{ Form::close()}}
           <a href="{{ url('/e-inventory') }}"><button type="cancel" class="btn btn-danger" style="display: inline-block;">
	            Cancel
	        </button></a>
        </div>
        
    </div>
</div>
@endsection


<script type="text/javascript">
var i = 1;
function myFunction() {
	document.getElementById('btnSave').style.display = "block";
	i++;
    var tr = document.createElement("tr");
    tr.setAttribute("id", "no"+i);
    var td1 = document.createElement("td");
    // var btnRemove = document.createElement("button");
    // btnRemove.setAttribute('class', 'btn btn-default');

    var icon = document.createElement("span");    
    icon.className ="glyphicon glyphicon-trash form-control row-remover";
    icon.style.color ="red";
    icon.setAttribute("onClick","myFunctionRemove("+i+")");

    // btnRemove.appendChild(icon);
    td1.setAttribute("id", "rowNo"+i);
    td1.appendChild(icon);

    ///////item name//////
    var td2 = document.createElement("td");
    var txtbxName = document.createElement("INPUT");
    txtbxName.setAttribute("type", "text");
    txtbxName.setAttribute("class", "form-control");
    txtbxName.setAttribute("placeholder", "Item Name Here"+i);
    txtbxName.setAttribute("name", "txtbxItemName[]");

    td2.setAttribute("id", "rowItemName"+i);
    td2.appendChild(txtbxName);

    ///////serial number//////
    var td3 = document.createElement("td");
    var txtbxSerial = document.createElement("INPUT");
    txtbxSerial.setAttribute("type", "text");
    txtbxSerial.setAttribute("class", "form-control");
    txtbxSerial.setAttribute("placeholder", "Serial Number Here");
    txtbxSerial.setAttribute("name", "txtbxSerialNumber[]");

    td3.setAttribute("id", "rowSerialNumber"+i);
    td3.appendChild(txtbxSerial);

    ///////category//////
    var td4 = document.createElement("td");
    var selectCategory =  document.createElement("SELECT");
    selectCategory.setAttribute("id", "myCategory");
    selectCategory.setAttribute("class", "form-control");
    selectCategory.setAttribute("name", "myCategory[]");

    td4.setAttribute("id", "rowDropDown"+i);
    td4.appendChild(selectCategory);

	    ////option drop down/////

      var data = {!! json_encode($cat) !!}
      for (var cat = 0; cat < data.length; cat++)
      {
          var selectionDrop = document.createElement("OPTION");
          selectionDrop.setAttribute("class", "form-control");
          selectionDrop.setAttribute("value", data[cat].categorySerialID);
          var selectItem = document.createTextNode(data[cat].category_name);
          selectionDrop.appendChild(selectItem);
          selectionDrop.appendChild(selectItem);
          selectCategory.appendChild(selectionDrop);
      }

    ///////total//////
    var td5 = document.createElement("td");
    var txtbxTotal = document.createElement("INPUT");
    txtbxTotal.setAttribute("type", "number");
    txtbxTotal.setAttribute("class", "form-control");
    txtbxTotal.setAttribute("placeholder", "Quantity here");
    txtbxTotal.setAttribute("name", "txbxtotal[]");

    td5.setAttribute("id", "rowTotal"+i);
    td5.appendChild(txtbxTotal);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    document.getElementById('tblBody').appendChild(tr);
    document.getElementById("rowValue").value=i;
    
    
}

function myFunctionRemove(abc)
{	
	i--;
	document.getElementById("rowValue").value = i;
	document.getElementById("no"+abc).remove();
	
	if(document.getElementById('rowValue').value == 0)
	{
		document.getElementById("btnSave").style.display = "none";
	}
	else
	{
		document.getElementById('btnSave').style.display = "block";
	}
}

</script>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif