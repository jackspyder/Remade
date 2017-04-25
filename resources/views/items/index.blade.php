@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
    <h1>Inventory Database</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item List</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Condition</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($items as $item)
                                    @if($item->deleted_at == null)

                                        <tr class="clickable" onclick="location.href='/items/{{ $item->id }}'">
                                            <td>{{$item->barcode}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->weight}}</td>
                                            <td>{{$item->condition}}</td>
                                            <td>£{{$item->price}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->notes}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            <a href="{{ url('/items/create') }}" class="btn btn-primary pull-right">Add Item</a>
                        </div>


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

                {{--Start of a box--}}
                <div class="box box-solid box-default collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">Deleted Items</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Barcode</th>
                                    <th>Category</th>
                                    <th>Weight</th>
                                    <th>Condition</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    @if($item->deleted_at != null)
                                        <tr class="clickable" onclick="location.href='/items/{{ $item->id }}'">
                                            <td>{{$item->barcode}}</td>
                                            <td>{{$item->category}}</td>
                                            <td>{{$item->weight}}</td>
                                            <td>{{$item->condition}}</td>
                                            <td>£{{$item->price}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->notes}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}
            </div>
        </div>
    </div>

@stop