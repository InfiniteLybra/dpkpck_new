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
        <label for="opacityRange">Opacity:</label>
        <input type="range" id="opacityRange" min="0" max="1" step="0.1" value="0.5">
        <button id="drawPolygonButton" class="btn btn-light-success">Buat Poligon</button>
        <button id="deletePolygonButton" class="btn btn-light-danger">Hapus Poligon</button>
        <button id="export" class="btn btn-light-success">Expor</button>
    </div>