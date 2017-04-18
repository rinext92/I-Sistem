<tr>
    <td>{{ $LevelAccess->firstItem() + $no2 }}</td>
    <td>{{$l->name}}</td>
    <td>{{$l->icNumber}}</td>
    <td>
    	@if ($l->role == '1')
    		Admin
    	@elseif ($l->role == '2')
    		Moderator
    	@else
    		User
    	@endif
    </td>
    <td>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="" data-title="" data-target="#{{$p->icNumber}}">
          <span class="glyphicon glyphicon-search"></span>
        </button>
    </td>
</tr>