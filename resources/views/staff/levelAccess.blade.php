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
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                               <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        Change user role?
                                    </div>

                                    <div class="panel-body">
                                        @foreach ($user as $no => $u)

                                    {{ Form::open(array('url' => 'roleChange/'.$u->id,'class' => 'form-horizontal')) }}
                                    {{ csrf_field() }}
                                            <label for="mydropdown" datalabel="mydropdown">
                                                Change {{ $u->name }} role's from 
                                                    @if ($u->role == '1')
                                                        <font class="roleText">Admin</font>
                                                    @elseif ($u->role == '2')
                                                        <font class="roleText">Moderator</font>
                                                    @else
                                                        <font class="roleText">User</font>
                                                    @endif
                                                to :
                                            </label>
                                            <select name="selectRole" id="selectRole">
                                                @if (Auth::user()->role == '1')
                                                    @if ($u->role == '1')
                                                        <option value="1" selected="selected">Admin</option>
                                                        <option value="2">Moderator</option>
                                                        <option value="3">User</option>
                                                    @elseif ($u->role == '2')
                                                        <option value="1">Admin</option>
                                                        <option value="2" selected="selected">Moderator</option>
                                                        <option value="3">User</option>
                                                    @else
                                                        <option value="1">Admin</option>
                                                        <option value="2">Moderator</option>
                                                        <option value="3" selected="selected">User</option>
                                                    @endif 
                                                @else (Auth::user()->role =='2')
                                                    @if ($u->role == '2')
                                                        <option value="2" selected="selected">Moderator</option>
                                                        <option value="3">User</option>
                                                    @else
                                                        <option value="2">Moderator</option>
                                                        <option value="3" selected="selected">User</option>
                                                    @endif
                                                @endif
                                            </select>
                                    {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
                                    <a href="/viewStaff" class="btn btn-warning">Cancel</a>
                                            <hr>
                                            <table class="table table-bordered" id="tableAccess">
                                                <tr>
                                                    <th></th>
                                                    <th>Admin</th>
                                                    <th>Moderator</th>
                                                    <th>User</th>
                                                </tr>
                                                <tr>
                                                    <td>View, Edit, Update</td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Manage Page roles and settings</td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Remove and ban people from the Page</td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>Remove User</td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                                </tr>
                                            </table>
                                        @endforeach
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection