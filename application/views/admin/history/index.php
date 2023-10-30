<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> History </h4>
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
                                        <th>Pemilik Formulir</th>
                                        <th>Type Aksi</th>
                                        <th>Keterangan</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($log as $d)
                                        {                                            
                                    ?>
                                    <?php 
                                        $kkpr = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$d->id_permohonan'")->row();
                                        $admin = $this->db->query("SELECT * FROM user WHERE id = '$d->id_user'")->row();
                                    ?>
                                    <tr>
                                        <td><?= $no++;?></td>
                                        <td><?= $kkpr->nama_pemohon?></td>
                                        <td><?= $admin->nama_lengkap?></td>
                                        <td><?= $d->keterangan?></td>
                                        <td><?= $d->waktu?></td>
                                        <td>
                                            <button class="btn btn-outline-danger btn-sm rounded-pill btn-icon warning-button" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class='bx bx-trash'></i></button>
                                            <button class="btn btn-info rounded-pill btn-sm btn-icon" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class='bx bx-pencil'></i></button>
                                            <!-- <button class="btn btn-dark btn-sm rounded-pill btn-icon" data-toggle="tooltip" data-placement="bottom" title="Pulihkan Data"><i class='bx bx-repeat'></i></button> -->
                                        </td>
                                    </tr>                                    
                                    <?php }?>
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