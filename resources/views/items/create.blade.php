@extends('adminlte::page')

@section('title', 'Items')

@section('content_header')
    <h1>Create an Item</h1>
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
                        <h3 class="box-title">Item Details</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">

                        {{ Form::open(['url' => '/items', 'method' => 'POST', 'files' => true]) }}

                        <div class="container-fluid">
                            <div class="row">


                                {{--Row left--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('barcode', 'Barcode') }}
                                        {{ Form::number('barcode', $code+1, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('category', 'Category') }}
                                        {{ Form::select('category', [
                                        'Furniture' => 'Furniture',
                                        '1100.Laptops' => '1100.Laptops',
                                        '1200.Desktop PCs' => '1200.Desktop PCs',
                                        '1300.Printers'=>'1300.Printers',
                                        '1400.All in ones'=>'1400.All in ones',
                                        '1500.Monitors' => '1500.Monitors',
                                        '1510.Projectors' => '1510.Projectors',
                                        '1520.Smartboards'=>'1520.Smartboards',
                                        '1600.Replacement parts' => '1600.Replacement parts',
                                        '1710.Keyboards'=>'1710.Keyboards',
                                        '1720.Mice' => '1720.Mice',
                                        '1730.Speakers' => '1730.Speakers',
                                        '1740.Scanners' => '1740.Scanners',
                                        '1750.Peripherals'=>'1750.Peripherals',
                                        '1760.Smartphones'=>'1760.Smartphones',
                                        '1770.Tablets'=>'1770.Tablets',
                                        '1780.Networks' => '1780.Networks',
                                        '1790.Games Consoles' => '1790.Games Consoles',
                                        '1800.IT Misc' => '1800.IT Misc',
                                        '1900.Servers'=>'1900.Servers',
                                        '4000.Electricals'=>'4000.Electricals',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('condition', 'Condition') }}
                                        {{ Form::select('condition', [
                                        'Very Good' => 'Very Good',
                                        'Good' => 'Good',
                                        'Fair' => 'Fair',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('weight', 'Weight') }}
                                        {{ Form::text('weight', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                {{--Row Right--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('price', 'Price') }}
                                        {{ Form::text('price', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('status', 'Status') }}
                                        {{ Form::select('status', [
                                        'For Refurbishment'=>'For Refurbishment',
                                        'Storage' => 'Storage',
                                        'For Sale' => 'For Sale',
                                        'For Parts' => 'For Parts',
                                        'Sold'=>'Sold',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('furniture', 'Furniture Type') }}
                                        {{ Form::select('furniture', [
                                        'null' => 'N/A',
                                        'chairs' => 'Chairs',
                                        'setOfChairs' => 'Set of Chairs',
                                        'tables'=>'tables',
                                        'drawersCabinets'=>'Drawers/Cabinets',
                                        'shelves'=>'shelves',
                                        'accessories'=>'accessories',
                                        'mirrors'=>'mirrors',
                                        'frames'=>'frames',
                                        'upcycled'=>'upcycled',
                                        'crafts'=>'crafts',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('coa', 'C.O.A') }}
                                        {{ Form::text('coa', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                {{--outside the columns--}}
                                <div class="form-group col-sm-12">
                                    {{ Form::label('notes', 'Notes') }}
                                    {{ Form::textarea('notes', null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group col-sm-12">
                                    {{ Form::label('images', 'Upload Images') }}
                                    {{ Form::file('images[]', ['multiple' => 'multiple']) }}
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item Specifications</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        {{--Main Panel Content--}}
                        <div class="container-fluid">
                            <div class="row">

                                {{--Row Left--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('brand', 'Brand') }}
                                        {{ Form::text('brand', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('model', 'Model') }}
                                        {{ Form::text('model', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('cpu', 'CPU') }}
                                        {{ Form::text('cpu', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('ram', 'Memory (RAM)') }}
                                        {{ Form::text('ram', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('hdd', 'Hard Drive (HDD)') }}
                                        {{ Form::text('hdd', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('odd', 'Optical Drive') }}
                                        {{ Form::select('odd', [
                                        'no' => 'No',
                                         'yes'=>'Yes',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('gpu', 'Graphics Card (GPU)') }}
                                        {{ Form::text('gpu', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('battery', 'Battery') }}
                                        {{ Form::select('battery', [
                                        'no' => 'No',
                                         'yes'=>'Yes',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>
                                </div>

                                {{--Row Right--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('usb', 'USB Ports') }}
                                        {{ Form::text('usb', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('lan', 'Network Port (LAN)') }}
                                        {{ Form::select('lan', [
                                         'no' => 'No',
                                         'yes'=>'Yes',
                                         ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('wlan', 'Wireless Card (WLAN)') }}
                                        {{ Form::select('wlan', [
                                        'no' => 'No',
                                         'yes'=>'Yes',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('os', 'Operating System') }}
                                        {{ Form::text('os', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('psu', 'Power Supply') }}
                                        {{ Form::select('psu', [
                                        'no' => 'No',
                                         'yes'=>'Yes',
                                        ], null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('screen_size', 'Screen Size') }}
                                        {{ Form::text('screen_size', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('screen_rez', 'Screen Resolution') }}
                                        {{ Form::text('screen_rez', null, array('class' => 'form-control')) }}
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}

                {{--Start of a box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Item Dimensions</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        {{--Main Panel Content--}}
                        <div class="container-fluid">
                            <div class="row">

                                {{--Row Left--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('height', 'Height') }}
                                        {{ Form::text('height', null, array('class' => 'form-control')) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('width', 'Width') }}
                                        {{ Form::text('width', null, array('class' => 'form-control')) }}
                                    </div>

                                </div>

                                {{--Row Right--}}
                                <div class="form-group col-sm-12 col-md-6">

                                    <div class="form-group">
                                        {{ Form::label('depth', 'Depth') }}
                                        {{ Form::text('depth', null, array('class' => 'form-control')) }}
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{ Form::submit('Submit Item', array('class' => 'btn btn-success pull-right')) }}

                        {{ Form::close() }}


                    </div>
                    {{--end of box-body--}}
                </div>
                {{--end of box--}}
            </div>
        </div>
    </div>

@stop