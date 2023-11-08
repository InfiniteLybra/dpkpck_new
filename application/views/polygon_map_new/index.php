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
                        <div class="row mb-3">

                            <div class="card-body p-2">
                                <div class="col">
                                    <p class="my-auto"><i class='bx bxs-plus-square me-2'></i>Ikon "Tambah" digunakan untuk memperbesar map</p>
                                    <p class="my-auto"><i class='bx bxs-minus-square me-2'></i>Ikon "Kurang" digunakan untuk memperkecil map</p>
                                    <p class="my-auto"><i class='bx bxs-polygon me-2'></i>Ikon "Polygon" digunakan untuk menggambar peta</p>
                                    <p class="my-auto"><i class='bx bxs-edit me-2'></i>Ikon "Pensil" digunakan untuk mengedit titik peta</p>
                                    <p class="my-auto"><i class='bx bxs-trash me-2'></i>Ikon "Sampah" digunakan untuk menghapus peta</p>
                                </div>
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
                        <button class="btn btn-primary mt-3" id="reloadButton" hidden>Klik untuk Perubahan</button>
                        <button id="export" class="btn btn-primary mt-3">Expor</button>
                        <a href="<?= base_url('Geojson'); ?>" class="btn btn-primary mt-3" target="_blank">Convert SHP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Toast MAP -->
<div class="bs-toast toast fade show bg-primary position-fixed top-0 end-0 m-4" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header border-bottom mb-3">
        <i class="bx bx-search me-2 fs-4"></i>
        <div class="me-auto fs-4">Kaca Pembesar</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <img src="<?php echo base_url('assets/'); ?>assets/img/map.jpg" draggable="false" class="img-fluid mb-3 rounded">
        Gunakan Kaca Pembesar untuk mencari lokasi yang Anda inginkan. <br> Jika Anda sudah memiliki titik koordinat, Anda juga bisa mencarinya dengan Kaca Pembesar.
    </div>
</div>