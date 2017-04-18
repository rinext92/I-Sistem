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
            User Profile
        </h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col col-md-4">
                <img src="{{ asset('img/usr_profile/'.$p->img_path)}}" class="img-rounded" style="width:150px;height: 150px" />
            </div>
            <div class="col-6 col-md-8">
                <p>Name : {{$p->name}}</p>
                <p>Email : {{$p->email}}</p>
                <p>IC Number : {{$p->icNumber}}</p>
                <p>Age : {{$p->age}}</p>
                <p>Status : {{$p->status}}</p>
                <p>Gender : {{$p->gender}}</p>
                <p>Date Register : {{$p->created_at->format('d-M-Y')}}</p>
                <p>Address : {{$p->address}}</p>
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