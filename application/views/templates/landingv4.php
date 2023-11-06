<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Pora</title>
    <link href="<?php echo base_url('assets/landingv4/');?>images/Logosaja_E-Pora.png" rel="icon">

    <!-- CSS FILES -->
    <link href="<?php echo base_url('assets/landingv4/');?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/landingv4/');?>css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/landingv4/');?>css/swiper.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/landingv4/');?>css/style.css" rel="stylesheet">
</head>

<body id="section_1">

    <nav class="navbar navbar-expand-lg bg-light shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url('Landing/landingv4');?>">
                <h4 class="mt-2 ">E-Pora</h4>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#Beranda">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#Informasi">Informasi</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#Lacak">Lacak Berkas</a>
                    </li>

                    <li class="nav-item ms-3">
                        <a class="nav-link custom-btn custom-border-btn btn" href="<?php echo base_url('Auth');?>">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero-section hero-section-full-height" id="Beranda">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel"
                            data-bs-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo base_url('assets/landingv4/');?>images/DPKPCK4.jpg" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end">
                                        <h1>E-Pora</h1>

                                        <p>Elektronik Portal Ruang</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo base_url('assets/landingv4/');?>images/DPKPCK2.jpg" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end mt-0 pt-0">
                                        <h1>E-Pora</h1>

                                        <p>Elektronik Portal Ruang</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="<?php echo base_url('assets/landingv4/');?>images/DPKPCK3.jpg" class="carousel-image img-fluid" alt="...">

                                    <div class="carousel-caption d-flex flex-column justify-content-end ">
                                        <h1>E-Pora</h1>

                                        <p>Elektronik Portal Ruang</p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="Informasi">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalPersiapan">
                            <div class="card card-custom1 mb-3">
                                <div class="card-body">
                                    <div class="card-statistic-3">
                                        <div class="card-icon">
                                            <i class="bi bi-file-earmark-text" style="font-size: 6rem;"></i>
                                        </div>
                                      </div>
                                      <div class="card-statistic-3 right-flex">
                                        <span class="fs-5 text-white mt-0">PERSIAPAN</span>
                                        <h5 class="text-white fw-bold fs-5">MENGISI FORMULIR</h5>
                                      </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('Auth');?>">
                            <div class="card card-custom1 mb-3">
                                <div class="card-body">
                                    <div class="card-statistic-3">
                                        <div class="card-icon">
                                            <i class="bi bi-house-door" style="font-size: 6rem;"></i>
                                        </div>
                                      </div>
                                      <div class="card-statistic-3 right-flex">
                                        <span class="fs-5 text-white mt-0">ISI FORMULIR</span>
                                        <h5 class="text-white fw-bold">KKPR</h5>
                                      </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('Auth');?>">
                            <div class="card card-custom1 mb-3">
                                <div class="card-body">
                                    <div class="card-statistic-3">
                                        <div class="card-icon">
                                            <i class="bi bi-house" style="font-size: 6rem;"></i>
                                        </div>
                                      </div>
                                      <div class="card-statistic-3 right-flex">
                                        <span class="fs-5 text-white mt-0">ISI FORMULIR</span>
                                        <h5 class="text-white fw-bold">ITR</h5>
                                      </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="informasi">
            <div class="container-xxl informasi pb-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                      <div class="section-header">
                        <h2 class="mb-4">Informasi</h2>
                        <p>
                            Mengenal lebih dekat tentang
                            Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) dan Informasi Tata Ruang (ITR) 
                        </p>
                      </div>
                    </div>
                    <div class="row g-4 wow fadeInUp  mb-5" data-wow-delay="0.3s">
                        <div class="col-lg-4">
                            <div class="nav nav-pills d-flex justify-content-between w-100 me-4">
                                <button class="nav-link w-100 d-flex align-items-center text-start border rounded-5 p-3 mb-3 active"
                                    data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                                    <h5 class="m-0 informasi-h5"><i class="bi bi-list text-secondary me-3"></i>KKPR</h5>
                                </button>
                                <button class="nav-link w-100 d-flex align-items-center text-start border rounded-5 p-3 mb-3"
                                    data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                                    <h5 class="m-0 informasi-h5"><i class="bi bi-list text-secondary me-3"></i>ITR</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content w-100">
                                <div class="tab-pane fade show active" id="tab-pane-1">
                                    <div class="row g-4">
                                        <div class="col-md-6" style="min-height: 300px;">
                                            <div class="position-relative h-100">
                                                <img class="position-absolute rounded w-100 h-100" src="<?php echo base_url('assets/landingv4/');?>images/ASSET-KKPR.png"
                                                style="object-fit: contain;" alt="kkpr" draggable="false">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="mb-3">Kesesuaian Kegiatan Pemanfaatan Ruang</h4>
                                            <p class="mb-3 informasi-p">( KKPR ) adalah istilah yang berkaitan dengan perencanaan tata ruang dan tata kota, terutama dalam konteks perizinan dan penggunaan lahan. Hal ini mengacu pada proses penilaian dan pengaturan penggunaan lahan serta aktivitas yang sesuai dengan rencana tata ruang dan peraturan yang ada di suatu wilayah.</p>
                                            <a href="<?php echo base_url('Auth');?>" class="btn informasi-p" style="color: #ffffff; background-color: #171870;">Isi Formulir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-pane-2">
                                    <div class="row g-4">
                                        <div class="col-md-6" style="min-height: 300px;">
                                            <div class="position-relative h-100">
                                                <img class="position-absolute rounded w-100 h-100" src="<?php echo base_url('assets/landingv4/');?>images/ASSET-RUMAH.png"
                                                style="object-fit: contain;" alt="itr" draggable="false">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="mb-3">Informasi Tata Ruang</h4>
                                            <p class="mb-3 informasi-p">
                                                ( ITR ) adalah kumpulan data dan informasi yang digunakan dalam perencanaan dan pengelolaan tata ruang suatu wilayah. ITR berfungsi sebagai dasar informasi untuk mengambil keputusan terkait penggunaan lahan, perencanaan pembangunan, pelestarian lingkungan, dan manajemen sumber daya alam.
                                                </p>
                                            <a href="<?php echo base_url('Auth');?>" class="btn btn-secondary informasi-p">Isi Formulir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section section-padding section-bg" id="Lacak">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-12 ms-auto">
                        <h2 class="mb-0">Lacak Berkas Anda</h2>
                    </div>

                    <div class="col-lg-5 col-12">
                        <form class="custom-form search-form border-1" action="#" method="post" role="form"
                            style="border-color: black; border-radius: 1rem;">
                            <input class="form-control" type="search" placeholder="Lacak berkas..." aria-label="Lacak Berkas" id="lacak_berkas">

                            <button type="submit" class="form-control pt-3">
                                <i class="bi-search"></i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <section class="clients">
            <div class="container">
              <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                  <div class="swiper-slide"><img src="<?php echo base_url('assets/landingv4/');?>images/Logo Malang Makmur/kabupaten malang vector logo.png" class="img-fluid" alt="kabupatenmalang"></div>
                  <div class="swiper-slide"><img src="<?php echo base_url('assets/landingv4/');?>images/Logo Malang Makmur/Logo Malang Makmur.png" class="img-fluid" alt="malangmakmur"></div>
                  <div class="swiper-slide"><img src="<?php echo base_url('assets/landingv4/');?>images/Logo Malang Makmur/Logo_BerAKHLAK.png" class="img-fluid" alt="berakhlak"></div>
                  <div class="swiper-slide"><img src="<?php echo base_url('assets/landingv4/');?>images/Logo Malang Makmur/Logo_EVP.png" class="img-fluid" alt="evp"></div>
                </div>
              </div>
            </div>
          </section>

    </main>
    
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-4">
                    <img src="<?php echo base_url('assets/landingv4/');?>images/Logo_Putih_E-Pora Fix.png" class="logo img-fluid" alt="">
                </div>

                <div class="col-lg-9 col-md-6 col-12 mx-auto">
                    <h5 class="site-footer-title text-white mb-3">Kontak</h5>
                    <p class="text-white d-flex mb-2">
                        <i class="bi-geo-alt me-2"></i>
                       <a href="https://maps.app.goo.gl/22C17NRGXt61L2rPA" class="text-white">
                        Jl. Trunojoyo No.6, Penarukan, Kec. Kepanjen, Kabupaten Malang, Jawa Timur 65163
                       </a>
                    </p>
                    <p class="text-white d-flex mb-2">
                        <i class="bi-telephone me-2"></i>
                        <a href="tel:+6289622334456" class="site-footer-link">
                            +62 896 2233 4456
                        </a>
                    </p>
                    <p class="text-white d-flex mb-2">
                        <i class="bi-envelope me-2"></i>
                        <a href="mailto:perumahan-ciptakarya@malangkab.go.id" class="site-footer-link">
                            perumahan-ciptakarya@malangkab.go.id
                        </a>
                    </p>

                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-7 col-12 my-2">
                        <p class="copyright-text mb-0">
                            &copy; Copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            <a href="" #hero> <span class="text-primary fw-bold">E-Pora</span> </a>. All Rights Reserved.</a>
                        </p>
                    </div>

                    <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto my-2">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="https://twitter.com/dpkpck" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://web.facebook.com/dpkpck.kabupatenmalang.1?_rdc=1&_rdr" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.instagram.com/dpkpck/" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="https://www.youtube.com/channel/UCPWpFoCwweff9Hv3sEDr2cA" class="social-icon-link bi-youtube"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Persiapan Pengisian Form -->
    <div class="modal fade" id="modalPersiapan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalPersiapantitle">PERSIAPAN PENGISIAN FORMULIR</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row mb-2">
                <div class="col">
                    <h5>Lampiran KKPR</h5>
                    <ul class="list-group">
                        <li class="list-group-item">1. Dokumen yang diunduh pada Oss</li>
                        <li class="list-group-item">2. Foto KTP Pemohon</li>
                        <li class="list-group-item">3. Foto akta pendirian perusahaan yang di legalisir (jika mengurus atas nama perusahaan)</li>
                        <li class="list-group-item">4. SIUP</li>
                        <li class="list-group-item">5. TDP/NIB</li>
                        <li class="list-group-item">6. Foto Surat Tanah</li>
                        <li class="list-group-item">7. Gambar Peta Bidang dengan tipe file .jpg</li>
                        <li class="list-group-item">8. Shape File dengan tipe file .zip</li>
                        <li class="list-group-item">9. Pertimbangan Teknis pertanahan dari BPN</li>
                        <li class="list-group-item">10. Foto/Fotocopy NPWP (jika berbadan hukum)</li>
                    </ul>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pemilik Lahan telah Meninggal</h6>
                            <p>1. Surat Kematian</p>
                            <p>2. Surat Kuasa dari semua ahli waris (jika ahli waris lebih dari 1)</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pengurusan Tower</h6>
                            <p>1. Surat Rekomendasi dari Dinas Komunikasi dan Informatika</p>
                            <p>2. Surat Rekomendasi dari Komando Operasi TNI Angkatan Udara II Pangkalan TNI AU Abdulrachman
                              Saleh (untuk lokasi pengajuan di Kec. Pakis, Kec. Jabung, dan Kec. Singosari)</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pengurusan Minimarket/Toko Modern</h6>
                            <p>1. Surat rekomendasi dinas perdagangan dan perindustrian</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pegurusan Peternakan</h6>
                            <p>1. Surat rekomendasi dinas peternakan dan kesehatan hewan</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pengurusan SPBU/SPBU MINI/Sejenisnya</h6>
                            <p>1. Surat Rekomendasi dari PT. Pertamina (Persero) Marketing Operation Region (MOR) V</p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h6>Persyaratan Tambahan Jika Pengurusan Tempat Ibadah</h6>
                            <p>1. Daftar nama dan fotokopi Kartu Tanda Penduduk (KTP) (paling sedikit 90 orang dan daftar
                                dukungan masyarakat sekitar paling sedikit 60 orang.)</p>
                            <p>2. Surat dari Forum Komunikasi Umat Beragama (FKUB)</p>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Tutup
              </button>
            </div>
          </div>
        </div>
    </div>
    <!-- End Modal -->
    <!-- Modal Daftar -->
    <div class="modal fade" id="modalDaftar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column">
                    <img src="<?php echo base_url('assets/landingv4/');?>images/Logo Malang Makmur/kabupaten malang vector logo.png" class="logo mx-auto mt-2">
                    <h5 class="modal-title text-center mt-2 fw-bold" id="modalDaftartitle">DPKPCK</h5>
                </div>
              <div class="row mb-2">
                <div class="col-md-12">
                    <div class="alert alert-primary mt-2" role="alert">
                        <div class="my-auto py-auto">
                            <div class="d-flex">

                                <i class="bi bi-info-circle-fill me-2"></i>
                                <p>Untuk mengisi formulir KKPR atau ITR, silakan daftar terlebih dahulu.</p>
                            </div>
                            <a href="<?php echo base_url('Auth/register');?>" class="btn btn-light float-end " style="background-color: #171870;color: white;">DAFTAR</a>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 ">
                    <div class="card">
                        <div class="card-header">
                            Tahapan Daftar
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">1. Tekan tombol daftar yang tersedia di halaman</li>
                                <li class="list-group-item">2. Lengkapi informasi pribadi yang ada di halaman pendaftaran</li>
                                <li class="list-group-item">3. Isi kata sandi sesuai keinginan Anda. Pastikan Anda mengingat kata sandi Anda</li>
                                <li class="list-group-item">4. Tekan Captcha untuk memvalidasi bahwa Anda bukan robot</li>
                                <li class="list-group-item">5. Tekan tombol daftar yang tersedia di halaman</li>
                                <li class="list-group-item">6. Tunggu selama 3 menit untuk pemrosesan pembuatan akun</li>
                                <li class="list-group-item">7. Akun Anda siap digunakan.</li>
                            </ul>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                Tutup
              </button>
            </div>
          </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- JAVASCRIPT FILES -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script src="<?php echo base_url('assets/landingv4/');?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/jquery.sticky.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/click-scroll.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/counter.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/swiper.js"></script>
    <script src="<?php echo base_url('assets/landingv4/');?>js/custom.js"></script>

    <script>
        $(document).ready(function () {
          $('#modalDaftar').modal('show');
        });
    </script>

</body>

</html>