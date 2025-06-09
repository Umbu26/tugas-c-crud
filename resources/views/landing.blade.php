@php
$site_name = get_setting_value('_site_name');
$jumbotron = get_section_data('JUMBOTRON');
$site_description = get_setting_value('_site_description');
$instagram = get_setting_value('_instagram');
$facebook = get_setting_value('_facebook');
$about = get_setting_value('ABOUT');
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $site_name }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
  </head>
  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand text-warning" href="#page-top">{{ $site_name }}</a>
        <button class="navbar-toggler bg-warning text-dark rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link px-3" href="#partner">Kolaborator</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="#about">Profil Saya</a></li>
            <li class="nav-item"><a class="nav-link px-3" href="#profile">Kontak</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <header class="masthead bg-warning text-dark text-center">
      <div class="container d-flex align-items-center flex-column">
        @isset($jumbotron->thumbnail)
        <img class="masthead-avatar mb-4" src="{{ Storage::url($jumbotron->thumbnail) }}" alt="Hero Image" />
        @endisset

        <h1 class="masthead-heading text-uppercase mb-1">{{ $jumbotron->title ?? 'Welcome!' }}</h1>

        <div class="divider-custom divider-light">
          <div class="divider-custom-line bg-dark"></div>
          <div class="divider-custom-icon text-dark"><i class="fas fa-sun"></i></div>
          <div class="divider-custom-line bg-dark"></div>
        </div>

        <p class="masthead-subheading font-weight-light mb-0">{!! strip_tags($jumbotron->content ?? 'Creating dynamic and user-friendly web experiences.') !!}</p>
      </div>
    </header>

    <!-- Collaborators Section -->
    <section class="page-section bg-light" id="partner">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-4">Kolaborator</h2>
        <div class="divider-custom">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-handshake"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
              <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 bg-dark bg-opacity-75">
                <div class="portfolio-item-caption-content text-white"><i class="fas fa-eye fa-2x"></i></div>
              </div>
              <img class="img-fluid" src="assets/img/partner/cabin.png" alt="Partner Image" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="page-section bg-secondary text-white" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase">Profil Saya</h2>
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon"><i class="fas fa-code"></i></div>
          <div class="divider-custom-line"></div>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-4 text-center">
            <img src="assets/img/about.png" class="img-fluid w-75 rounded" alt="About Image" />
          </div>
          <div class="col-lg-6 offset-lg-1">
            <p class="lead">Dengan kemampuan di bidang Laravel, Filament Admin, dan desain antarmuka, saya siap membantu menciptakan solusi digital yang fungsional, modern, dan mudah digunakan.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center bg-dark text-white" id="profile">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4">
            <h4 class="text-uppercase">Location</h4>
            <p class="mb-0">Universitas Negeri Malang<br />Malang, Indonesia</p>
          </div>
          <div class="col-md-4 mb-4">
            <h4 class="text-uppercase">Follow Us</h4>
            @if ($instagram)
              <a class="btn btn-outline-light btn-social mx-1" href="{{ $instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
            @endif
            @if ($facebook)
              <a class="btn btn-outline-light btn-social mx-1" href="{{ $facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
            @endif
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase">About</h4>
            <p class="mb-0">{{ $site_description ?? 'Website built with Laravel & Blade.' }}</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Copyright -->
    <div class="text-center text-white py-3 bg-secondary">
      <small>&copy; {{ $site_name }} {{ now()->year }}</small>
    </div>

    <!-- Partner Modal -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
          <div class="modal-body text-center pb-5">
            <h2 class="text-secondary text-uppercase mb-0">Our First Partner</h2>
            <div class="divider-custom">
              <div class="divider-custom-line"></div>
              <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
              <div class="divider-custom-line"></div>
            </div>
            <img class="img-fluid rounded mb-4" src="assets/img/partner/cabin.png" alt="Partner Image" />
            <p class="mb-4">Kami bangga bekerja sama dengan mitra yang membantu kami berkembang secara berkelanjutan dan profesional.</p>
            <button class="btn btn-warning" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
