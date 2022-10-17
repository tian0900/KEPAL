@include('layout.navbar')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    </section><!-- End Intro Single-->
    @if(empty($daftarjoin) || count($daftarjoin) == 0)

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
                        <li class="breadcrumb-item">
                            <a href={{url('/statuspesanan')}}>Riwayat Pemesanan</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a>Riwayat Pemesanan Detail</a>
                        </li>
                    </ol>
                </nav>
                <div class="col-xl-10 col-md-6 mb-4">
                    <div class="card border-left-primary shadow py-2">
                        <div class="card-body" style="padding: 50px;">
                            <div class="row no-gutters ">
                                @foreach($pemesanan as $pemesanans)
                                <div>
                                    <h4>Pemesanan Produk ID</h4>
                                    <h2># {{$pemesanans->id_pemesananproduk}}</h2>
                                    @if($pemesanans->status == 'Verifikasi')
                                    <span class="text-warning font-weight-bold">{{$pemesanans->status}}</span>
                                    @elseif($pemesanans->status == 'Proses')
                                    <span class="text-info font-weight-bold">{{$pemesanans->status}}</span>
                                    @elseif($pemesanans->status == 'Antar')
                                    <span class="text-primary font-weight-bold">{{$pemesanans->status}}</span>
                                    @elseif($pemesanans->status == 'Selesai')
                                    <span class="text-success font-weight-bold">{{$pemesanans->status}}</span>
                                    @elseif($pemesanans->status == 'Tolak')
                                    <span class="texte-danger font-weight-bold">{{$pemesanans->status}}</span>
                                    @endif
                                    <p class="font-weight-light text-info">
                                    {{$pemesanans->keterangan}} <br>
                                    <li>{{ Carbon\Carbon::parse($pemesanans->updated_at)->format('d M Y - H:i') }}</li></p>
                                </div>
                                <hr>
                                @endforeach
                                <h6>Pesanan Detail</h6>
                                @foreach($daftarjoin as $daftarjoin)
                                <p>Produk : {{$daftarjoin->nama}}</p>
                                <p>Kuantitas : {{$daftarjoin->kuantitas_pesan}}</p>
                                <p>Harga : @currency($daftarjoin->total_harga)</p>
                                <hr style="width:50%;text-align:left;margin-left:0">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Property Grid Single-->
</main>
@endif

@if(empty($daftarjoin1) || count($daftarjoin1) == 0)

@else
<!-- ======= Property Grid ======= -->
<section class="property-grid grid">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-10 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body" style="padding: 50px;">
                        <div class="row no-gutters ">
                            @foreach($pembookingan as $pembookingans)
                            <div>
                                <h4>Pemesanan Layanan ID</h4>
                                <h2># {{$pembookingans->id_pembookinganlayanan}}</h2>
                                @if($pembookingans->status == 'Verifikasi')
                                <span class="text-warning font-weight-bold">{{$pembookingans->status}}</span>
                                @elseif($pembookingans->status == 'Diterima')
                                <span class="text-success font-weight-bold">{{$pembookingans->status}}</span>
                                @elseif($pembookingans->status == 'Ditolak')
                                <span class="text-danger font-weight-bold">{{$pembookingans->status}}</span>
                                @endif
                                <p class="font-weight-light text-info">
                                {{$pembookingans->keterangan}}
                                <li>{{ Carbon\Carbon::parse($pembookingans->updated_at)->format('d M Y - H:i') }}</li></p>
                            </div>
                            <hr>
                            @endforeach
                            <h6>Pesanan Detail</h6>
                            @foreach($daftarjoin1 as $daftarjoin1)
                            <p>Jenis Service : {{$daftarjoin1->jenisservice}}</p>
                            <p>Harga : @currency($daftarjoin1->total_harga)</p>
                            <hr style="width:50%;text-align:left;margin-left:0">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Property Grid Single-->
</main>
@endif

<!------------------DAFTAR PEMESANAN KAFE-------------------->

@if(empty($daftarpemesanankafe) || count($daftarpemesanankafe) == 0)

@else
<!-- ======= Property Grid ======= -->
<section class="property-grid grid">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-10 col-md-6 mb-4">
                <div class="card border-left-primary shadow py-2">
                    <div class="card-body" style="padding: 50px;">
                        <div class="row no-gutters ">
                            @foreach($pemesanankafe as $pemesanankafes)
                            <div>
                                <h4>Pemesanan Kafe ID</h4>
                                <h2># {{$pemesanankafes->id_pemesanankafe}}</h2>
                                <p class="font-weight-light text-info">
                                <li>{{ Carbon\Carbon::parse($pemesanankafes->updated_at)->format('d M Y - H:i') }}</li></p>
                            </div>
                            <hr>
                            @endforeach
                            <h6>Pesanan Detail</h6>
                            @foreach($daftarpemesanankafe as $daftarpemesanankafe)
                            <p>Nama : {{$daftarpemesanankafe->nama}}</p>
                            <p>Jumlah : {{$daftarpemesanankafe->kuantitas}}</p>
                            <p>Total : @currency($daftarpemesanankafe->total_harga)</p>
                            <hr style="width:50%;text-align:left;margin-left:0">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Property Grid Single-->
</main>
@endif

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