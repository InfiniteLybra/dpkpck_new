 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">

     <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / KKPR / </span> Laporan Tahunan </h4>
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
                                     <li><a class="dropdown-item" href="<?php echo base_url('Kkpr/export_laporan_berkas_all'); ?>">Excel</a></li>
                                 </ul>
                             </div>
                         </div>
                        </div>
                        <form method="get" action="<?php echo base_url('Kkpr/filterDataByYear'); ?>">
                            <div class="col-md-9">
                                <select class="btn btn-light" name="tahun" id="tahun">
                                    <option value="" hidden disabled selected>Pilih Tahun</option> <!-- Placeholder -->
                                    <option value="all">Semua Data</option>
                                    <?php
                                       $tahunSaatIni = date('Y');
                                       for ($i = 2020; $i < $tahunSaatIni + 5; $i++) {
                                       ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php } ?>
                                    <!-- Opsi untuk kembali ke default -->
                                </select>
                            </div>
                        </form>
                     <script>
                         document.addEventListener('DOMContentLoaded', function() {
                             // Memeriksa apakah ada nilai yang dipilih yang tersimpan di sessionStorage
                             var selectedYear = sessionStorage.getItem('selectedYear');

                             // Menangani perubahan nilai pada elemen <select>
                             var tahunSelect = document.getElementById('tahun');
                             tahunSelect.addEventListener('change', function() {
                                 // Menyimpan nilai yang dipilih ke dalam sessionStorage
                                 if (this.value === 'all') {
                                     window.location.href = "<?php echo base_url('Kkpr/getAllKkpr'); ?>";
                                 } else {
                                     sessionStorage.setItem('selectedYear', this.value);
                                     window.location.href = "<?php echo base_url('Kkpr/filterDataByYear'); ?>?tahun=" + this.value;
                                 }
                             });

                             // Set placeholder jika tidak ada tahun yang dipilih sebelumnya
                             if (!selectedYear) {
                                 tahunSelect.value = '';
                             }
                         });
                     </script>
                     <div class="row">
                         <div class="text-nowrap">
                             <table class="table table-bordered row-border order-column  fs-6" id="table">
                                 <thead>
                                     <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                         <th>No</th>
                                         <th>Tgl Veriv Berkas</th>
                                         <th>Tgl Survei</th>
                                         <th>No. Reg Terbit</th>
                                         <th>Tanggal Reg</th>
                                         <th>Surveyor 1</th>
                                         <th>Surveyor 2</th>
                                         <th>Type</th>
                                         <th>Nama Pemohon</th>
                                         <th>Alamat Pemohon</th>
                                         <th>Rt Pemohon</th>
                                         <th>Rw Pemohon</th>
                                         <th>Provinsi Pemohon</th>
                                         <th>Kota Pemohon</th>
                                         <th>Kecamatan Pemohon</th>
                                         <th>Kelurahan Pemohon</th>
                                         <th>Telp Pemohon</th>
                                         <th>Nama Perusahaan</th>
                                         <th>NIB</th>
                                         <th>Skala Usaha</th>
                                         <th>Klasifikasi Resiko</th>
                                         <th>KBLI</th>
                                         <th>Alamat Perusahaan</th>
                                         <th>RT Perusahaan</th>
                                         <th>RW Perusahaan</th>
                                         <th>Provinsi Perusahaan</th>
                                         <th>Kota Perusahaan</th>
                                         <th>Kecamatan Perusahaan</th>
                                         <th>Kelurahan Perusahaan</th>
                                         <th>Peruntukan Tanah</th>
                                         <th>Luas Tanah</th>
                                         <th>Kategori</th>
                                         <th>Perluasan</th>
                                         <th>Status Tanah</th>
                                         <th>Lokasi Tanah</th>
                                         <th>RT Tanah</th>
                                         <th>RW Tanah</th>
                                         <th>Kota Tanah</th>
                                         <th>Kecamatan Tanah</th>
                                         <th>Kelurahan Tanah</th>                                         
                                         <th>Status Berkas</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kkpr as $i) {
                                    ?>
                                        <?php
                                        $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$i->kelurahan_pemohon' ")->row();
                                        $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$i->kecamatan_pemohon' ")->row();
                                        $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$i->kota_pemohon' ")->row();
                                        $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$i->provinsi_pemohon' ")->row();
                                        $peta = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $lhs = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $draft = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$i->id_kkpr_permohonan'")->row();
                                        $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$i->kelurahan_tanah' ")->row();
                                        $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$i->kecamatan_tanah' ")->row();
                                        ?>
                                    <tr>
                                        <td >
                                            <span><?= $no++ ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->tgl_verif_berkas ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->tgl_survei ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->no_reg_terbit ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->tgl_reg ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->surveyor1 ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->surveyor2 ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->type ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->nama_pemohon ?></span>
                                        </td>
                                        <td >
                                            <span><?php if ($peta) echo $peta->alamat_pemohon ?></span>
                                        </td>
                                        <td >
                                            <span><?= '00' . $i->rt_pemohon ?></span>
                                        </td>
                                        <td >
                                            <span><?= "00" . $i->rw_pemohon ?></span>
                                        </td>
                                        <td >
                                            <span><?= $provinsi->prov_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kota->city_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kecamatan->dis_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kelurahan->subdis_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->telp_pemohon ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->nama_perusahaan ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->nib ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->skala_usaha ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->klasifikasi_resiko ?></span>
                                        </td>
                                        <td >
                                            <?php
                                            $kbli = json_decode($i->kbli);
                                            foreach ($kbli as $k) {
                                                echo '<span>' . $k->kbli . '</span>';
                                            }
                                            ?>
                                        </td>
                                        <td >
                                            <span><?= $i->alamat_perusahaan ?></span>
                                        </td>
                                        <td >
                                            <span><?= "00" . $i->rt_perusahaan ?></span>
                                        </td>
                                        <td >
                                            <span><?= "00" . $i->rw_perusahaan ?></span>
                                        </td>
                                        <td >
                                            <span><?= $provinsi->prov_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kota->city_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kecamatan->dis_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kelurahan->subdis_name ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->peruntukan_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->luas_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->kategori ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->perluasan ?></span>
                                        </td>
                                        <td >
                                            <?php
                                            $status_tanah = json_decode($i->status_tanah);
                                            foreach ($status_tanah as $s) {
                                                echo '<span>' . $s->status_tanah . '</span>';
                                            }
                                            ?>
                                        </td>
                                        <td >
                                            <span><?= $i->lokasi_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= "00" . $i->rt_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= "00" . $i->rw_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= $i->kota_tanah ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kecamatan_tanah->nama_kecamatan ?></span>
                                        </td>
                                        <td >
                                            <span><?= $kelurahan_tanah->nama_desa ?></span>                                        
                                         <td>
                                         <span class="badge <?php
                                                            $progres = $i->status_berkas;
                                                            if ($progres == 0) {
                                                                echo " bg-label-danger";
                                                            } elseif ($progres == 2) {
                                                                echo " bg-label-primary";
                                                            } elseif ($progres == 3) {
                                                                echo " bg-label-warning";
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?> me-1">
                                            <?php
                                            $progres = $i->status_berkas;
                                            if ($progres == 0) {
                                                echo "Disposisi";
                                            } elseif ($progres == 2) {
                                                echo "Siap Survei";
                                            } elseif ($progres == 3) {
                                                echo "Pengerjaan Laporan";
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </span>
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