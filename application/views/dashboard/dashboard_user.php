<?php 
$user = $this->db->query("SELECT COUNT(*) AS total FROM user WHERE level = '1'")->row();
$staff = $this->db->query("SELECT COUNT(*) AS total FROM user WHERE level = '2'")->row();
$koor = $this->db->query("SELECT COUNT(*) AS total FROM user WHERE level = '3'")->row();
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row ">
    <div class="col-lg-6 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h3 class="card-title text-primary mb-5">Selamat Datang <?= $this->session->userdata('nama');?>!</h3>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left mt-5">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="<?php echo base_url('assets/'); ?>assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-4 col-sm-12 mb-4">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card card-custom1">
            <div class="card-body">
              <div class="card-statistic-3">
                <div class="card-icon">
                  <i class='bx bx-user-circle text-white' style="font-size: 6rem;"></i>
                </div>
              </div>
              <div class="card-statistic-3 right-flex">
                <span class="fs-5 text-white mt-0">Total Admin</span>
                <h5 class="text-white fw-bold">200</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card card-custom2">
            <div class="card-body">
              <div class="card-statistic-3">
                <div class="card-icon">
                  <i class='bx bx-user-pin text-white' style="font-size: 6rem;"></i>
                </div>
              </div>
              <div class="card-statistic-3 right-flex">
                <span class="fs-5 text-white pt-0 mt-0">Total Pengguna</span>
                <h5 class="text-white fw-bold"><?= $user->total?></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card card-custom3">
            <div class="card-body">
              <div class="card-statistic-3">
                <div class="card-icon">
                  <i class='bx bxs-user-account text-white bx-flip-horizontal' style="font-size: 6rem;"></i>
                </div>
              </div>
              <div class="card-statistic-3 right-flex">
                <span class="fs-5 text-white mt-0">Total Staff</span>
                <h5 class="text-white fw-bold"><?= $staff->total?></h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card card-custom4">
            <div class="card-body">
              <div class="card-statistic-3">
                <div class="card-icon">
                  <i class='bx bxs-user-detail text-white' style="font-size: 6rem;"></i>
                </div>
              </div>
              <div class="card-statistic-3 right-flex">
                <span class="fs-5 text-white mt-0">Total Koordinator</span>
                <h5 class="text-white fw-bold"><?= $koor->total?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <div class="card-title">
            <h5 class="m-0 me-2">Histori Pengisian Formulir</h5>
            <div class="border-bottom text-secondary mt-2"></div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Formulir Permohonan] Sedang Diproses</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Formulir Permohonan] Berkas Anda ditolak.</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Formulir Permohonan] Berkas Anda ditolak.</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Formulir Permohonan] Berkas Anda ditolak.</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-6 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <div class="card-title">
            <h5 class="m-0 me-2 text">Informasi Singkat</h5>
            <div class="border-bottom text-secondary mt-2"></div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-center gap-2">
                <div class="me-1">
                  <h5 class="mb-0 text-primary">GeoJSON adalah ekstensi format data JSON dan menampilkan data geografis. Dengan utilitas ini, Anda dapat menyimpan fitur geografis dalam format GeoJSON dan merendernya sebagai lapisan di atas peta.</h5>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h5 class="mb-0 text-primary">SHP adalah format data vektor yang digunakan untuk menyimpan lokasi, bentuk, dan atribut dari fitur geografis. Format data SHP disimpan dalam satu set file terkait dan berisi dalam satu kelas fitur .</h5>
                </div>
              </div>
            </li>
            <a href="<?php echo base_url('Filter.html'); ?>" class="btn btn-secondary float-end mt-5">Tata Cara Mengisi Formulir</a>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->