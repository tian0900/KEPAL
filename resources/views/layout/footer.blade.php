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
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-youtube" aria-hidden="true"></i>
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