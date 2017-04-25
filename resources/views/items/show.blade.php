@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
    <h1>Examine Item</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item Details</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        <div class="row">

                            <div class="form-group col-sm-12 col-md-6">
                                <ul class="list">
                                    <li><b>Barcode: </b>{{$item->barcode}}</li>
                                    <li><b>Category: </b>{{$item->category}}</li>
                                    <li><b>Brand: </b>{{$item->specs->brand}}</li>
                                    <li><b>Model: </b>{{$item->specs->model}}</li>
                                    <li><b>Weight: </b>{{$item->weight}}</li>
                                    <li><b>Condition: </b>{{$item->condition}}</li>
                                    <li><b>Price: </b>£{{$item->price}}</li>
                                    <li><b>Status: </b>{{$item->status}}</li>
                                    <li><b>C.O.A: </b>{{$item->coa}}</li>
                                    <li><b>Notes: </b>{{$item->notes}}</li>
                                </ul>


                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <ul class="list">
                                    <li><b>Height:</b> {{ $item->dimensions->height }}</li>
                                    <li><b>Width:</b> {{ $item->dimensions->width }}</li>
                                    <li><b>Depth:</b> {{ $item->dimensions->depth }}</li>
                                </ul>
                            </div>
                        </div>

                        <div id="{{$item->id}}">
                            <table class="table table-bordered fit">
                                <tbody>
                                <tr>
                                    <td><b>CPU</td>
                                    <td>{{$item->specs->cpu}}</td>
                                    <td><b>LAN</td>
                                    <td>{{$item->specs->lan}}</td>
                                </tr>
                                <tr>
                                    <td><b>RAM</td>
                                    <td>{{$item->specs->ram}}</td>
                                    <td><b>WLAN</td>
                                    <td>{{$item->specs->wlan}}</td>
                                </tr>
                                <tr>
                                    <td><b>HDD</td>
                                    <td>{{$item->specs->hdd}}</td>
                                    <td><b>OS</td>
                                    <td>{{$item->specs->os}}</td>
                                </tr>
                                <tr>
                                    <td><b>ODD</td>
                                    <td>{{$item->specs->odd}}</td>
                                    <td><b>PSU</td>
                                    <td>{{$item->specs->psu}}</td>
                                </tr>
                                <tr>
                                    <td><b>GPU</td>
                                    <td>{{$item->specs->gpu}}</td>
                                    <td><b>Screen Size</td>
                                    <td>{{$item->specs->screen_size}}</td>
                                </tr>
                                <tr>
                                    <td><b>Battery</td>
                                    <td>{{$item->specs->battery}}</td>
                                    <td><b>Screen Resolution</td>
                                    <td>{{$item->specs->screen_rez}}</td>
                                </tr>
                                <tr>
                                    <td><b>USB</td>
                                    <td>{{$item->specs->usb}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        @if($item->deleted_at == null)
                            <a href="{{ route('items.edit', $item) }}" class="btn btn-primary pull-right">Edit
                                Item</a>

                            {{ Form::open(['route' => ['items.destroy', $item->id],'class' => 'pull-left']) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete this Item!',['class' => 'btn btn-danger'])}}
                            {{ Form::close() }}
                        @else
                            {{ Form::open(['action' => ['ItemsController@restore', $item->id],'class' => 'pull-right']) }}
                            {{ Form::hidden('_method', 'PUT') }}
                            {{ Form::submit('Restore This Item',['class' => 'btn btn-primary'])}}
                            {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
            {{--end of box-body--}}
        </div>
        {{--end of box--}}
    </div>
    </div>

@stop