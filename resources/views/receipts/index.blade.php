@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Sales Records</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Receipts List</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <div>
                            <table id="receiptsList" class="table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Items</th>
                                    <th>Served by</th>
                                    <th>Payment type</th>
                                    <th>Warranty</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receipts as $receipt)
                                    @if($receipt->deleted_at == null)
                                        <tr class="clickable" onclick="location.href='/receipts/{{ $receipt->id }}'">
                                            <td>{{$receipt->id}}</td>
                                            <td>
                                                @foreach($receipt->items as $item)
                                                    <div>{{$item->barcode}}
                                                        - {{$item->specs->brand}} {{$item->specs->model}}</div>
                                                @endforeach
                                            </td>
                                            <td>{{$receipt->served_by}}</td>
                                            <td>{{$receipt->payment}}</td>
                                            <td>{{$receipt->warranty}}</td>
                                            <td>{{$receipt->created_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ url('/receipts/create') }}" class="btn btn-primary pull-right">Add Receipt</a>


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

                {{--Start of box--}}
                <div class="box box-solid box-default collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">Deleted Receipts</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" hidden>

                        <div>
                            <table id="deletedReceiptsList" class="table table-striped table-bordered table-hover"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Items</th>
                                    <th>Served by</th>
                                    <th>Payment type</th>
                                    <th>Warranty</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receipts as $receipt)
                                    @if($receipt->deleted_at != null)
                                        <tr class="clickable" onclick="location.href='/receipts/{{ $receipt->id }}'">
                                            <td>{{$receipt->id}}</td>
                                            <td>
                                                @foreach($receipt->items as $item)
                                                    <div>{{$item->barcode}}
                                                        - {{$item->specs->brand}} {{$item->specs->model}}</div>
                                                @endforeach
                                            </td>
                                            <td>{{$receipt->served_by}}</td>
                                            <td>{{$receipt->payment}}</td>
                                            <td>{{$receipt->warranty}}</td>
                                            <td>{{$receipt->created_at}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{--/box-body--}}
                </div>
                {{--/box--}}
            </div>
        </div>
    </div>

@stop