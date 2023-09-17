<?php
if ($cek) {
} else {
    $kelurahan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$data->kelurahan_pemohon' ")->row();
    $kecamatan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$data->kecamatan_pemohon' ")->row();
    $kota = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$data->kota_pemohon' ")->row();
    $provinsi = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$data->provinsi_pemohon' ")->row();
    $kelurahan_perusahaan = $this->db->query("SELECT * FROM indo_kelurahan WHERE subdis_id = '$data->kelurahan_perusahaan' ")->row();
    $kecamatan_perusahaan = $this->db->query("SELECT * FROM indo_kecamatan WHERE dis_id = '$data->kecamatan_perusahaan' ")->row();
    $kota_perusahaan = $this->db->query("SELECT * FROM indo_kota WHERE city_id = '$data->kota_perusahaan' ")->row();
    $provinsi_perusahaan = $this->db->query("SELECT * FROM indo_provinsi WHERE prov_id = '$data->provinsi_perusahaan' ")->row();
    $kelurahan_tanah = $this->db->query("SELECT * FROM desa WHERE id_desa = '$data->kelurahan_tanah' ")->row();
    $kecamatan_tanah = $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan = '$data->kecamatan_tanah' ")->row();
}
?>
<style>
  /* Ganti warna latar belakang (background) input menjadi abu-abu */
  input[type="text"].form-control[readonly] {
    background-color: #F0F0F0; /* Warna abu-abu */
  }
  textarea.form-control[readonly] {
    background-color: #F0F0F0; /* Warna abu-abu */
  }
