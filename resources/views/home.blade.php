<input type="hidden" id="forsale" value="{{$counts['forsale']}}"/>
<input type="hidden" id="forparts" value="{{$counts['forparts']}}"/>
<input type="hidden" id="storage" value="{{$counts['storage']}}"/>
<input type="hidden" id="sold" value="{{$counts['sold']}}"/>
<input type="hidden" id="refurbishment" value="{{$counts['refurbishment']}}"/>

@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Welcome</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        <canvas id="mycanvas"></canvas>

                        this is all the text in the body of the box for you to
                        read and see how it goes all here in this nice box space, hopefully it matches
                        well with existing shit from the last project.


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}
            </div>
        </div>
    </div>

@stop