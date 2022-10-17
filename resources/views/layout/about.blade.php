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
                Tentang
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section><!-- End Intro Single-->

  <!-- ======= About Section ======= -->
  <section class="section-about">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 position-relative">
          <div class="about-img-box">
            <img src="{{url('img/das-bogas2.jpg')}}" alt="" height="600px" width="100%">
          </div>
          <div class="sinse-box">
            <p>Berdiri tahun</p>
            <h3 class="sinse-title">
              <br> 8 Februari 2010
            </h3>

          </div>
        </div>
        <div class="col-md-12 section-t8 position-relative">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <img src="{{url('img/logodasbogas.jpg')}}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-2  d-none d-lg-block position-relative">
              <div class="title-vertical d-flex justify-content-start">

              </div>
            </div>
            <div class="col-md-6 col-lg-5 section-md-t3">
              <div class="title-box-d">
                <h3 class="title-d">
                  <span>Latar belakang berdirinya Das Bogas</span>
                </h3>
              </div>
              <p class="color-text-a">
                Arti kata DAS BOGAS yang berasal dari bahasa batak yang artinya pekerjaan yang dilakukan sampai selesai atau tuntas
              </p>
              <p class="color-text-a">
                Beberapa fasilitas yang tersedia Cafe, free Wi-Fi. Mengatasi berbagai masalah mobil dalam waktu yang singkat dan hasil yang memuaskan.
                Menerima derek mobil mogok dan jemput cuci mobil. Layanan dari mulai doorsmeer, ganti oli dan servis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Contact Single ======= -->
  <section class="contact mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-map box">
            <div id="map" class="contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.4621045687763!2d99.11076761568943!3d2.350262958196965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e06b2a2fc185b%3A0x7b0575fa5ebbf823!2sDas%20Bogas%20Auto%20Service!5e0!3m2!1sid!2sid!4v1646035930629!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>
        </div>

        @guest
        <div class="col-sm-12 section-t8">
          <div class="title-box-d">
            <h3 class="title-d">
              <span>Ulasan</span>
            </h3>
          </div>
          <div class="row">
            <div class="col-md-7">
              <form action="" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Nama Anda" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Email Anda" required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="judul" class="form-control form-control-lg form-control-a" placeholder="Judul" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="pesan" class="form-control" cols="45" rows="8" placeholder="Pesan" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 my-3">
                  </div>
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-a">Kirim Ulasan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @else
        @foreach($pesan as $pesan)

        <div class="col-sm-12 section-t8">
          <div class="title-box-d">
            <h3 class="title-d">
              <span>Ulasan</span>
            </h3>
          </div>
          <div class="row">
            <div class="col-md-7">
              <form action="{{route('testimoni')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-lg form-control-a" value="{{$pesan->name}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" value="{{$pesan->email}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="judul" class="form-control form-control-lg form-control-a" placeholder="Judul" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="pesan" class="form-control" cols="45" rows="8" placeholder="Pesan" required></textarea>
                    </div>
                  </div>
                  <div class="col-md-12 text-center mt-3">
                    <button type="submit" class="btn btn-a">Kirim Ulasan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        @endguest
      </div>
    </div>
  </section><!-- End Contact Single-->

  </div>
  </section><!-- End Latest Properties Section -->


</main><!-- End #main -->



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
                  <i class="bi bi-chevron-right"></i> <a href="#">Beranda</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Produk</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Layanan</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Cafe</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Tentang</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Masuk</a>
                </li>
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