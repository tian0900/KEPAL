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
                                <div class="col col-4"><button type="button" class="btn btn-a" data-bs-toggle="modal" data-bs-target="#exampleModal">Checkout</button>

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

                                        <h5>{{ Auth::user()->name}}, Silahkan lakukan pembayaran @currency($totalpembayaran)</h5>
                                        <h6>Payment Information</h6>
                                        <p>Silahkan transfer ke salah satu rekening berikut : </p>
                                        <div class="row m-2">
                                            <div class="col-md-2">
                                                <img src="{{url('img/bank_bca.png')}}" alt="" height="20px">
                                            </div>
                                            <div class="col-md-4">
                                                No Rek 000000000001
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <div class="col-md-2">
                                                <img src="{{url('img/bank_bni.png')}}" alt="" height="20px">
                                            </div>
                                            <div class="col-md-4">
                                                No Rek 000000000001
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <div class="col-md-2">
                                                <img src="{{url('img/bank-mandiri.png')}}" alt="" height="20px">
                                            </div>
                                            <div class="col-md-4">
                                                No Rek 000000000001
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>

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
                                        <div class="form-group row m-2">
                                            <div class="col-md-3">
                                                <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                            </div>
                                            <div class="col-md-9">
                                                <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                                <input class="form-control  @error('bukti_pembayaran') is-invalid @enderror" type="file" id="formFile" id="gambar" name="bukti_pembayaran" onchange="previewImage()" autofocus value="{{ old('bukti_pembayaran') }}">
                                                @error('bukti_pembayaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <h6>Note : Silahkan transfer sesuai dengan total pembayaran yang tertera, tidak kurang dan tidak lebih. Kemudian masukkan bukti pembayaran dan tunggu hingga kami
                                            mengkonfirmasinya. Terimakasih
                                        </h6>
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