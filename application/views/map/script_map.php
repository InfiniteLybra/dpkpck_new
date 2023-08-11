<script>
    // Inisialisasi peta
    var map = L.map('map').setView([0, 0], 13);

    // Tambahkan tile layer ke peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 19,
    }).addTo(map);

    map.locate({
        setView: true,
        maxZoom: 22
    });

    var polygonLayer = L.layerGroup().addTo(map);
    var polygonPoints = [];

    // Tindakan saat tombol ditekan
    document.getElementById('drawPolygonButton').addEventListener('click', function() {
        if (polygonPoints.length > 2) {
            var polygon = L.polygon(polygonPoints, {
                color: 'red'
            }).addTo(polygonLayer);
            polygonPoints = [];
        } else {
            alert('Anda memerlukan minimal 3 titik untuk membuat poligon.');
        }
    });

    deletePolygonButton.addEventListener('click', function() {
        polygonLayer.clearLayers();
        polygonPoints = [];
    });


    // Tindakan saat klik di peta
    map.on('click', function(e) {
        polygonPoints.push(e.latlng);
        var marker = L.marker(e.latlng).addTo(polygonLayer);
    });
</script>