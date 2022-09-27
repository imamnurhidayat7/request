<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Pusdatin ATR/BPN</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/css/datatables.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ URL::asset('/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" /> -->
        <!-- App Css-->
        <link href="{{ URL::asset('/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('/css/style.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- Styles -->
    </head>
    <body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{url('/admin/dashboard')}}" class="logo">
                            <span class="logo-sm">
                                <img src="https://www.atrbpn.go.id/cms/assets/upload/kantor_1/kantor/20211014221502.png" alt="" width="40">
                            </span>
                            <span class="logo-lg">
                                <img src="https://www.atrbpn.go.id/cms/assets/upload/kantor_1/kantor/20211014221502.png" alt="" width="40">
                            </span>
                            <span class="text-white" style="margin-left:10px; font-size:18px;">Pusdatin ATR/BPN</span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                
                </div>
                <div class="d-flex">
                    @if(!Auth::user())
                    <div class="dropdown d-none d-lg-inline-block ml-1">
                        <button type="button" class="btn btn-sm btn-primary">
                            Masuk
                        </button>
                    </div>
                    @else
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{asset('/images/user.png') }}"
                                alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ucfirst(Auth::user()->name)}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="{{url('admin/dashboard')}}"><i class="bx bx-home font-size-16 align-middle me-1"></i><span key="t-dashboard"> Dashboard</span></a>
                            <!-- <a class="dropdown-item" href="#" id="btnPassword"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Ganti Password</span></a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="javascript:void();" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Keluar</span></a>
                            <form id="logout-form" action="{{ url('signout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
        </header>

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/dashboard')}}" id="topnav-dashboard" role="button"
                                    >
                                    <i class="bx bx-file me-2"></i><span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                                    <i class="bx bx-file me-2"></i><span key="t-dashboards">Master Data</span> <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                    <a class="nav-link" href="{{url('admin/layanan')}}" id="topnav-dashboard" role="button">
                                        <span key="t-dashboards">Data Layanan</span>
                                    </a>
                                  
                                        
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/request')}}" id="topnav-dashboard" role="button"
                                    >
                                    <i class="bx bx-file me-2"></i><span key="t-dashboards">Data Request Layanan</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/layanan')}}" id="topnav-dashboard" role="button"
                                    >
                                    <i class="bx bx-file me-2"></i><span key="t-dashboards">Data Layanan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('admin/approver')}}" id="topnav-dashboard" role="button"
                                    >
                                    <i class="bx bx-file me-2"></i><span key="t-dashboards">Data Approver</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @include('sweetalert::alert')
                     @yield('content')
                </div> <!-- content -->
            </div>
            
        </div>
    </div>

    <script src="{{ URL::asset('libs/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('libs/bootstrap.min.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/js/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/js/jszip.min.js') }}"></script>
    <!-- Datatable init js -->
    <!-- <script src="{{ URL::asset('/ckeditor/ckeditor.js') }}"></script> -->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $('#datatable').DataTable();
    </script>
    @yield('script')
    </body>
</html>
