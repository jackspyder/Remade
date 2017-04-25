@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!-- if there are creation errors, they will show here -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Edit Member:</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <h1>Edit {{ $user->name }}</h1>

                        {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PATCH')) }}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('username', 'Username') }}
                            {{ Form::text('username', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirm Password') }}
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                        </div>

                        {{ Form::submit('Edit Member', array('class' => 'btn btn-success pull-right')) }}

                        {{ Form::close() }}

                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

            </div>
        </div>
    </div>

@stop