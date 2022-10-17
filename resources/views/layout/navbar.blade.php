<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Das Bogas Auto Service</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('logo.jpg')}}" rel="icon">
  <link href="{{asset('img')}}/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor')}}/aos/aos.css" rel="stylesheet">
  <link href="{{asset('vendor')}}/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{asset('vendor')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('vendor')}}/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('vendor')}}/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('vendor')}}/jquery/jquery.min.js" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('css')}}/style.css" rel="stylesheet">
  <link href="{{asset('css')}}/stylecard.css" rel="stylesheet">
  <script src="{{asset('js')}}/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
  <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->

</head>

<body>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="/">Das Bogas<span class="color-b"> Auto Service</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href={{url('/')}}>Beranda</a>
          </li>

          <li class="nav-item {{Request::segment(1) === 'produk' ? 'active' : null }}">
            <a class="nav-link " href={{url('/produk')}}>Produk</a>
          </li>

          <li class="nav-item {{Request::segment(1) === 'layanan' ? 'active' : null }}">
            <a class="nav-link " href={{url('/layanan')}}>Layanan</a>
          </li>

          <li class="nav-item {{Request::segment(1) === 'cafe' ? 'active' : null }}">
            <a class="nav-link " href={{url('/cafe')}}>Kafe</a>
          </li>

          <li class="nav-item {{Request::segment(1) === 'about' ? 'active' : null }}">
            <a class="nav-link " href={{url('/about')}}>Tentang</a>
          </li>
          @guest
          @if (Route::has('login'))
          <li class="nav-item {{Request::segment(1) === 'login' ? 'active' : null }}">
            <a class="nav-link " href={{ route('login') }}>{{ __('Masuk') }}</a>
          </li>
          @endif
          @else
          @if( Auth::user()->role == 0 )
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
            <div class="dropdown-menu">
              <a class="dropdown-item " href="/checkout/produk/{{ Auth::user()->user_id}}">Keranjang</a>
              <a class="dropdown-item " href={{url('/statuspesanan')}}>Riwayat Pemesanan</a>
              <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
          @else
          <li>
            <div class="price-box d-flex">
              <span class="price-a">
                <button type="button" class="btn" style="width: 180px; text-align: center" onclick="window.location.href='/daftarpemesananadmin/tambah'">Admin</button>
            </span>
            </div>
          </li>
          @endif
          @endguest
        </ul>
      </div>
    </div>
  </nav><!-- End Header/Navbar -->

</body>

</html>