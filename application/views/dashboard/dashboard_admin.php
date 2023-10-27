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
              <h3 class="card-title text-primary">Selamat Datang <?= $this->session->userdata('nama');?>!</h3>
              <p class="mb-5">
                Kamu telah menyelesaikan <span class="fw-bold">20</span> berkas hari ini.
              </p>
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
                <h5 class="text-white fw-bold"><?= $user->total ?></h5>
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
                <h5 class="text-white fw-bold"><?= $staff->total ?></h5>
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
                <h5 class="text-white fw-bold"><?= $koor->total ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-lg-4 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-start">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Hasil Kinerja Anda</h5>
            <p class="text-small">Pencapaian Penyelesaian Berkas per Bulan</p>
          </div>
        </div>
        <div class="card-body px-0">
          <div class="tab-content p-0">
            <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
              <div id="incomeChart"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-center pb-0">
          <div class="card-title mb-0">
            <h5 class="m-0 me-2">Statistik Pengerjaan Berkas</h5>
          </div>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-center align-items-center my-3">
            <div id="orderStatisticsChart"></div>
          </div>
          <ul class="p-0 m-0">
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-check"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-0">Berkas Selesai</h6>
                </div>
                <div class="user-progress">
                  <small class="fw-semibold">30 Berkas</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-file"></i></span>
              </div>
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-2">
                  <h6 class="mb-0">Berkas Dikerjakan</h6>
                </div>
                <div class="user-progress">
                  <small class="fw-semibold">30 Berkas</small>
                </div>
              </div>
            </li>
          </ul>
          <div class="border-bottom text-secondary"></div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card h-100">
        <div class="card-header">
          <div class="card-title">
            <h5 class="m-0 me-2">Aktivitas Log</h5>
            <div class="border-bottom text-secondary mt-2"></div>
          </div>
        </div>
        <div class="card-body">
          <ul class="p-0 m-0">
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Admin] Login Berhasil</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Fawwaz] Login Berhasil</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Fawwaz] Login Berhasil</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Fawwaz] Login Berhasil</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
            <li class="d-flex mb-4 pb-1">
              <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                <div class="me-1">
                  <h6 class="mb-0">[Gilang] Login Berhasil</h6>
                  <small class="fw-semibold">22 jam yang lalu</small>
                </div>
              </div>
            </li>
          </ul>
          <a href="<?php echo base_url('assets/'); ?>views/log/index.html" class="btn btn-secondary float-end">Lihat Aktivitas Log lebih lengkap</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->