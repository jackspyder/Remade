@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Add a User</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create User</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <h1>Create new user</h1>


                        {{ Form::open(['url' => '/users', 'method' => 'POST']) }}

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

                        {{ Form::submit('Add User', array('class' => 'btn btn-primary pull-right')) }}

                        {{ Form::close() }}


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}
            </div>
        </div>
    </div>

@stop