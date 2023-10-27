<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR /</span> Pembagian Berkas </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tipe</th>
                                <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                            ?>
                                <?php
                                $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$d->kelurahan_pemohon' ")->row();
                                $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$d->kecamatan_pemohon' ")->row();
                                $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$d->kota_pemohon' ")->row();
                                $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$d->provinsi_pemohon' ")->row();

                                if ($d->id_petugas) {
                                } else {
                                ?>
                                    <tr>
                                        <td>
                                            <span><?= $no++ ?></span>
                                        </td>
                                        <td>
                                            <span><?= $d->nama_pemohon ?></span>
                                        </td>
                                        <td>
                                            <span><?= $d->alamat_pemohon ?> RT.<?= $d->rt_pemohon ?> RW.<?= $d->rw_pemohon ?> Kel.<?= $kelurahan->subdis_name ?> - Kec.<?= $kecamatan->dis_name ?> - Kota / Kab.<?= $kota->city_name ?> - Prov.<?= $provinsi->prov_name ?></span>
                                        </td>
                                        <td>
                                            <span><?php if ($d) echo $d->kategori ?></span>
                                        </td>                                   
                                        <td class="text-center">                                           
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                    Pilih Petugas
                                                </button>
                                            <!--begin::Menu-->
                                                <?php
                                                $petugas = $this->db->query("SELECT * FROM user WHERE level = '2' OR level = '3' ")->result();
                                                foreach ($petugas as $p) {
                                                ?>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="<?php echo base_url('Kkpr/proses_pembagian_berkas/' . $d->id_kkpr_permohonan . '/' . $p->id); ?>" class="dropdown-item"><?= $p->nama_lengkap ?></a></li>
                                                            <li>
                                                                <hr class="dropdown-divider" />                                                            
                                                        </ul>
                                                <?php } ?>
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- / Content -->