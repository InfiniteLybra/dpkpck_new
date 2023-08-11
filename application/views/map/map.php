<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<div class="card">
    <div class="card-header">
        <div class="card-title">
            Map

        </div>
    </div>
    <div class="card-body">
        <div id="map" style="
        height: 500px;
        min-width: 300px;
        width: auto;
        max-width: 1400px;
        "></div>
    </div>
    <div class="card-footer mt-0 mb-0">
        <div class="card-toolbar" align="right">
            <div class=" mt-0 mb-0">

                <button id="drawPolygonButton" class="btn btn-light-success">Buat Poligon</button>
                <button id="deletePolygonButton" class="btn btn-light-danger">Hapus Poligon</button>
            </div>
        </div>
    </div>
</div>