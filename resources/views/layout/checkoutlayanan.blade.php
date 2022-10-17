@include('layout.navbar')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    </section><!-- End Intro Single-->
    @if(empty($pesan) || count($pesan) == 0)
    <section class="property-grid grid">
        <div class="container">
            <div class="row justify-content-center">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{url('/')}}>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a>Keranjang Layanan</a>
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
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href={{url('/')}}>Beranda</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a>Keranjang Layanan</a>
                        </li>
                    </ol>
                </nav>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-10 col-md-6 mb-4">
                    <h2 class="title-2">Layanan</h2>
                    <div class="card border-left-primary shadow py-2">
                        <div class="card-body">
                            <div class="row no-gutters ">
                                <div class="col col-1">
                                </div>
                                <div class="col col-10">
                                    <form action="{{route('checkout.storepembookinganlayanan')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @foreach($pesan as $pesan)
                                        <div class="card col-xl-12 col-md-6 ">
                                            <div class="card-body">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col col-1">
                                                    </div>
                                                    <div class="col col-8">
                                                        <div class="h5 mb-0 text-gray-800">{{$pesan->jenisservice}}</div>
                                                        <input type="hidden" name="id_layanan" value="{{$pesan->id_layanan}}">
                                                        <input type="hidden" name="kuantitas" value="{{$pesan->harga}}">

                                                        <div class="price-box d-flex">
                                                            @currency($pesan->harga)
                                                        </div>
                                                        <div class="price-box d-flex">

                                                        </div>
                                                    </div>
                                                    <div class="col col-2">
                                                        <div class="col-md-6 text-center">
                                                            <button type="button" class="btn btn-danger bottom-50 end-50" onclick="window.location.href='/checkout/deletelayanan/{{$pesan->id_keranjanglayanan}}'"><i class="bi bi-trash" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                            </div>
                                        </div> @endforeach
                                        <br>

                                        <div class="col-md-12 text-center bottom-center" style="margin-Top : 90px;">
                                            <div class="row">
                                                <div class="col col-2">
                                                </div>
                                                <div class="col col-4">
                                                    @foreach($total as $totals)
                                                    <div class="h5 mb-0 text-gray-800"> Total : @currency($totals->total)</div>
                                                    @endforeach
                                                </div>
                                                <div class="col col-4"><button type="button" class="btn btn-a" data-bs-toggle="modal" data-bs-target="#exampleModal">Checkout</button>

                                                </div>

                                            </div>
                                        </div>


                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($total as $totals)
                                                        <input type="hidden" name="total_pembayaran" value="{{$totals->total}}">
                                                        @endforeach
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="nama">Tipe Kendaraan</label>
                                                            </div>
                                                            <div class="col-md-8 mb-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE A" checked>
                                                                    <label class="form-check-label" for="exampleRadios1">
                                                                        TIPE A
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE B" checked>
                                                                    <label class="form-check-label" for="exampleRadios1">
                                                                        TIPE B
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="form-group col-md-4">
                                                                <label for="nama">Tanggal Service</label>
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <input type="date" class="form-control @error('tanggal_pembookingan') is-invalid @enderror" name="tanggal_pembookingan" id="tanggal_pembookingan" autofocus value="{{ old('tanggal_pembookingan') }}">
                                                                @error('tanggal_pembookingan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row form-group mt-3">
                                                            <div class="form-group col-md-4">
                                                                <label for="nama">Pukul</label>
                                                            </div>
                                                            <div class="form-group col-md-8">
                                                                <input type="time" class="form-control @error('pukul') is-invalid @enderror" name="pukul" id="pukul" autofocus value="{{ old('pukul') }}">
                                                                @error('pukul')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <label for="keluhan">Keluhan</label>
                                                            <textarea class="form-control @error('keluhan_service') is-invalid @enderror" id="keluhan_service" name="keluhan_service" rows="3"></textarea>
                                                            @error('keluhan_service')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Kirim</button>
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
        </div>
        </div>
    </section><!-- End Property Grid Single-->
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