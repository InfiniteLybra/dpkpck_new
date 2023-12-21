<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Log </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tipe</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Keterangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $reversedLog = array_reverse($log); // Balik urutan array $log
                            foreach ($reversedLog as $l) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->type ?></td>
                                    <td>
                                        <?php
                                        foreach ($user as $u) {
                                            if ($l->id_user == $u->id) {
                                                echo $u->username;
                                                break; // Keluar dari loop setelah menemukan id_user yang sesuai
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Admin</span></td>
                                    <td><?= $l->keterangan ?></td>
                                    <td><?= $l->waktu ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->