</style>
<!--begin::details View-->
<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Config LHS</h3>
        </div>
    </div>
    <!--begin::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-9">
        <form method="POST" action="<?php echo base_url('Kkpr/proses_config_lhs'); ?>" enctype="multipart/form-data">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table" border="0">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-50px"></th>
                        <th class="text-center min-w-200px"></th>
                        <th class="text-center min-w-300px"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">1</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Nomor Register</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="no_reg" class="form-control" value="<?= $data->no_reg ?>" readonly>
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->no_reg ?>">
                            <?php } else { ?>
                                <input type="text" name="no_reg" class="form-control" value="<?= $data->id_kkpr_permohonan ?>"readonly>
                                <input type="hidden" name="id_permohonan" class="form-control" value="<?= $data->id_kkpr_permohonan ?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">2</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Tanggal Survei</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="date" name="tgl_survei" class="form-date form-control" value="<?= $data->tgl_survei ?>">
                            <?php } else { ?>
                                <input type="date" name="tgl_survei" class="form-date form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">3</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Petugas 1</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="petugas1" class="form-control" value="<?= $data->petugas1 ?>">
                            <?php } else { ?>
                                <input type="text" name="petugas1" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">4</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Petugas 2</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="petugas2" class="form-control" value="<?= $data->petugas2 ?>">
                            <?php } else { ?>
                                <input type="text" name="petugas2" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">5</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="nama_pemohon" class="form-control" value="<?= $data->nama_pemohon ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">6</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"readonly><?php if ($data) echo $data->alamat_pemohon ?>
                            </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_pemohon" data-kt-autosize="true"readonly><?php if ($data) echo $data->alamat_pemohon ?> RT. <?php if ($data) echo $data->rt_pemohon ?> RW. <?php if ($data) echo $data->rw_pemohon ?> Kel. <?= $kelurahan->subdis_name ?> - Kec. <?= $kecamatan->dis_name ?> - Kota / Kab. <?= $kota->city_name ?> - Prov. <?= $provinsi->prov_name ?>
                                </textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">7</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Bertindak Atas Nama</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="nama_perusahaan" class="form-control" value="<?php if ($data->nama_perusahaan) echo $data->nama_perusahaan ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">8</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Alamat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> 
                                </textarea>
                            <?php } else { ?>
                                <textarea class="form-control" name="alamat_perusahaan" data-kt-autosize="true"readonly><?php if ($data->nama_perusahaan) echo $data->alamat_perusahaan ?> <?php if ($data->nama_perusahaan) echo 'RT. ' . $data->rt_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'RW. ' . $data->rw_perusahaan . '' ?> <?php if ($data->nama_perusahaan) echo 'Kel. ' . $kelurahan_perusahaan->subdis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kec. ' . $kecamatan_perusahaan->dis_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Kota / Kab. ' . $kota_perusahaan->city_name . '' ?> <?php if ($data->nama_perusahaan) echo '- Prov. ' . $provinsi_perusahaan->prov_name . '' ?>
                                </textarea>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">9</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">NIB</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="nib" class="form-control" value="<?php if ($data) echo $data->nib ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="nib" class="form-control" value="<?php if ($data) echo $data->nib ?>"readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">10</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Lokasi</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi ?>"readonly>
                            <?php } else { ?>
                                <input type="text" name="lokasi" class="form-control" value="<?php if ($data) echo $data->lokasi_tanah ?> Desa / Kel. <?= $kelurahan_tanah->nama_desa ?> - Kec. <?= $kecamatan_tanah->nama_kecamatan ?> "readonly>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">11</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Titik Koordinat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="koordinat" class="form-control" value="<?php if ($data) echo $data->koordinat ?>">
                            <?php } else { ?>
                                <input type="text" name="koordinat" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">12</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">L. Tanah Diluar Sepadan jalan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="luas_tanah_jalan" class="form-control" value="<?= $data->luas_tanah_jalan ?>">
                            <?php } else { ?>
                                <input type="text" name="luas_tanah_jalan" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">13</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Guna Lahan saat Survei</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="guna_lahan" class="form-control" value="<?= $data->guna_lahan ?>">
                            <?php } else { ?>
                                <input type="text" name="guna_lahan" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">14</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Batas Utara</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="batas_utara" class="form-control" value="<?= $data->batas_utara ?>">
                            <?php } else { ?>
                                <input type="text" name="batas_utara" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">15</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Batas Selatan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="batas_selatan" class="form-control" value="<?= $data->batas_selatan ?>">
                            <?php } else { ?>
                                <input type="text" name="batas_selatan" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">16</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Batas Barat</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="batas_barat" class="form-control" value="<?= $data->batas_barat ?>">
                            <?php } else { ?>
                                <input type="text" name="batas_barat" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">17</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Batas timur</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="batas_timur" class="form-control" value="<?= $data->batas_timur ?>">
                            <?php } else { ?>
                                <input type="text" name="batas_timur" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">18</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Kemiringan Tanah</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="kemiringan_tanah" class="form-control" value="<?= $data->kemiringan_tanah ?>">
                            <?php } else { ?>
                                <input type="text" name="kemiringan_tanah" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">19</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Fungsi dan Kelas Jalan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="fungsi_kelas_jalan" class="form-control" value="<?= $data->fungsi_kelas_jalan ?>">
                            <?php } else { ?>
                                <input type="text" name="fungsi_kelas_jalan" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">20</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 1 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto1" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto1 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan1" data-kt-autosize="true"><?= $data->keterangan1 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto1" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan1" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">21</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 2 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto2" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto2 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan2" data-kt-autosize="true"><?= $data->keterangan2 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto2" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan2" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">22</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 3 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto3" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto3 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan3" data-kt-autosize="true"><?= $data->keterangan3 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto3" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan3" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">23</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 4 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto4" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto4 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan4" data-kt-autosize="true"><?= $data->keterangan4 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto4" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan4" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">24</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 5 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto5" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto5 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan5" data-kt-autosize="true"><?= $data->keterangan5 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto5" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan5" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">25</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Foto 6 dan Keterangan</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <div class="mb-3 d-flex">
                                    <input type="file" name="foto6" class="form-control flex-grow-1" value="">
                                    <a href="<?php echo base_url('assets_dokumen/kkpr/'); ?><?= $data->foto6 ?>" target="_blank" class="btn btn-light fw-bold flex-shrink-0"  >Lihat Disini</a>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" name="keterangan6" data-kt-autosize="true"><?= $data->keterangan6 ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="mb-3 row">
                                    <input type="file" name="foto6" class="form-control" value="">
                                </div>
                                <div class="mb-3 row">
                                    <textarea class="form-control" name="keterangan6" data-kt-autosize="true"></textarea>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">26</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Rencana Pola Ruang</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="rencana_pola_ruang" class="form-control" value="<?= $data->rencana_pola_ruang ?>">
                            <?php } else { ?>
                                <input type="text" name="rencana_pola_ruang" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">27</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Masuk LSD</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <select name="masuk_lsd" id="masuk_lsd" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1" <?php if ($data->masuk_lsd == '1') echo 'selected' ?>>Ya</option>
                                    <option value="0" <?php if ($data->masuk_lsd == '0') echo 'selected' ?>>Tidak</option>
                                </select>
                            <?php } else { ?>
                                <select name="masuk_lsd" id="masuk_lsd" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">27</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Masuk KP2B</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <select name="masuk_kp2b" id="masuk_kp2b" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1" <?php if ($data->masuk_kp2b == '1') echo 'selected' ?>>Ya</option>
                                    <option value="0" <?php if ($data->masuk_kp2b == '0') echo 'selected' ?>>Tidak</option>
                                </select>
                            <?php } else { ?>
                                <select name="masuk_kp2b" id="masuk_kp2b" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">29</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Radius dengan Mata Air</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <input type="text" name="radius_mata_air" class="form-control" value="<?= $data->radius_mata_air ?>">
                            <?php } else { ?>
                                <input type="text" name="radius_mata_air" class="form-control" value="">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold">30</span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold">Melewati Tanah Pihak Lain</span>
                        </td>
                        <td class="text-center pe-0">
                            <?php if ($cek) { ?>
                                <select name="pihak_lain" id="pihak_lain" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1" <?php if ($data->pihak_lain == '1') echo 'selected' ?>>Ya</option>
                                    <option value="0" <?php if ($data->pihak_lain == '0') echo 'selected' ?>>Tidak</option>
                                </select>
                            <?php } else { ?>
                                <select name="pihak_lain" id="pihak_lain" class="form-select form-control mb-2" data-control="select2" data-placeholder="Mohon diPilih..">
                                    <option value="" selected></option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center pe-0">
                            <span class="fw-bold"></span>
                        </td>
                        <td class="text-center pe-0">
                            <span class="fw-bold"></span>
                        </td>
                        <td class="d-flex justify-content-end me-2">
                            <a href="<?php echo base_url('kkpr/config'); ?>" class="btn btn-light">Kembali</a>&ensp;
                            <?php if ($cek) { ?>
                                <a href="<?php echo base_url('Pdf/lhs/'); ?><?= $data->id_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } else { ?>
                                <a href="<?php echo base_url('Pdf/lhs/'); ?><?= $data->id_kkpr_permohonan ?>" download class="btn btn-danger">Download PDF</a>&ensp;
                            <?php } ?>
                            <!-- <a href="#" class="btn btn-success" readonly>Download EXCEL</a>&ensp; -->
                            <button type="submit" class="btn btn-primary">Simpan</button>&ensp;
                            <?php if ($cek) { ?>
                                <?php
                                $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$data->id_permohonan ' ")->row();
                                if ($cek_sertifikat) {
                                ?>
                                    <a href="<?php echo base_url('Pdf/lhs/'); ?><?= $data->id_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                                <?php }
                            } else { ?>
                                <?php
                                $cek_sertifikat = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$data->id_kkpr_permohonan ' ")->row();
                                if ($cek_sertifikat) {
                                ?>
                                    <a href="<?php echo base_url('Pdf/lhs/'); ?><?= $data->id_kkpr_permohonan ?>" target="_blank" class="btn btn-info">Lihat</a>
                            <?php }
                            } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->