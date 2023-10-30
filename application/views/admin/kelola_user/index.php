<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola User </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Laporan
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);">PDF</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0);">Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-nowrap">
                            <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Tanggal Registrasi</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $u) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $u->nama_lengkap ?></td>
                                            <td><?= $u->waktu ?></td>
                                            <td>
                                                <?php
                                                if ($u->level == 1) {
                                                    echo "Pemohon";
                                                } else if ($u->level == 2) {
                                                    echo "Staff";
                                                } else if ($u->level == 3) {
                                                    echo "Koordinator";
                                                } else if ($u->level == 4) {
                                                    echo "Kabid";
                                                } else if ($u->level == 5) {
                                                    echo "Kadis";
                                                } else {
                                                    echo "Developer";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-danger rounded-pill btn-icon warning-button mb-2" data-toggle="tooltip" data-placement="bottom" title="Hapus" onclick="get_id_delete(<?php echo $u->id ?>)"><i class='bx bx-trash' data-bs-toggle="modal" data-bs-target="#hapus"></i></button>
                                                <button class="btn btn-info rounded-pill btn-icon mb-2" data-toggle="tooltip" data-placement="bottom" title="Rekap" onclick="get_user(<?php echo $u->id ?>)"><i class='bx bx-info-circle' data-bs-toggle="modal" data-bs-target="#edit"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->

<!-- Modal -->
<div class="modal fade" id="insert" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="modalRekapTitle">Rekap Formulir User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_tambah" method="post" action="">
                    <div class="row mb-3">
                        <label class="col-form-label" for="nama">
                            Nama
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="nama" name="nama"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label" for="username">
                            Username
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="username" name="username"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label" for="password">
                            Password
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="button" class="btn btn-primary" id="btn-tambah">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="modalRekapTitle">Rekap Formulir User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" method="post" action="">
                    <div class="row mb-3">
                        <label class="col-form-label" for="nama">
                            Nama
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="nama" name="nama"/>
                            <input type="hidden" class="form-control" id="id" name="id"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label" for="username">
                            Username
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="username" name="username"/>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-form-label" for="password">
                            Password
                        </label>
                        <div class="">
                            <input type="text" class="form-control" id="password" name="password"/>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="button" class="btn btn-primary" id="btn-edit">Simpan Perubahan</button>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="modal fade" id="hapus" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="modalRekapTitle">Notif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_delete" method="post" action="">
                    Apakah Anda yakin ingin menghapus data ini?
                    <input type="hidden" class="form-control" id="id" name="id"/>                    
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
                <button type="button" class="btn btn-primary" id="btn-delete">Hapus</button>
            </div>
        </form>
        </div>
    </div>
</div>