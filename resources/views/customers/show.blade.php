@extends('adminlte::page')

@section('title', 'Customers')

@section('content_header')
    <h1>Examine Customer</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Customer Details</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list">
                                    <li><b>User ID: </b>{{ $customer->id }}</li>
                                    <li><b>First Name: </b> {{ $customer->first_name }}</li>
                                    <li><b>Last Name: </b> {{ $customer->last_name }}</li>
                                    <li><b>Email: </b> {{ $customer->email }}</li>
                                    <li><b>Phone Number: </b> {{ $customer->phone_no }}</li>
                                </ul>
                            </div>
                        </div>
                        @if($customer->deleted_at == null)
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary pull-right">Edit
                                Customer</a>
                            {{ Form::open(['route' => ['customers.destroy', $customer->id],'class' => 'pull-left']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete this Customer!',['class' => 'btn btn-danger'])}}
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['action' => ['CustomersController@restore', $customer->id],'class' => 'pull-right']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Restore This Customer',['class' => 'btn btn-primary'])}}
                            {{ Form::close() }}
                        @endif
                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

            </div>
        </div>
    </div>

@stop