<!DOCTYPE html>
<html lang="en">

<style>
    #map {
        height: 100vh;
        width: 100%;
    }

    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
</style>

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Master /</span> SHP Map</h4>

        <div class="row">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Panduan Menggunakan SHP Map</h5>
                        <div class="row">
                            <div class="col">
                                <p>1. Siapkan file map SHP dengan format .zip</p>
                                <p>2. Upload file map dengan cara klik 'Choose File'</p>
                                <p>3. Klik tombol 'Upload' untuk mengunggah file map</p>
                            </div>
                        </div>
                        <form method="POST" action="<?php echo base_url('Map/proses_shp'); ?>" enctype="multipart/form-data">
                            <?php
                            if ($cek_shp) {
                            } else {
                            ?>
                                <div class="d-flex mb-3">
                                    <input type="file" name="shp" class="form-control flex-grow-1" value="">
                                    <button type="submit" class="btn btn-primary fw-bold flex-shrink-0">Upload</button>
                                </div>
                            <?php } ?>
                            <?php
                            if ($cek_shp) {
                                foreach ($cek_shp as $s) {
                            ?>
                                    <div class="d-flex mb-3">
                                        <input type="text" class="form-control flex-grow-1" value="<?= $s->shp ?>" readonly>
                                        <a href="<?php echo base_url('Map/hapus_shp/'); ?><?= $s->id ?>" class="btn btn-danger fw-bold flex-shrink-0">Hapus</a>
                                    </div>
                            <?php }
                            } ?>
                        </form>
                        <div id="map" style="
        height: 500px;
        min-width: 300px;
        width: auto;
        max-width: 1400px;
        "></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<!-- Content wrapper -->

<!-- <script>
    var map = L.map('map').setView([-7.9661185535104755, 112.6328875899145], 13); // Latitude, Longitude, and Zoom Level

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
    }).addTo(map);
  </script> -->