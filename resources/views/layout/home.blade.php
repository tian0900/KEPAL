@include('layout.navbar')

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

  <div class="swiper-wrapper">
    @foreach($carousels as $carousel)
    <div class="swiper-slide carousel-item-a intro-item ">
      <img src="{{url('gbr_galeri/'.$carousel->gambar)}}" class="bg-image" style="object-fit: contain;" alt="">
      <div class="overlay overlay-a"></div>
      <div class="intro-content display-table">
        <div class="table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="intro-body">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->

<main id="main">

  <!-- ======= Services Section ======= -->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="bi bi-cart"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Produk</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Produk yang kami jual merupakan produk berkualitas dengan harga yang terjangkau untuk perawatan kendaraan.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="bi bi-calendar4-week"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Layanan</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Jasa yang kami miliki sangat terjamin dapat membuat kendaraan terlihat tetap bagus dan sehat.
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
                <span class="bi bi-card-checklist"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c">Pemesanan</h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
                Kami akan menyarankan jasa dan produk yang paling cocok untuk kendaraan yang anda miliki.
              </p>
            </div>
          </div>
        </div>
      </div>
  </section><!-- End Services Section -->

  <!-- ======= Latest Properties Section ======= -->
  <section class="section-property section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Produk Kami </h2>
            </div>
            <div class="title-link">
              <a href="/produk">Semua Produk
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="property-carousel" class="swiper">
        <div class="swiper-wrapper">
          @foreach($produks as $produk)
          <div class="carousel-item-c swiper-slide">
            <a href="produk/detail/{{$produk->id_produk}}">
              <div class="card mycard-lebar">
                <div class="img-box-b">
                  <img src="{{url('gbr_produk/'.$produk->gambar)}}" class="mycard-image-lebar" alt="" height="400px">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-title-b">
                      <h3 class="">
                        <span class="">{{$produk->nama}}</span>
                      </h3>
                    </div>
                    <div class="price-box d-flex">
                      <h6>
                        <span class="price-a">@currency($produk->harga)</span>
                      </h6>
                    </div>
                    <h6>
                      {{$produk->kategori}}
                    </h6>
                  </div>
                </div>
              </div>
            </a>
          </div><!-- End carousel item -->
          @endforeach

        </div>
      </div>
      <div class="propery-carousel-pagination carousel-pagination"></div>

    </div>
  </section><!-- End Latest Properties Section -->



  <!-- ======= Latest News Section ======= -->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Layanan Kami</h2>
            </div>
            <div class="title-link">
              <a href="/layanan">Semua Layanan
                <span class="bi bi-chevron-right"></span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div id="news-carousel" class="swiper">
        <div class="swiper-wrapper">
          @foreach($layanans as $layanan)
          <div class="carousel-item-c swiper-slide">
            <a href="layanan/detail/{{$layanan->id_layanan}}">
              <div class="card mycard-lebar">
                <div class="img-box-b">
                  <img src="{{url('gbr_produk/'.$layanan->gambar_layanan)}}" alt="" class=" mycard-image-lebar">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-title-b">
                      <h4>
                        {{$layanan->jenisservice}}
                      </h4>
                    </div>
                    <div class="card-category-b">
                      <a class="category-b">TIPE A | @currency($layanan->harga_tipea)</a>
                    </div>
                    <br>
                    <div class="card-category-b">
                      <a class="category-b">TIPE B | @currency($layanan->harga_tipeb)</a>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div><!-- End carousel item -->
          @endforeach
        </div>
      </div>

      <div class="news-carousel-pagination carousel-pagination"></div>
    </div>
  </section><!-- End Latest News Section -->



</main><!-- End #main -->

<!-- ======= Testimonials Section ======= -->
<section class="section-testimonials section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">Galeri</h2>
          </div>
          <div class="title-link">
          </div>
        </div>
      </div>
    </div>

    <div id="testimonial-carousel" class="swiper">
      <div class="swiper-wrapper">
        @foreach($galeris as $galeri)
        <div class="carousel-item-c swiper-slide">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{asset('gbr_galeri')}}/{{$galeri->gambar}}" alt="" class="img-b img-fluid" width="100%" height="500px">
            </div>
          </div>
        </div><!-- End carousel item -->
        @endforeach
      </div>
    </div>

    <div class="testimonial-carousel-pagination carousel-pagination"></div>
  </div>
</section><!-- End Latest News Section -->

<section class="property-single  section-t8">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="title-box">
          <h2 class="title-a">Ulasan </h2>
        </div>
        <div id="property-single-carousel" class="swiper">
          <div class="swiper-wrapper">
            @foreach($testimonis as $testimoni)
            <div class="card p-5 carousel-item-c swiper-slide">
              <div class="border-primary news-box">
                <div class="testimonial-block_user">
                  <div class="testimonial-block_user_info">
                    <h3 class="testimonial-block_user_info_name">{{$testimoni->judul}}</h3>
                    <h4>{{$testimoni->name}}</h4>
                  </div>
                </div>
                <div class="testimonial-block_content">
                  <p>{{$testimoni->pesan}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="property-single-carousel-pagination carousel-pagination"></div>
      </div>
    </div>
</section>

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