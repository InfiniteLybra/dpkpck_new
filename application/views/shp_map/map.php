<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

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
                                    <input type="file" name="shp_file" class="form-control flex-grow-1" value="">
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
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var boundary = L.polygon([
        [-8.476526, 112.975311],
        [-7.923313, 112.947845],
        [-7.756714, 112.587792],
        [-7.752253, 112.285789],
        [-8.443661, 112.321731]
    ], {
        color: 'white',
        opacity: 0.0,
        fillColor: 'white',
        fillOpacity: 0.0
    });

    var map = L.map('map', {
        tap: false, // ref https://github.com/Leaflet/Leaflet/issues/7255
        center: new L.LatLng(-8.133063, 112.568680),
        zoom: 15,
        minZoom: 13, // Set zoom level minimum
        maxZoom: 19, // Set zoom level maximum
        maxBounds: boundary.getBounds(),
        fullscreenControl: true,
        fullscreenControlOptions: { // optional
            title: "Show me the fullscreen !",
            titleCancel: "Exit fullscreen mode"
        }
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var geojsonFeature = <?= $geojson ?>;

    function decimalToDMS(decimal, isLongitude) {
        const degrees = Math.floor(Math.abs(decimal));
        const minutes = (Math.abs(decimal) - degrees) * 60;
        const seconds = (minutes - Math.floor(minutes)) * 60;
        const direction = isLongitude ? (decimal > 0 ? "E" : "W") : (decimal > 0 ? "N" : "S");
        return `${degrees}° ${Math.floor(minutes)}' ${seconds.toFixed(2)}" ${direction}`;
    }

    const coordinates = geojsonFeature.features[0].geometry.coordinates[0];
    const dmsCoordinates = coordinates.map(coord => ({
        latitude: decimalToDMS(coord[1], false),
        longitude: decimalToDMS(coord[0], true)
    }));

    L.geoJSON(geojsonFeature).addTo(map);

    // Menambahkan marker di tiap sudut polygon dengan popup
    dmsCoordinates.forEach(function(coord, index) {
        var marker = L.marker(new L.LatLng(coordinates[index][1], coordinates[index][0])).addTo(map);
        marker.bindPopup('Koordinat: ' + coord.latitude + ', ' + coord.longitude).openPopup();
    });
</script>