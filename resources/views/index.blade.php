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
            <h1>Selamat Datang di Sekolah Dasar ABC</h1>
            <h2>Pendidikan Berkualitas untuk Masa Depan Anak Anda</h2>
            <a href="#about" class="btn-get-started scrollto">Lihat Selengkapnya</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="{{ asset('storage/uploads/logo.png') }}" class="img-fluid" alt="">
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
            Sekolah Dasar ABC adalah lembaga pendidikan yang memberikan pendidikan berkualitas dengan pendekatan
            inovatif. Kami fokus pada pengembangan karakter siswa dan menjaga kerjasama erat dengan orang tua. Keamanan
            siswa menjadi prioritas utama kami. Bergabunglah dengan kami di Sekolah Dasar ABC untuk pengalaman belajar
            terbaik.
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
                Memberikan pendidikan berkualitas untuk mengembangkan potensi siswa secara holistik dan siap menghadapi
                masa depan.
              </p>
              <h3>Misi</h3>
              <p>
                Mengembangkan potensi siswa melalui pendekatan inovatif, membangun lingkungan belajar inklusif, menjalin
                kemitraan dengan orang tua, menjaga keamanan siswa, dan mendorong nilai-nilai etika dan integritas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
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
    </section>
    <!-- End Features Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2 class="text-dark">Galeri</h2>
          <p>
            Koleksi foto-foto dari kegiatan siswa, acara sekolah, proyek kreatif, serta momen berharga dalam lingkungan
            belajar.
          </p>
        </div>
        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-1.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-links">
                <p>Lihat</p>
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-1.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1">
                  <i class="bx bx-show"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-2.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-2.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-3.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-3.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-4.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-4.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-5.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-5.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-6.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-6.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-7.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-7.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-8.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-8.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-9.jpg" class="img-fluid"
                alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
              </div>
              <div class="portfolio-links">
                <a href="{{ asset('scaffold/assets/img/portfolio/portfolio-9.jpg') }}"
                  data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3">
                  <i class="bx bx-plus"></i>
                </a>
                <a href="portfolio-details.html" title="More Details">
                  <i class="bx bx-link"></i>
                </a>
              </div>
            </div>
          </div>
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
            <img src="{{ asset('scaffold/assets/img/portfolio/portfolio') }}-9.jpg" class="img-fluid w-100"
              alt="">
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
                <p>Jalan Raya II Adiwerna, Desa Kalimati, Kecamatan Adiwerna, Kabupaten Tegal</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email :</h4>
                <p>admin@sdnabc.com</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telp / WA :</h4>
                <p>+62123456789012</p>
              </div>
            </div>
          </div>
        </div>
        <div data-aos="fade-left">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
            frameborder="0" style="border:0; width: 100%; height: 320px;" allowfullscreen></iframe>
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
                <a href="#" class="facebook">
                  <i class="bx bxl-facebook"></i>
                </a>
                <a href="#" class="instagram">
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
                    <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                  </li>
                  <li>
                    <i class="bx bx-chevron-right"></i> <a href="#">Tentang Kami</a>
                  </li>
                </div>
                <div class="col-lg-4">
                  <li>
                    <i class="bx bx-chevron-right"></i> <a href="#">Galeri</a>
                  </li>
                  <li>
                    <i class="bx bx-chevron-right"></i> <a href="#">PPDB</a>
                  </li>
                </div>
                <div class="col-lg-4">
                  <li>
                    <i class="bx bx-chevron-right"></i> <a href="#">Kontak</a>
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
