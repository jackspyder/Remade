@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>User List</h1>
@stop

@section('content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                {{--Start of box--}}
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">User List</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">


                        @foreach($users as $user)
                            @if($user->deleted_at == null)
                                <div>
                                    <ul class="list-group">
                                        <a href="/users/{{ $user->id }}" class="list-group-item">
                                            <h4 class="list-group-item-heading">
                                                {{ $user->name }}</h4>
                                        </a>
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                        <a href="{{ url('/users/create') }}" class="btn btn-primary pull-right">Add User</a>
                    </div>
                    {{--/box-body--}}
                </div>
                {{--/box--}}


                {{--Start of box--}}
                <div class="box box-solid box-default collapsed-box">
                    <div class="box-header">
                        <h3 class="box-title">Deleted User list</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body" hidden>

                        @foreach($users as $user)
                            @if($user->deleted_at != null)
                                <div>
                                    <ul class="list-group">
                                        <a href="/users/{{ $user->id }}" class="list-group-item">
                                            <h4 class="list-group-item-heading">
                                                {{ $user->name }}</h4>
                                        </a>
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    {{--/box-body--}}
                </div>
                {{--/box--}}

            </div>
        </div>
    </div>

@stop