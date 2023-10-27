<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Kelola User </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Keterangan</th>
                                <th>Tanggal Registrasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Fawwaz</td>
                                <td>Tambah Keterangan dan tolak berkas di halaman admin permohonan</td>
                                <td>2023-10-04 12:25:57</td>
                                <td>
                                    <button class="btn btn-outline-danger rounded-pill btn-icon warning-button mb-2"><i class='bx bx-trash'></i></button>
                                    <button class="btn btn-info rounded-pill btn-icon mb-2"><i class='bx bx-info-circle' data-bs-toggle="modal" data-bs-target="#modalRekap"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->

<!-- Modal -->
<div class="modal fade" id="modalRekap" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title" id="modalRekapTitle">Rekap Formulir User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>