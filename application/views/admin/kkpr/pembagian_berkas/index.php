<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR /</span> Pembagian Berkas </h4>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- <table class="table table-bordered row-border order-column fs-6" style="width:100%" id="table"> -->
                    <table class="table table-bordered row-border order-column fs-6" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Lokasi Tanah</th>
                                <th>Tipe</th>
                                <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">Utara</td>
                            </tr>
                             <?php
                            $no = 1;
                            foreach ($data as $d) {
                                $kecamatan = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$d->kecamatan_tanah'")->row();
                                $kelurahan = $this->db->query("SELECT * FROM desa WHERE id_desa = '$d->kelurahan_tanah'")->row();                                

                                if ($d->id_petugas) { 
                                    if($kecamatan->geografis == 'Utara'){                                  
                            ?>
                                            <tr>
                                                <td>
                                                    <span><?= $no++ ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->nama_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->lokasi_tanah ?> RT.<?= $d->rt_tanah ?> RW.<?= $d->rw_tanah ?> Kel.<?= $kelurahan->nama_desa ?> - Kec.<?= $kecamatan->nama_kecamatan ?> - Kota / Kab. Malang</span>
                                                </td>
                                                <td>
                                                    <span><?= $d->kategori ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                            Pilih Petugas
                                                        </button>
                                                        <!--begin::Menu-->
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            $petugas = $this->db->query("SELECT * FROM user WHERE level = '2' OR level = '3' ")->result();
                                                            foreach ($petugas as $p) {
                                                            ?>
                                                                <li><a href="<?php echo base_url('Kkpr/proses_pembagian_berkas/' . $d->id_kkpr_permohonan . '/' . $p->id); ?>" class="dropdown-item"><?= $p->nama_lengkap ?></a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider" />
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                            </tr>
                            <?php }
                                    }
                                    }                                
                            ?>
                            <tr>
                                <td colspan="5">Timur</td>
                            </tr>
                             <?php
                            $no = 1;
                            foreach ($data as $d) {
                                $kecamatan = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$d->kecamatan_tanah'")->row();
                                $kelurahan = $this->db->query("SELECT * FROM desa WHERE id_desa = '$d->kelurahan_tanah'")->row();

                                if ($d->id_petugas) { // Memeriksa keberadaan data kelurahan_all
                                    if($kecamatan->geografis == 'Timur'){ 
                            ?>
                                            <tr>
                                                <td>
                                                    <span><?= $no++ ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->nama_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->lokasi_tanah ?> RT.<?= $d->rt_tanah ?> RW.<?= $d->rw_tanah ?> Kel.<?= $kelurahan->nama_desa ?> - Kec.<?= $kecamatan->nama_kecamatan ?> - Kota / Kab. Malang</span>
                                                </td>
                                                <td>
                                                    <span><?= $d->kategori ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                            Pilih Petugas
                                                        </button>
                                                        <!--begin::Menu-->
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            $petugas = $this->db->query("SELECT * FROM user WHERE level = '2' OR level = '3' ")->result();
                                                            foreach ($petugas as $p) {
                                                            ?>
                                                                <li><a href="<?php echo base_url('Kkpr/proses_pembagian_berkas/' . $d->id_kkpr_permohonan . '/' . $p->id); ?>" class="dropdown-item"><?= $p->nama_lengkap ?></a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider" />
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                            </tr>
                            <?php }
                                    }
                                }
                             ?>
                            <tr>
                                <td colspan="5">Selatan</td>
                            </tr>
                             <?php
                            $no = 1;
                            foreach ($data as $d) {
                                $kecamatan = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$d->kecamatan_tanah'")->row();
                                $kelurahan = $this->db->query("SELECT * FROM desa WHERE id_desa = '$d->kelurahan_tanah'")->row();                               

                                if ($d->id_petugas) { 
                                    if($kecamatan->geografis == 'Selatan'){ 
                            ?>
                                            <tr>
                                                <td>
                                                    <span><?= $no++ ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->nama_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->lokasi_tanah ?> RT.<?= $d->rt_tanah ?> RW.<?= $d->rw_tanah ?> Kel.<?= $kelurahan->nama_desa ?> - Kec.<?= $kecamatan->nama_kecamatan ?> - Kota / Kab. Malang</span>
                                                </td>
                                                <td>
                                                    <span><?= $d->kategori ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                            Pilih Petugas
                                                        </button>
                                                        <!--begin::Menu-->
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            $petugas = $this->db->query("SELECT * FROM user WHERE level = '2' OR level = '3' ")->result();
                                                            foreach ($petugas as $p) {
                                                            ?>
                                                                <li><a href="<?php echo base_url('Kkpr/proses_pembagian_berkas/' . $d->id_kkpr_permohonan . '/' . $p->id); ?>" class="dropdown-item"><?= $p->nama_lengkap ?></a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider" />
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                            </tr>
                            <?php }
                                    }
                                }
                             ?>
                            <tr>
                                <td colspan="5">Barat</td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($data as $d) {
                                $kecamatan = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$d->kecamatan_tanah'")->row();
                                $kelurahan = $this->db->query("SELECT * FROM desa WHERE id_desa = '$d->kelurahan_tanah'")->row();

                                if ($d->id_petugas) { // Memeriksa keberadaan data kelurahan_all
                                    if($kecamatan->geografis == 'Barat'){ 
                            ?>
                                            <tr>
                                                <td>
                                                    <span><?= $no++ ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->nama_pemohon ?></span>
                                                </td>
                                                <td>
                                                    <span><?= $d->lokasi_tanah ?> RT.<?= $d->rt_tanah ?> RW.<?= $d->rw_tanah ?> Kel.<?= $kelurahan->nama_desa ?> - Kec.<?= $kecamatan->nama_kecamatan ?> - Kota / Kab. Malang</span>
                                                </td>
                                                <td>
                                                    <span><?= $d->kategori ?></span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                            Pilih Petugas
                                                        </button>
                                                        <!--begin::Menu-->
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            $petugas = $this->db->query("SELECT * FROM user WHERE level = '2' OR level = '3' ")->result();
                                                            foreach ($petugas as $p) {
                                                            ?>
                                                                <li><a href="<?php echo base_url('Kkpr/proses_pembagian_berkas/' . $d->id_kkpr_permohonan . '/' . $p->id); ?>" class="dropdown-item"><?= $p->nama_lengkap ?></a></li>
                                                                <li>
                                                                    <hr class="dropdown-divider" />
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                            </tr>
                            <?php }
                                    }
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