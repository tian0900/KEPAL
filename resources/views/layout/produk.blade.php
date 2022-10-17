@include('layout.navbar')

<main id="main">

  <!-- ======= Intro Single ======= -->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href={{url('/')}}>Beranda</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Produk
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= Property Grid ======= -->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            <form>
              <select id="assigned-user-filter" class="custom-select">
                <option value="All" selected>All</option>
                <option value="Sparepart">Sparepart</option>
                <option value="Eksterior">Eksterior</option>
                <option value="Interior">Interior</option>
                <option value="Filter">Filter</option>
              </select>
            </form>
          </div>
        </div>

        <div class="row">
          @foreach($produks as $produk)
          <div class="col-md-3 task-list-row" data-assigned-user="{{$produk->kategori}}">
            <a href="produk/detail/{{$produk->id_produk}}">
              <div class=" card mycard-lebar">
                <div class="img-box-b">
                  <img src="{{asset('gbr_produk')}}/{{$produk->gambar}}" alt="" height="400px" width="400px" class="mycard-image-lebar">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-title-b">
                      <h5>
                        <a href="produk/detail/{{$produk->id_produk}}">{{$produk->nama}}
                      </h5>
                    </div>
                    <div class="price-box d-flex">
                      <span class="price-a">@currency($produk->harga)</span>
                    </div>
                    <h6>
                      {{$produk->kategori}}
                    </h6>
                  </div>
                </div>
              </div>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section><!-- End Property Grid Single-->
</main><!-- End #main -->

<script>
  $('#assigned-user-filter').on('change', function() {
    var assignedUser = this.value;

    if (assignedUser === 'All') {
      $('.task-list-row').hide().filter(function() {
        return $(this).data('assigned-user') != assignedUser;
      }).show();
    } else {
      $('.task-list-row').hide().filter(function() {
        return $(this).data('assigned-user') == assignedUser;
      }).show();
    }
  });
</script>


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
  <script src="{{asset('js')}}/sb-admin-2.min.js"></script>
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