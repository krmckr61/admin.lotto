<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {!! config('app.name') !!}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! url('asset/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="{!! url('asset/vendor/bootstrap-social/bootstrap-social.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! url('asset/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{!! url('asset/dist/css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! url('asset/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{!! url('asset/css/style.css') !!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('css')

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! url('') !!}">{!! config('app.name') !!}</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> Profilim</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Çıkış Yap
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{!! url('/') !!}" class="active"><i class="fa fa-dashboard fa-fw"></i> Anasayfa</a>
                    </li>
                    <li>
                        <a href="{!! url('boards') !!}"><i class="fa fa-th fa-fw"></i> Kartlar</a>
                    </li>
                    <li>
                        <a href="{!! url('game') !!}"><i class="fa fa-gamepad fa-fw"></i> Oyun</a>
                    </li>
                    <li>
                        <a href="{!! url('balances') !!}"><i class="fa fa-money fa-fw"></i> Bakiye Yönetimi</a>
                    </li>
                    <li>
                        <a href="{!! url('clients') !!}"><i class="fa fa-users fa-fw"></i> Oyuncular</a>
                    </li>
                    <li>
                        <a href="{!! url('settings') !!}"><i class="fa fa-cogs fa-fw"></i> Ayarlar</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('title')</h1>
                    @if(Session::has('alert'))
                        <div class="alert alert-{{ Session::get('alert.type') }} alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <b>
                                <?php
                                $alertMessage = ['success' => 'Başarılı!', 'danger' => 'Başarısız!', 'warning' => 'Uyarı!'];
                                ?>
                                @if(!empty(Session::get('alert.head')))
                                    {{ Session::get('alert.head') }}
                                @else
                                    {{ $alertMessage[Session::get('alert.type')] }}
                                @endif
                            </b>
                            {{ Session::get('alert.message') }}
                        </div>
                    @endif
                    @yield('content')

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{!! url('asset/vendor/jquery/jquery.min.js') !!}" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{!! url('asset/vendor/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>

<!-- Base Js Files -->
<script src="{!! url('asset/js/core.js') !!}" type="text/javascript"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{!! url('asset/vendor/metisMenu/metisMenu.min.js') !!}" type="text/javascript"></script>

<!-- Custom Theme JavaScript -->
<script src="{!! url('asset/dist/js/sb-admin-2.js') !!}" type="text/javascript"></script>

@yield('js')

</body>
</html>