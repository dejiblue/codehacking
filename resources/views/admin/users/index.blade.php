@extends('layouts.admin')




@section('content')

    <h1>Users</h1>

    @if(Session::has('user_deleted')) <p class="alert alert-success">{{session('user_deleted')}}</p> @endif

    @if(Session::has('user_updated')) <p class="alert alert-success">{{session('user_updated')}}</p> @endif

    @if(Session::has('user_created')) <p class="alert alert-success">{{session('user_created')}}</p> @endif

    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created Date</th>
            <th>Updated Date</th>
          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)

                  <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/NO-IMAGE-AVAILABLE.jpg'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                  </tr>

            @endforeach

        @endif

        </tbody>
     </table>

@stop