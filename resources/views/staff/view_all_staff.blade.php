<tr>
    <td>{{ $staff->firstItem() + $no }}</td>
    <td>{{$p->name}}</td>
    <td>{{$p->email}}</td>
    <td>{{$p->created_at->format('d-M-Y')}}</td>
    <td>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="" data-title="" data-target="#up{{$p->icNumber}}">
          <span class="glyphicon glyphicon-search"></span>
        </button>
    </td>
</tr>

<div class="modal fade" id="up{{$p->icNumber}}" tabindex="-1" role="dialog" aria-labelledby="userProfile">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="userProfile">
            User Profile
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col col-md-4">
              @if ($p->img_path == "default.jpg")
                <img src="{{ asset('img/usr_profile/'.$p->img_path)}}" class="img-rounded" style="width:150px;height: 150px" />
              @else
                <img src="{{ asset('img/usr_profile/'.$p->id.'.'.$p->img_path)}}" class="img-rounded" style="width:150px;height: 150px" />
              @endif
            </div>
            <div class="col-6 col-md-8">
                <p id="popupBold">Name : {{$p->name}}</p>
                <p id="popupBold">Email : {{$p->email}}</p>
                <p id="popupBold">IC Number : {{$p->icNumber}}</p>
                <p id="popupBold">Age : {{$p->age}}</p>
                <p id="popupBold">Status : {{$p->status}}</p>
                <p id="popupBold">Gender : {{$p->gender}}</p>
                <p id="popupBold">Date Register : {{$p->created_at->format('d-M-Y')}}</p>
                <p id="popupBold">Address : {{$p->address}}</p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        <span class="pull-right">
          
        </span>
      </div>
    </div>
  </div>
</div>