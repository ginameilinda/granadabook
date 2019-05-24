<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="canonical shortcut icon" href="{{ url('/gambar/logo4.png') }}">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Plugin CSS -->
  <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/all.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">Granada Book Store</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">GRANADA BOOK STORE</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-9 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-8">Toko Buku Itu Bukti Nyata Bahwa Keragaman Selera Bisa Kumpul Di Bawah Satu Atap Tanpa Saling Mencela. Bookstores Are The Least Discriminative Place In The World.</p>
          @if (Route::has('login'))
          @auth
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ url('/home') }}">Home</a>
          @else
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('login') }}">Login</a>
          @if (Route::has('register'))
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('register') }}">Register</a>
          @endif
          @endauth
          @endif
        </div>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-75 md-12">Demi memenuhi keinginan pembaca, Granada kini hadir dengan versi daring! <br>Jangan lewatkan kemudahan membeli buku dirumahmu dengan biaya pengiriman <strong>gratis</strong>!</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ route('login') }}">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Mungkin orang lain akan menganggap ini berlebihan, tetapi dapat aku katakan aku bisa mencium aroma wangi kertas
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Buku adalah jembatan ilmu untuk menghubungkan pengetahuan dengan kehidupan nyata
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Hidup tanpa buku seperti ruang gelap tak berlampu
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Buku adalah sihir portabel yang unik dan mungkin satu-satunya sihir sejati yang tidak langsung melepaskan semua rahasianya
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Buku adalah pertemuan dua kekuatan yang berhasil memengaruhi pendidikan manusia yaitu seni dan sains
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Granada
              </div>
              <div class="project-name">
                Dunia adalah buku, dan mereka yang tidak bepergian hanya membaca satu halaman
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Our Contact</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Butuh informasi penting seputar buku yang ingin kamu baca? Silahkan hubungi layanan pelanggan.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-map-marker-alt fa-3x mb-3 text-muted"></i>
          <div>Jl. Politeknik, Jl. Pesantren No.2, Cibabat, Cimahi Utara, Kota Cimahi, Jawa Barat 40513</div>
        </div>

        <div class="col-lg-4 ml-auto text-center">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>(022) 6645951</div>
        </div>
        
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:info@poltektedc.ac.id">info@poltektedc.ac.id</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Granada Book Store</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('js/creative.min.js')}}"></script>

</body>

</html>
