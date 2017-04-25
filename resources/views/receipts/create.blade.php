@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Add Sales</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Create a Receipt</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <form role="form" method="POST" action="{{ url('/receipts') }}">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">

                                        <label for="id" class="control-label">Receipt ID</label>
                                        <input name="id" class="form-control"> </input>

                                        <label for="list[]" class="control-label">Items</label>
                                        <select name="list[]" class="form-control select2" multiple required>
                                            @foreach($items as $item)
                                                <option value="{{$item->id}}">{{$item->barcode}}
                                                    - {{$item->specs->brand}} {{$item->specs->model}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group col-sm-12 col-md-6">

                                        <label for="discount" class="control-label">Discount</label>
                                        <input name="discount" class="form-control" value="0.00">

                                        <label for="warranty" class="control-label">Warranty</label>
                                        <select name="warranty" class="form-control">
                                            <option value="None">None</option>
                                            <option value="1 Month">1 Month</option>
                                            <option value="3 Months">3 Months</option>
                                            <option value="1 Year">1 Year</option>
                                        </select>

                                        <label for="payment" class="control-label">Payment type</label>
                                        <select name="payment" class="form-control">
                                            <option>Cash</option>
                                            <option>Debit card</option>
                                            <option>Credit card</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-success form-btn pull-right" type="submit">Add Receipt
                                    </button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>

                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

            </div>
        </div>
    </div>

@stop