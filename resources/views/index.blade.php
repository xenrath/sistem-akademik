<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Akademik</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('scaffold/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('scaffold/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('scaffold/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('scaffold/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('scaffold/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('scaffold/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('scaffold/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('scaffold/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('scaffold/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div class="logo me-auto">
        <h1>
          <a href="index.html">Sekolah Dasar ABC</a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html">
          <img src="{{ asset('scaffold/assets/img/logo.png') }}" alt="" class="img-fluid">
        </a> -->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li>
            <a class="nav-link scrollto" href="#hero">Home</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#about">Tentang Kami</a>
          </li>
          <li>
            <a class="nav-link scrollto " href="#portfolio">Galeri</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#testimonials">PPDB</a>
          </li>
          <li>
            <a class="nav-link scrollto" href="#contact">Kontak</a>
          </li>
          <li>
            <a href="{{ url('login') }}" class="nav-link btn-login ms-4">Masuk</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
          data-aos="fade-up">
          <div>
            <h1>{{ $profilesekolah->home_judul }}</h1>
            <h2>{{ $profilesekolah->home_deskripsi }}</h2>
            <a href="#about" class="btn-get-started scrollto">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="{{ asset('storage/uploads/' . $profilesekolah->home_gambar) }}" class="img-fluid"
            alt="Home Gambar">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Tentang Kami</h2>
          <p>
            {{ $profilesekolah->about_deskripsi }}
          </p>
        </div>
        <div class="row">
          <div class="col-lg-6" data-aos="zoom-in">
            <img src="{{ asset('scaffold/assets/img/about.jpg') }}" class="img-fluid rounded" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0">
              <h3>Visi</h3>
              <p>
                {{ $profilesekolah->about_visi }}
              </p>
              <h3>Misi</h3>
              <p>
                {{ $profilesekolah->about_misi }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Features Section ======= -->
    {{-- <section id="features" class="features">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Program Unggulan</h2>
        </div>
        <div class="row">
          <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item" data-aos="fade-up">
                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                  <h4>Pendidikan Dasar Berkualitas</h4>
                  <p>
                    Kurikulum berbasis kompetensi, pendidikan karakter, pembelajaran aktif dan kreatif, teknologi
                    dalam pembelajaran, pengembangan potensi individu, dan lingkungan belajar inklusif.
                  </p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                  <h4>Ekstrakurikuler Menarik</h4>
                  <p>
                    Memberikan kesempatan kepada siswa untuk mengembangkan minat dan bakat mereka melalui kegiatan di
                    luar kelas, seperti olahraga, seni, musik, dan klub sains.
                  </p>
                </a>
              </li>
              <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                  <h4>Kelas Kreatif dan Inovatif</h4>
                  <p>
                    Mendorong siswa untuk berpikir kritis, mengembangkan kreativitas, dan menerapkan ide-ide baru dalam
                    pembelajaran.
                  </p>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <figure>
                  <img src="{{ asset('scaffold/assets/img/features-1') }}.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-2">
                <figure>
                  <img src="{{ asset('scaffold/assets/img/features-2') }}.png" alt="" class="img-fluid">
                </figure>
              </div>
              <div class="tab-pane" id="tab-3">
                <figure>
                  <img src="{{ asset('scaffold/assets/img/features-3') }}.png" alt="" class="img-fluid">
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Galeri</h2>
          <p>
            Koleksi foto-foto dari kegiatan siswa, acara sekolah, proyek kreatif, serta momen berharga dalam lingkungan
            belajar.
          </p>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($profilesekolah->galeri_gambar as $key => $gambar)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{ asset('storage/uploads/' . $gambar) }}" class="img-fluid w-100 h-100" alt="">
                <div class="portfolio-links">
                  <p>Lihat</p>
                  <a href="{{ asset('storage/uploads/' . $gambar) }}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox">
                    <i class="bx bx-show"></i>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- End Portfolio Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">
        <div class="row" data-aos="zoom-in">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Tertarik dengan Sekolah Kami?</h3>
            <p>
              Bergabunglah dengan Sekolah Dasar ABC sekarang dan temukan pengalaman pendidikan yang luar biasa dengan
              pendaftaran siswa baru kami.
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#testimonials">Cara Pendaftaran</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Cta Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Cara Pendaftaran</h2>
          <p>
            Daftarlah sekarang untuk menjadi peserta didik baru di Sekolah Dasar ABC! Ikuti panduan pendaftaran yang
            mudah dan cepat. Jangan lewatkan kesempatan untuk memulai perjalanan pendidikan yang menarik dan penuh
            peluang di Sekolah Dasar ABC.
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <a href="{{ asset('storage/uploads/' . $profilesekolah->ppdb_flayer) }}" data-gallery="portfolioGallery"
              class="portfolio-lightbox">
              <img src="{{ asset('storage/uploads/' . $profilesekolah->ppdb_flayer) }}" class="img-fluid w-100"
                alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Kontak</h2>
        </div>
        <div class="info mb-4" data-aos="fade-right">
          <div class="row">
            <div class="col-lg-4">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi :</h4>
                <p>{{ $profilesekolah->kontak_alamat }}</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email :</h4>
                <p>{{ $profilesekolah->kontak_email }}</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telp / WA :</h4>
                <p>+62{{ $profilesekolah->kontak_telp }}</p>
              </div>
            </div>
          </div>
        </div>
        <div data-aos="fade-left">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.954206787928!2d109.12112307430388!3d-6.89608099310311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTMnNDUuOSJTIDEwOcKwMDcnMjUuMyJF!5e0!3m2!1sid!2sid!4v1688228237574!5m2!1sid!2sid"
            frameborder="0" style="border:0; width: 100%; height: 360px;" allowfullscreen></iframe>
        </div>
      </div>
    </section>
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="footer-info">
              <h3>Sekolah Dasar ABC</h3>
              <p>
                Ikuti semua sosial media kami untuk mendapatkan update selanjutnya.
              </p>
              <div class="social-links mt-3">
                <a href="{{ $profilesekolah->link_facebook }}" class="facebook" target="_blank">
                  <i class="bx bxl-facebook"></i>
                </a>
                <a href="{{ $profilesekolah->link_instagram }}" class="instagram" target="_blank">
                  <i class="bx bxl-instagram"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 footer-links">
            <h4>Link Cepat</h4>
            <ul>
              <div class="row">
                <div class="col-lg-4">
                  <li>
                    <i class="bx bx-chevron-right"></i>
                    <a href="#hero">Home</a>
                  </li>
                  <li>
                    <i class="bx bx-chevron-right"></i>
                    <a href="#about">Tentang Kami</a>
                  </li>
                </div>
                <div class="col-lg-4">
                  <li>
                    <i class="bx bx-chevron-right"></i> 
                    <a href="#portfolio">Galeri</a>
                  </li>
                  <li>
                    <i class="bx bx-chevron-right"></i>
                    <a href="#testimonials">PPDB</a>
                  </li>
                </div>
                <div class="col-lg-4">
                  <li>
                    <i class="bx bx-chevron-right"></i> 
                    <a href="#contact">Kontak</a>
                  </li>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>SD Negeri ABC</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('scaffold/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('scaffold/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('scaffold/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('scaffold/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('scaffold/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('scaffold/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('scaffold/assets/js/main.js') }}"></script>

</body>

</html>
