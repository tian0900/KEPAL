@include('layout.navbar')
@include('sweetalert::alert')
<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">

  </section><!-- End Intro Single-->

  <!-- ======= Property Grid ======= -->
  <section class="property-grid grid">
    <div class="container">
      <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href={{url('/')}}>Beranda</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            <a href={{url('/produk')}}>Produk</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Produk Detail
          </li>
        </ol>
      </nav>
      <div class="row justify-content-center">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-8 col-md-6 mb-4 j">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters ">
                <div class="col col-4">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    <img src="{{asset('gbr_produk')}}/{{$produks->gambar}}" alt="" class="img-b img-fluid" width="400px">
                  </div>

                </div>
                <div class="col col-1">
                </div>
                <div class="col col-6">
                  <h3 class="title-2">{{$produks->nama}}</h3>
                  <h5 class="title-2">@currency($produks->harga)</h5>
                  <form action="{{route('pesan.produk')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_produk" class="form-control" value="{{$produks->id_produk}}">
                    <input type="hidden" name="harga" required="required" class="form-control" value="{{$produks->harga}}">
                    <input type="hidden" name="stok" required="required" class="form-control" value="{{$produks->stok}}">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <input type="number" name="kuantitas" class="form-control form-control-a  @error('kuantitas') is-invalid @enderror" autofocus value="{{ old('kuantitas') }}">
                          @error('kuantitas')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <button type="submit" class="btn btn-a ">Kirim</button>
                      </div>
                    </div>

                </div>
                </form>
                <div class="col col-1">
                </div>
                <br>
              </div>
              <hr>
              <span class="badge badge-pill badge-secondary">{{$produks->kategori}}</span>
              <div class="price-box d-flex">
                tersisa : &nbsp {{$produks->stok}}
              </div>
              <div class="h6 mb-0  text-gray-400">{{$produks->deskripsi}}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section><!-- End Property Grid Single-->

  <!-- @if(Session::has('success'))
    <script>
        toastr.success("{{Session::get('success') }}")
    </script>
    @endif
    -->

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