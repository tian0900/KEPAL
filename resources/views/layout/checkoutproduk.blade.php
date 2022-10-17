@include('layout.navbar')
@include('sweetalert::alert')
<main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">

    </section><!-- End Intro Single-->

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
                            <a>Keranjang</a>
                        </li>
                    </ol>
                </nav>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-10 col-md-6 mb-4">
                    <div class="card border-left-primary shadow py-2">
                        @if(count($pesanlayanan) != 0 || count($pesan) != 0)
                        @if(empty($pesan) || count($pesan) == 0)

                        @else
                        <div class="card-body">
                            <h2 class="title-2 text-center">Produk</h2>
                            <div class="row no-gutters ">
                                <div class="col col-1">
                                </div>
                                <div class="col col-10">
                                    <form action="{{route('checkout.storepemesananproduk')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @foreach($pesan as $pesan)
                                        <div class="card col-xl-12 col-md-6 ">
                                            <div class="card-body">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col col-1">
                                                    </div>
                                                    <div class="col col-6">
                                                        <div class="h5 mb-0 text-gray-800">{{$pesan->nama}}</div>
                                                        <input type="hidden" name="id_produk" value="{{$pesan->id_produk}}">
                                                        <input type="hidden" name="kuantitas" value="{{$pesan->kuantitas}}">
                                                        <input type="hidden" name="total" value="{{$pesan->total}}">
                                                        <div class="price-box d-flex">
                                                            Total : @currency($pesan->total)
                                                        </div>
                                                    </div>
                                                    <div class="col col-3">
                                                        <div class="center row">
                                                            <div class="input-group">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-danger btn-number" onclick="window.location.href='/checkout/kurang/{{$pesan->id_keranjangproduk}}'">
                                                                        <span>-</span>
                                                                    </button>
                                                                </span>
                                                                <input type="text" class="form-control input-number col-md-4 text-center" value="{{$pesan->kuantitas}}" min="1">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-success btn-number" onclick="window.location.href='/checkout/tambah/{{$pesan->id_keranjangproduk}}'">
                                                                        <span>+</span>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1"><button type="button" class="btn btn-danger  bottom-50 end-50" onclick="window.location.href='/checkout/delete/{{$pesan->id_keranjangproduk}}'"><i class="bi bi-trash" aria-hidden="true"></i></button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                            </div>
                                        </div> @endforeach
                                        <br>
                                </div>
                            </div>
                        </div>
                        @endif
                        <!----------------------------------------------------LAYANAN-------------------------------------------------------------------->
                        @if(empty($pesanlayanan) || count($pesanlayanan) == 0)

                        @else
                        <div class="card-body">
                            <h2 class="title-2 text-center">Layanan</h2>
                            <div class="row no-gutters ">
                                <div class="col col-1">
                                </div>
                                <div class="col col-10">

                                    {{ csrf_field() }}
                                    @foreach($pesanlayanan as $pesanlayanan)
                                    <div class="card col-xl-12 col-md-6 ">
                                        <div class="card-body">
                                            <div class="row" style="padding: 10px;">
                                                <div class="col col-1">
                                                </div>
                                                <div class="col col-8">
                                                    <div class="h5 mb-0 text-gray-800">{{$pesanlayanan->jenisservice}}</div>
                                                    <input type="hidden" name="id_layanan" value="{{$pesanlayanan->id_layanan}}">
                                                    <input type="hidden" name="kuantitas" value="{{$pesanlayanan->harga}}">

                                                    <div class="price-box d-flex">
                                                        @currency($pesanlayanan->harga)
                                                    </div>
                                                    <div class="price-box d-flex">

                                                    </div>
                                                </div>
                                                <div class="col col-2">
                                                    <div class="col-md-6 text-center">
                                                        <button type="button" class="btn btn-danger bottom-50 end-50" onclick="window.location.href='/checkout/deletelayanan/{{$pesanlayanan->id_keranjanglayanan}}'"><i class="bi bi-trash" aria-hidden="true"></i></button>
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
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12 text-center bottom-center" style="margin-Top : 40px; margin-Bottom : 40px;">
                            <div class="row">
                                <div class="col col-2">
                                </div>
                                <div class="col col-4">

                                    <div class="h5 mb-0 text-gray-800"> Total : @currency($totalpembayaran)</div>

                                </div>
                                <div class="col col-4"><button type="button" class="btn btn-a" onclick="window.location.href='/buatpesanan'">Checkout</button>

                                </div>

                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <input type="hidden" name="total_harga" value="{{$totalpembayaran}}">
                                        <h6>Informasi Pemesanan</h6>
                                        <p>Silahkan transfer ke salah satu rekening berikut : </p>
                                        <div class="form-group row m-2">
                                            <div class=" col-md-3">
                                                <label for="nama">Metode Pembayaran</label>
                                            </div>
                                            <div class="col-md-9 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE A" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        BCA
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE B" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        BNI
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipe_kendaraan" id="exampleRadios1" value="TIPE B" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Mandiri
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <h6>Produk</h6>
                                        <div class="form-group row m-2">
                                            <div class="col-md-3">
                                                <label for="nama">Metode Pengiriman</label>
                                            </div>
                                            <div class="col-md-9 mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="metode_pengiriman" id="antar" value="Antar" checked>
                                                    <label class="form-check-label" for="antar">
                                                        Antar
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="metode_pengiriman" id="ambil_sendiri" value="Ambil Sendiri">
                                                    <label class="form-check-label" for="ambil_sendiri">
                                                        Ambil Sendiri
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center" id="id_data" style="border:5">
                                            <div class="form-group row m-2">
                                                <div class="col-md-3">
                                                    <label for="nama">Nama Penerima</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control form-control-user @error('nama_penerima') is-invalid @enderror" name=" nama_penerima" id="nama_penerima" placeholder="nama penerima" autofocus value="{{ old('jenisservice') }}">
                                                    @error('nama_penerima')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row m-2">
                                                <div class="col-md-3">
                                                    <label for="form-control alamat_penerima">Alamat</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control @error('alamat_penerima') is-invalid @enderror" id="alamat_penerima" name="alamat_penerima" rows="3" autofocus value="{{ old('alamat_penerima') }}"></textarea>
                                                    @error('alamat_penerima')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                // show the table as soon as the DOM is ready
                                                $("#id_data").show();
                                                // shows the table on clicking the noted link
                                                $("#antar").click(function() {
                                                    $("#id_data").show("slow");
                                                });
                                                // hides the table on clicking the noted link
                                                $("#ambil_sendiri").click(function() {
                                                    $("#id_data").hide("fast");
                                                });
                                            });
                                        </script>
                                        <h6>Layanan</h6>
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
                    @else
                    <h2 class="title-2 text-center">Tidak ada pesanan</h2>
                    @endif
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