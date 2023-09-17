<script>
    var coordinatesList = document.getElementById('list_input');

    var map = L.map('map').setView([-7.940226, 112.696665], 17);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 19,
    }).addTo(map);

    map.locate({
        setView: true,
        maxZoom: 22
    });

    L.control.scale({
        imperial: true,
        metric: true,
        position: 'bottomright'
    }).addTo(map);
    // open street map
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    // watercolor
    var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });
    CartoDB_DarkMatter.addTo(map);

    // google street
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);

    // google satelite
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleSat.addTo(map);


    var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    Stamen_Watercolor.addTo(map);

    var baseLayers = {
        "Satellite": googleSat,
        "Google Map": googleStreets,
        "Water Color": Stamen_Watercolor,
        "OpenStreetMap": osm,
    };


    L.control.layers(baseLayers).addTo(map);

    L.Control.geocoder().addTo(map);

    var shpfile = new L.Shapefile('<?= base_url('assets_dokumen/shp/') ?>real_shp.zip', {
        onEachFeature: function(feature, layer) {
            if (feature.properties) {
                layer.bindPopup(Object.keys(feature.properties).map(function(k) {
                    return k + ": " + feature.properties[k];
                }).join("<br />"), {
                    maxHeight: 200
                });

                layer.setStyle({
                    fillColor: 'orange',
                    color: 'red',
                    weight: 2,
                    opacity: 0.1,
                    fillOpacity: 0.1
                });

            }
        }
    });

    shpfile.addTo(map);
    shpfile.once("data:loaded", function() {
        // console.log("finished loaded shapefile");
        alert('File shp berhasil dimuat.');
    });
    shpfile.once("data:error", function() {
        console.log('error');
        alert('Error Harap Masukan File SHP .');
    });

    var createPolygon = true;
    var markerLayer = L.layerGroup().addTo(map);
    var polygonLayer = L.layerGroup().addTo(map);
    var polygonPoints = [];

    document.getElementById('drawPolygonButton').addEventListener('click', function() {
        if (polygonPoints.length == 0 || polygonPoints.length == 1 || polygonPoints.length == 2) {
            alert('Anda memerlukan minimal 3 titik untuk membuat poligon.');
        } else {
            var polygon = L.polygon(polygonPoints, {
                color: 'red'
            }).addTo(polygonLayer);
            createPolygon = false;
            polygonPoints = [];
            markerLayer.clearLayers();
        }
    });

    deletePolygonButton.addEventListener('click', function() {
        polygonLayer.clearLayers();
        markerLayer.clearLayers();
        polygonPoints = [];
        createPolygon = true;
    });

    map.on('click', function(e) {
        if (createPolygon == true) {
            polygonPoints.push(e.latlng);
            var marker = L.marker(e.latlng).addTo(markerLayer);
        } else {
            alert('Polygon telah ada, hapus jika ingin membuat ulang.');
        }
    });

    document.getElementById('export').addEventListener('click', function() {
        if (createPolygon == true) {
            alert('Gambar dan buat polygon terlebih dahulu');
        } else {
            exportGeoJSON();
        }
    });

    function exportGeoJSON() {
        var geoJSONData = polygonLayer.toGeoJSON();
        var geoJSONStr = JSON.stringify(geoJSONData, null, 2);

        var blob = new Blob([geoJSONStr], {
            type: 'application/json'
        });
        var url = URL.createObjectURL(blob);

        var a = document.createElement('a');
        a.href = url;
        a.download = 'map.geojson';
        a.click();
    }
</script>