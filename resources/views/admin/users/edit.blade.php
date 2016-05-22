@extends('layouts.admin')



@section('content')

    <h1>Edit Users</h1>

    @include('includes.form_error')

   <div id="editForm" class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 =>'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Select File:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-2']) !!}
            </div>

            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">
                 {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-2']) !!}
            </div>

            {!! Form::close() !!}

   </div>

    <div class="col-sm-3">

        <img height="50" src="{{$user->photo ? $user->photo->file : '/images/NO-IMAGE-AVAILABLE.jpg'}}" alt="" class="img-responsive img-rounded">

    </div>


@stop