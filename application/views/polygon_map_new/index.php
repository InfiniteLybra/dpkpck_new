<head>
    <header>
        <style>
            .corner-label {
                background: white;
                border: 0px solid #333;
                padding: 0px 0px;
                font-weight: bold;
                font-size: 30px;
                border-radius: 4px;
            }
        </style>
    </header>
</head>
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> User </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Panduan Menggunakan Polygon Map</h5>
                        <div class="row">
                            <div class="col">
                                <p>1. Gunakan tombol + dan - untuk memperbesar gambar</p>
                                <p>2. Gunakan tombol segilima untuk menggambar peta</p>
                                <p>3. Gunakan tombol dibawah segilima untuk mengedit peta</p>
                                <p>4. Gunakan tombol sampah untuk menghapus peta</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="map" style="
    height: 500px;
    min-width: 300px;
    width: auto;
    max-width: 1400px;
    "></div>
                        <!-- <button id="drawPolygonButton" class="btn btn-light-success">Buat Poligon</button>
        <button id="deletePolygonButton" class="btn btn-light-danger">Hapus Poligon</button> -->
                        <button class="btn btn-primary" id="reloadButton">Klik untuk Perubahan</button>
                        <button id="export" class="btn btn-primary">Expor</button>
                        <a href="<?= base_url('Geojson'); ?>" class="btn btn-primary" target="_blank">Convert SHP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>