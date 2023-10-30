<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?php echo base_url('assets/');?>assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>DPKCPK - Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/');?>assets/img/Logosaja_E-Pora.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- data tables -->
    
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>libs/datatables/datatables.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>libs/datatables/datatablesbootstrap5.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>libs/datatables/fixedColumns.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?php echo base_url('assets/');?>assets/vendor/libs/apex-charts/apex-charts.css" />
    
    <!-- Helpers -->
    <script src="<?php echo base_url('assets/');?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo base_url('assets/');?>assets/js/config.js"></script>

    <!-- Page CSS -->
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="<?= base_url('assets/map/') ?>gh-pages.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> -->
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo ms-5 me-5">
                <img
                  src="<?php echo base_url('assets/');?>assets/img/Logo_E-Pora.png" width="100x"
                >
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <?php if ($this->session->userdata('level') == 6) { ?>
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?php echo base_url('Dashboard/admin');?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>
  
              <!-- Formulir -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Formulir</span>
              </li>
  
              <li class="menu-item">
                  <a href="<?= base_url('Persiapan.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Formulir">Formulir</div>
                  </a>
              </li>
  
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-file"></i>
                  <div data-i18n="Formulir ITR">Formulir ITR</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/itr/permohonan/itr_tambah.html" class="menu-link">
                      <div data-i18n="ITR Permohonan">ITR Permohonan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/itr/kuasa_pengurusan/itr_tambah.html" class="menu-link">
                      <div data-i18n="ITR Penguasa Kepengurusan">ITR Penguasa Kepengurusan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/itr/kuasa_penerbitan/itr_tambah.html" class="menu-link">
                      <div data-i18n="ITR Penguasa Penerbitan">ITR Penguasa Penerbitan</div>
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-file"></i>
                  <div data-i18n="Formulir KKPR">Formulir KKPR</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/diwakilkan/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="Formulir Surat Kuasa">Formulir Surat Kuasa</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/tidak_diwakilkan/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR">KKPR</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/pemilik_lahan_meninggal/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Pemilik Lahan Meninggal">KKPR Pemilik Lahan Meninggal</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/perumahan/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Perumahan">KKPR Perumahan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/tower_menara/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Tower Provider / Menara Telekomunikasi">KKPR Tower Provider / Menara Telekomunikasi</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/minimarket/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Minimarket / Toko Modern">KKPR Minimarket / Toko Modern</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/peternakan/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Peternakan">KKPR Peternakan</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/spbu/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR SPBU / SPBU Mini / SPBE (Pertamina)">KKPR SPBU / SPBU Mini / SPBE (Pertamina)</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="<?php echo base_url('assets/');?>views/kkpr/tempat_ibadah/kkpr_tambah.html" class="menu-link">
                      <div data-i18n="KKPR Tempat Ibadah">KKPR Tempat Ibadah</div>
                    </a>
                  </li>
                </ul>
              </li>
  
              <!-- Map -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Map</span>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                    <div data-i18n="SHP Map">SHP Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map/polygon') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map">Polygon Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('polygon/create_new.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map New">Polygon Map New</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Geojson') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-repeat"></i>
                    <div data-i18n="Converter GeoJson">Converter GeoJson</div>
                  </a>
              </li>
              
              <!-- Admin -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="ITR">ITR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Itr/admin_itr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Itr/admin_itr_kuasa') ?>" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="KKPR">KKPR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/pembagian_berkas') ?>" class="menu-link">
                        <div data-i18n="Pembagian Berkas">Pembagian Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/config') ?>" class="menu-link">
                        <div data-i18n="Config / Berkas Diterima">Config / Berkas Diterima</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/monitoring_berkas') ?>" class="menu-link">
                        <div data-i18n="Monitoring Berkas">Monitoring Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/rekap') ?>" class="menu-link">
                        <div data-i18n="Rekap Berkas">Rekap Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/daftar_pengembalian') ?>" class="menu-link">
                        <div data-i18n="Daftar Permohonan diTolak">Daftar Permohonan diTolak</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/getAllKkpr') ?>" class="menu-link">
                        <div data-i18n="Laporan Tahunan">Laporan Tahunan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Log') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-in"></i>
                    <div data-i18n="Log">Log</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Kkpr/pengembalian_formulir') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-time"></i>
                    <div data-i18n="History">History</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('User/kelola_user');?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Kelola User">Kelola User</div>
                  </a>
              </li>
  
              <!-- User -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>
              <li class="menu-item">
                  <a href="<?= base_url('Dashboard/user') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Dashboard User">Dashboard User</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('assets/');?>views/admin/kkpr/daftar_pengembalian_formulir/index.html" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Pengembalian Formulir">Pengembalian Formulir</div>
                  </a>
              </li>
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 5) { ?>
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?php echo base_url('Dashboard/admin');?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>        
  
              <!-- Map -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Map</span>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                    <div data-i18n="SHP Map">SHP Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map/polygon') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map">Polygon Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('polygon/create_new.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map New">Polygon Map New</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Geojson') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-repeat"></i>
                    <div data-i18n="Converter GeoJson">Converter GeoJson</div>
                  </a>
              </li>
              
              <!-- Admin -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>              
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="KKPR">KKPR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/pembagian_berkas') ?>" class="menu-link">
                        <div data-i18n="Pembagian Berkas">Pembagian Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/config') ?>" class="menu-link">
                        <div data-i18n="Config / Berkas Diterima">Config / Berkas Diterima</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/monitoring_berkas') ?>" class="menu-link">
                        <div data-i18n="Monitoring Berkas">Monitoring Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/rekap') ?>" class="menu-link">
                        <div data-i18n="Rekap Berkas">Rekap Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/daftar_pengembalian') ?>" class="menu-link">
                        <div data-i18n="Daftar Permohonan diTolak">Daftar Permohonan diTolak</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/getAllKkpr') ?>" class="menu-link">
                        <div data-i18n="Laporan Tahunan">Laporan Tahunan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Log') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-in"></i>
                    <div data-i18n="Log">Log</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Kkpr/pengembalian_formulir') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-time"></i>
                    <div data-i18n="History">History</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('User/kelola_user');?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Kelola User">Kelola User</div>
                  </a>
              </li>               
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 4) { ?>
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?php echo base_url('Dashboard/admin');?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>        
  
              <!-- Map -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Map</span>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                    <div data-i18n="SHP Map">SHP Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map/polygon') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map">Polygon Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('polygon/create_new.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map New">Polygon Map New</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Geojson') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-repeat"></i>
                    <div data-i18n="Converter GeoJson">Converter GeoJson</div>
                  </a>
              </li>
              
              <!-- Admin -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>              
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="KKPR">KKPR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/pembagian_berkas') ?>" class="menu-link">
                        <div data-i18n="Pembagian Berkas">Pembagian Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/config') ?>" class="menu-link">
                        <div data-i18n="Config / Berkas Diterima">Config / Berkas Diterima</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/monitoring_berkas') ?>" class="menu-link">
                        <div data-i18n="Monitoring Berkas">Monitoring Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/rekap') ?>" class="menu-link">
                        <div data-i18n="Rekap Berkas">Rekap Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/daftar_pengembalian') ?>" class="menu-link">
                        <div data-i18n="Daftar Permohonan diTolak">Daftar Permohonan diTolak</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/getAllKkpr') ?>" class="menu-link">
                        <div data-i18n="Laporan Tahunan">Laporan Tahunan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Log') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-in"></i>
                    <div data-i18n="Log">Log</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Kkpr/pengembalian_formulir') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-time"></i>
                    <div data-i18n="History">History</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('User/kelola_user');?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Kelola User">Kelola User</div>
                  </a>
              </li>               
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 3) { ?>
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?php echo base_url('Dashboard/admin');?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>        
  
              <!-- Map -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Map</span>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                    <div data-i18n="SHP Map">SHP Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map/polygon') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map">Polygon Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('polygon/create_new.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map New">Polygon Map New</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Geojson') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-repeat"></i>
                    <div data-i18n="Converter GeoJson">Converter GeoJson</div>
                  </a>
              </li>
              
              <!-- Admin -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>              
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="KKPR">KKPR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>                    
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/config') ?>" class="menu-link">
                        <div data-i18n="Config / Berkas Diterima">Config / Berkas Diterima</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/monitoring_berkas') ?>" class="menu-link">
                        <div data-i18n="Monitoring Berkas">Monitoring Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/rekap') ?>" class="menu-link">
                        <div data-i18n="Rekap Berkas">Rekap Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/daftar_pengembalian') ?>" class="menu-link">
                        <div data-i18n="Daftar Permohonan diTolak">Daftar Permohonan diTolak</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/getAllKkpr') ?>" class="menu-link">
                        <div data-i18n="Laporan Tahunan">Laporan Tahunan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Log') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-in"></i>
                    <div data-i18n="Log">Log</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Kkpr/pengembalian_formulir') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-time"></i>
                    <div data-i18n="History">History</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('User/kelola_user');?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Kelola User">Kelola User</div>
                  </a>
              </li>               
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 2) { ?>
            <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?php echo base_url('Dashboard/admin');?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>        
  
              <!-- Map -->
              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Map</span>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-map-alt"></i>
                    <div data-i18n="SHP Map">SHP Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Map/polygon') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map">Polygon Map</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('polygon/create_new.html') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-trip"></i>
                    <div data-i18n="Polygon Map New">Polygon Map New</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Geojson') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-repeat"></i>
                    <div data-i18n="Converter GeoJson">Converter GeoJson</div>
                  </a>
              </li>
              
              <!-- Admin -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Admin</span></li>              
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="KKPR">KKPR</div>
                  </a>
                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr') ?>" class="menu-link">
                        <div data-i18n="Admin Permohonan">Admin Permohonan</div>
                      </a>
                    </li>                    
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/config') ?>" class="menu-link">
                        <div data-i18n="Config / Berkas Diterima">Config / Berkas Diterima</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/monitoring_berkas') ?>" class="menu-link">
                        <div data-i18n="Monitoring Berkas">Monitoring Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/rekap') ?>" class="menu-link">
                        <div data-i18n="Rekap Berkas">Rekap Berkas</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/daftar_pengembalian') ?>" class="menu-link">
                        <div data-i18n="Daftar Permohonan diTolak">Daftar Permohonan diTolak</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/getAllKkpr') ?>" class="menu-link">
                        <div data-i18n="Laporan Tahunan">Laporan Tahunan</div>
                      </a>
                    </li>
                    <li class="menu-item">
                      <a href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>"" class="menu-link">
                        <div data-i18n="Admin Kuasa">Admin Kuasa</div>
                      </a>
                    </li>
                  </ul>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Log') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-in"></i>
                    <div data-i18n="Log">Log</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?= base_url('Kkpr/pengembalian_formulir') ?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-time"></i>
                    <div data-i18n="History">History</div>
                  </a>
              </li>
              <li class="menu-item">
                  <a href="<?php echo base_url('User/kelola_user');?>" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div data-i18n="Kelola User">Kelola User</div>
                  </a>
              </li>               
            </ul>
          <?php } ?>
          <?php if ($this->session->userdata('level') == 1) { ?>
            <ul class="menu-inner py-1">   
              <!-- Dashboard -->
              <li class="menu-item active">
                <a href="<?= base_url('Dashboard/user') ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Dashboard">Dashboard</div>
                </a>
              </li>         
              <!-- User -->
              <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>              
              <li class="menu-item">
                  <a href="<?php echo base_url('assets/');?>views/admin/kkpr/daftar_pengembalian_formulir/index.html" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Pengembalian Formulir">Pengembalian Formulir</div>
                  </a>
              </li>
            </ul>
          <?php } ?>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-bell bx-sm"></i>
                    <span class="badge rounded-pill badge-notifications bg-label-primary">0</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                      <div class="dropdown-header d-flex align-items-center py-3">
                        <h5 class="text-body mb-0 me-auto">Notification</h5>
                        <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                      <img src="<?php echo base_url('assets/');?>assets/img/iconaccount.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="<?php echo base_url('assets/');?>assets/img/iconaccount.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <?php 
                          $role = array(
                            1 => 'Pemohon',
                            2 => 'Staff',
                            3 => 'Koordinator',
                            4 => 'Kepala Bidang',
                            5 => 'Kepala Dinas',
                            6 => 'Developer'
                        );
                          ?>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= $this->session->userdata('nama') ?></span>
                            <small class="text-muted"><?= $role[$this->session->userdata('level')] ?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                        <i class="bx bx-power-off me-2 text-danger"></i>
                        <span class="align-middle text-danger">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->
          <!-- Content wrapper -->
          <div class="content-wrapper">