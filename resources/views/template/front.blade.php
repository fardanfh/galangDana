<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Impact Bootstrap front - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('front/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('front/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('front/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('front/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- front Main CSS File -->
  <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('front/css/donasi.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="front/img/logo.png" alt=""> -->
        <h1>Donasi<span>Online</span>.</h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a class="nav-link" href="/konfirmasi">Konfirmasi Pendonasian</a></li>
          @if (Auth::check())
            @if (Auth::user()->role == 1)
              <li><a href="/admin/dashboard" class="btn-admin nav-link">Kelola Admin</a></li> 
            @else
              <li><a href="/middle" class="btn-dashboard nav-link">Dashboard</a></li>
            @endif          
          @endif
          @if (!Auth::check())
          <li><a href="/login" class="active-bg">Login</a></li>
          <li><a class="nav-link" href="/register">Daftar</a></li> 
          @else
          <li><a class="btn-logout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          @endif
          </li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  <main id="main">

    @yield('main_konten')

  </main><!-- End #main -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('front/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('front/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('front/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('front/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('front/vendor/php-email-form/validate.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- front Main JS File -->
  <script src="{{ asset('front/js/main.js') }}"></script>

</body>

</html>