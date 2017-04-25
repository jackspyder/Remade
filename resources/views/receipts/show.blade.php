@extends('adminlte::page')

@section('title', 'Sales')

@section('content_header')
    <h1>View Sale </h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Receipt Details</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <div class="row">

                            <div class="col-md-6">
                                <ul class="list">
                                    <li><b>Receipt ID: </b>{{$receipt->id}}</li>
                                    <li><b>Item List: </b>
                                        <div>
                                            <table class="table table-striped table-bordered table-hover"
                                                   cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($receipt->items as $item)
                                                    <tr class="clickable"
                                                        onclick="location.href='/items/{{ $item->id }}'">
                                                        <td>{{$item->barcode}}</td>
                                                        <td>{{$item->specs->brand}}</td>
                                                        <td>{{$item->specs->model}}</td>
                                                        <td>£{{ $item->price }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                    <li><b>Served by: </b>{{$receipt->served_by}}</li>
                                    <li><b>Payment Type: </b>{{$receipt->payment}}</li>
                                    <li><b>Warranty: </b>{{$receipt->warranty}}</li>
                                    <li><b>Discount: </b>£{{$receipt->discount}}</li>
                                    <li><b>Created at: </b>{{$receipt->created_at->toDayDateTimeString()}}</li>
                                </ul>

                            </div>

                        </div>
                        @if($receipt->deleted_at == null)
                            {{ Form::open(['route' => ['receipts.destroy', $receipt->id],'class' => 'pull-left']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete this Receipt!',['class' => 'btn btn-danger'])}}
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['action' => ['ReceiptsController@restore', $receipt->id],'class' => 'pull-right']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Restore This Receipt',['class' => 'btn btn-primary'])}}
                            {{ Form::close() }}
                        @endif
                    </div>


                </div>
                {{--end of box-body--}}
            </div>
            {{--end of box--}}
        </div>
    </div>

@stop