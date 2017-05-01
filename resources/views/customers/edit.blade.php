@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>Customer Management</h1>
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
                        <h3 class="box-title">Edit Customer:</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <h1>Edit {{ $customer->first_name }} {{ $customer->last_name }}</h1>

                        {{ Form::model($customer, array('route' => array('customers.update', $customer->id), 'method' => 'PATCH')) }}

                        <div class="form-group">
                            {{ Form::label('first_name', 'First Name') }}
                            {{ Form::text('first_name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('last_name', 'Last Name') }}
                            {{ Form::text('last_name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('phone_no', 'Phone Number') }}
                            {{ Form::text('phone_no', null, array('class' => 'form-control')) }}
                        </div>

                        {{ Form::submit('Edit Customer', array('class' => 'btn btn-success pull-right')) }}

                        {{ Form::close() }}

                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

            </div>
        </div>
    </div>

@stop