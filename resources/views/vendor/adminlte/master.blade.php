<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="Q6VK8Kxg47QplVhVALtHvKk5VeePVHODSEKFhNfvFsA"/>
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 2'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="/css/app.css">

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
        @endif

    @yield('adminlte_css')

    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="hold-transition @yield('body_class')">

@yield('body')

<script src="{{ asset('vendor/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('vendor/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js'></script>
<script src="/js/charts.js"></script>
<script src="/js/autocomplete.js"></script>
{{--<script src="public/js/mixed.js"></script>--}}

@if(config('adminlte.plugins.datatables'))
    <!-- DataTables -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
@endif

@yield('adminlte_js')

</body>
</html>
