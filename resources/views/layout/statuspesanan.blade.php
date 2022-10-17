@include('layout.navbar')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    </section><!-- End Intro Single-->
    @if(empty($pesan) && count($pesan) == 0 && empty($booking) )
    <section class="property-grid grid">
        <div class="container">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{url('/')}}>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a>Riwayat Pemesanan</a>
                        </li>
                    </ol>
                </nav>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-10 col-md-6 mb-4">
                    <div class="card border-left-primary shadow py-2 text-center">
                        <div class="card-body">
                            <h1>Tidak ada pesanan</h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <!-- ======= Property Grid ======= -->
    <section class="property-grid grid">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Earnings (Monthly) Card Example -->
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{url('/')}}>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a>Riwayat Pemesanan</a>
                        </li>
                    </ol>
                </nav>

                <div class="col-xl-12 col-md-6 mb-4">
                    @if(count($pesan) != 0 )
                    <h2 class="title-2 text-center">Menunggu</h2>
                    <div class="row no-gutters ">
                        <div class="col col-1">
                        </div>
                        <div class="col col-10">
                            @foreach($pesan as $pesan)
                            <div class="card col-xl-12 col-md-6 border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row" style="padding: 10px;">
                                        <div class="col col-1">
                                        </div>
                                        <div class="col col-6">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <div class="price-box d-flex">
                                                ID Pemesanan : {{$pesan->kode_transaksi}}
                                                <br>
                                                
                                            </div>
                                            <div class="text-danger mb-0 text-gray-800">Tanggal Kadaluwarsa : {{ Carbon\Carbon::parse($pesan->tanggal_kadaluwarsa)->format('d M Y - H:i') }}</div>
                                        </div>
                                        <div class="col col-4">
                                            @currency($pesan->total_pemesanan)
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col col-1">
                                        </div>
                                        <div class="col col-6">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            @if($pesan->status_pembayaran == 'Belum Bayar')
                                            <button type="button" class="btn btn-a" onclick="window.location.href='/pembayaran/{{$pesan->id_pemesanan}}'">Bayar Sekarang</button>
                                            @elseif($pesan->status_pembayaran == 'Sudah Bayar')
                                            <span class="text-success font-weight-bold">{{$pesan->status_pembayaran}}</span>
                                            @endif
                                        </div>
                                        <div class="col col-4">
                                            <div class="col-md-8">
                                                <a href="/statuspesanan/detail/{{$pesan->id_pemesanan}}" class="link-a font-weight-bold">DESKRIPSI
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>


                @endif

                <div class="col-md-12 ">
                    @if(count($sudahbayar) != 0 )
                    <h2 class="title-2 text-center">Sudah Bayar </h2>
                    <div class="row no-gutters ">
                        <div class="col col-1">
                        </div>
                        <div class="col col-10">
                            @foreach($sudahbayar as $pesan)
                            <div class="card  border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row" style="padding: 10px;">
                                        <div class="col col-1">
                                        </div>
                                        <div class="col col-6">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            <div class="price-box d-flex">
                                                ID Pemesanan : {{$pesan->kode_transaksi}}
                                            </div>
                                        </div>
                                        <div class="col col-4">
                                            @currency($pesan->total_pemesanan)
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="padding: 10px;">
                                        <div class="col col-1">
                                        </div>
                                        <div class="col col-6">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                            @if($pesan->status_pembayaran == 'Belum Bayar')
                                            <button type="button" class="btn btn-a" onclick="window.location.href='/pembayaran/{{$pesan->id_pemesanan}}'">Bayar Sekarang</button>
                                            @elseif($pesan->status_pembayaran == 'Sudah Bayar')
                                            <span class="text-success font-weight-bold">{{$pesan->status_pembayaran}}</span>
                                            @endif
                                        </div>
                                        <div class="col col-4">
                                            <div class="col-md-8">
                                                <a href="/statuspesanan/detail/{{$pesan->id_pemesanan}}" class="link-a font-weight-bold">DESKRIPSI
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section><!-- End Property Grid Single-->
    @endif
</main>


<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <img src="{{asset('logo2.png')}}" width="300px" alt="">
                        <h3 class="w-title-a text-brand">Das Bogas Auto Service</h3>
                    </div>
                    <div class="w-body-a">
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Jam Operasi : :</span> 08:00 - 17:00 setiap hari
                            </li>
                            <li class="color-a">
                                <span class="color-text-a">Phone :</span> 085262323979
                            </li>
                            <li class="color-a">
                                <span class="color-text-a">Email
                                    :
                                </span> bengkeldasbogas@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">PETA</h3>
                    </div>
                    <div class="w-body-a">
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{url('/')}}>Beranda</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{url('/produk')}}>Produk</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{url('/layanan')}}>Layanan</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{url('/cafe')}}>Kafe</a>
                                </li>
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{url('/about')}}>Tentang</a>
                                </li>
                                @guest
                                @if (Route::has('login'))
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href={{ route('login') }}>Masuk</a>
                                </li>
                                @endif
                                @else
                                <li class="item-list-a">
                                    <i class="bi bi-chevron-right"></i> <a href="#">Masuk</a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">LOKASI</h3>
                    </div>
                    <div class="w-body-a">
                        <p>Jl. Pasar Melintang Tambunan, Desa Lumban Pea Timur, Kec. Balige, Kab. Toba</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>

    <!-- ======= Footer ======= -->


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{$instagram}}" target="_blank">
                                    <i class="bi bi-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$twitter}}" target="_blank">
                                    <i class="bi bi-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$youtube}}" target="_blank">
                                    <i class="bi bi-youtube" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{$facebook}}" target="_blank">
                                    <i class="bi bi-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">Kelompok 3 PA2</span> 2022
                        </p>
                    </div>
                    <div class="credits">
                        By <a href="">INSTITUT TEKNOLOGI DEL</a>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- @if(Session::has('success'))
  <script>
    toastr.success("{{Session::get('success') }}")
  </script>
  @endif
  @if(Session::has('warning'))
  <script>
    toastr.warning("{{Session::get('warning') }}")
  </script>
  @endif -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vendor JS Files -->
    <script src="{{asset('js')}}/previewimg.js"></script>
    <script src="{{asset('js')}}/owl.carousel.js"></script>
    <script src="{{asset('js')}}/jquery-3.3.1.slim.min.js"></script>
    <script src="{{asset('vendor')}}/aos/aos.js"></script>
    <script src="{{asset('vendor')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('vendor')}}/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('vendor')}}/php-email-form/validate.js"></script>
    <script>
        AOS.init({
            duration: 500,
            easing: 'ease-in-out',
            once: false,
            mirror: false
        });
    </script>

    <!-- Template Main JS File -->
    <script src="{{asset('js')}}/main.js"></script>

    </body>

    </html>