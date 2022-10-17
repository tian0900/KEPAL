<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Das Bogas Auto Service</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor')}}/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <link href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="{{asset('css')}}/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{asset('logo.jpg')}}" rel="icon">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Das Bogas Auto Service</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{Request::segment(1) === 'dashboard' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('/dashboard' )}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Daftar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{Request::segment(1) === 'daftarproduk' ? 'active' : null }}">
                <a class="nav-link collapsed" href="{{ url('/daftarproduk' )}}" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{Request::segment(1) === 'daftarlayanan' ? 'active' : null }}">
                <a class="nav-link collapsed" href="{{ url('/daftarlayanan' )}}" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{Request::segment(1) === 'daftarcafe' ? 'active' : null }}">
                <a class="nav-link collapsed" href="{{ url('/daftarcafe' )}}" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Kafe</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pesan
            </div>

            <li class="nav-item {{Request::segment(1) === 'daftarpemesananadmin' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('daftarpemesananadmin' )}}">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Pemesanan</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{Request::segment(1) === 'daftarpemesanan' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('daftarpemesanan' )}}">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Pemesanan Produk</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{Request::segment(1) === 'daftarpembookingan' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('/daftarpembookingan' )}}">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Pemesanan Layanan</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{Request::segment(1) === 'daftarpemesanankafe' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('/daftarpemesanankafe' )}}">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Pemesanan Kafe</span></a>
            </li>
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Informasi
            </div>
            <li class="nav-item {{Request::segment(1) === 'daftarsosialmedia' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('/daftarsosialmedia' )}}">
                    <i class="fas fa-fw fa-hashtag"></i>
                    <span>Sosial Media</span></a>
            </li>
            <li class="nav-item {{Request::segment(1) === 'daftargaleri' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('daftargaleri' )}}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Galeri</span></a>
            </li>
            <li class="nav-item {{Request::segment(1) === 'daftartestimoni' ? 'active' : null }}">
                <a class="nav-link" href="{{ url('/daftartestimoni' )}}">
                    <i class="fas fa-fw fa-comment"></i>
                    <span>Ulasan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{asset('img/undraw_profile.svg')}}">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> &nbsp {{ Auth::user()->name }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                    </ul>
                </nav>



                <!-- End of Topbar -->
                <!-- Logout Modal-->




                <!-- End of Content Wrapper -->
</body>

</html>