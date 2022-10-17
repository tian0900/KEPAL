@include('layout.navbar')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    </section><!-- End Intro Single-->
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href={{url('/')}}>Beranda</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/checkout/produk/{{ Auth::user()->user_id}}">Riwayat Pemesanan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a>Pembayaran</a>
                </li>
            </ol>
        </nav>
        <div class="py-5 text-center">
            <h2>Pembayaran</h2>
            <p class="lead">Silahkan transfer sesuai dengan total pembayaran yang tertera, tidak kurang dan tidak lebih. Kemudian masukkan bukti pembayaran dan tunggu hingga kami mengkonfirmasinya. Terimakasih</p>
        </div>
        <!-- ======= Property Grid ======= -->
        <section class="property-grid grid">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-10 ">
                        <div class="row no-gutters ">
                            <div class="col col-1">
                            </div>
                            <div class="col">
                                @foreach($pesan as $pesans)
                                <form action="{{route('pembayaran.store',$pesans->id_pemesanan)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="card col-xl-12 border-left-primary shadow py-2">
                                        <div class="card-body">
                                            <div style="padding: 10px;">
                                                <div class=" py-2">
                                                    <h6>Metode Pembayaran : @if($pesans-> metode_pembayaran == 'BCA')
                                                        {{$pesans->metode_pembayaran}} - No Rek 0000000001
                                                        @elseif($pesans-> metode_pembayaran == 'BNI')
                                                        {{$pesans->metode_pembayaran}} - No Rek 0000000002
                                                        @elseif($pesans-> metode_pembayaran == 'Mandiri')
                                                        {{$pesans->metode_pembayaran}} - No Rek 0000000003
                                                        @endif
                                                    </h6>
                                                </div>
                                                <div class="py-2">
                                                    <h6>Total Pembayaran : @currency($pesans->total_pemesanan)</h6>
                                                </div>
                                                <div class="py-2">
                                                    <h6>Bukti Pembayaran</h6>
                                                    <input type="file" class="form-control  @error('bukti_pembayaran') is-invalid @enderror" id="gambar" name="bukti_pembayaran" value="" onchange="previewImage()" autofocus value="{{ old('bukti_pembayaran') }}">
                                                    @error('bukti_pembayaran')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                    <br>
                                                    <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 10px;">
                                                <button type="submit" class="btn btn-a btn-lg btn-block">Bayar</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                        </div>
                                    </div>
                                </form>
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