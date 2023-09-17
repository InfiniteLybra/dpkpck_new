<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Tutorial</title>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <style>
        #map {
            height: 90vh;
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
    <link rel="stylesheet" href="gh-pages.css" />
</head>

<body>   
    <div id="map"></div>
    <?php
    // Memulai koneksi ke database
    $conn = new mysqli("localhost", "root", "", "dpkcpk");

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Mengambil data dari tabel shp_koordinat
    $sql = "SELECT * FROM shp_koordinat";
    $result = $conn->query($sql);

    // Membuat array untuk menyimpan data dari database
    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Menambahkan setiap baris data ke dalam array
            $data[] = $row["shp"];
            echo "<table>";
            echo "<tr>";
            echo "<td><input type='text' value='".$row['shp']."' readonly></td>";
            echo "<td><a href='proses_hapus.php?id=".$row['id']."'>Hapus</a></td>";
            echo "</tr>";
            echo "</table>";
        }
    }

    // Mengkonversi array PHP menjadi JSON
    $data_json = json_encode($data);

    // Menutup koneksi ke database
    $conn->close();
    ?>  
     
    <p id="paragraf">Ini adalah paragraf yang akan diubah.</p>
    <form id="myForm">
        <!-- Kolom input akan ditambahkan di sini -->
    </form>
</body>

</html>
<script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>


<script src="catiline.js"></script>
<script src="leaflet.shpfile.js"></script>
<script>
    var paragraf = document.querySelector("#paragraf");

    var koordinat = '';

    const form = document.getElementById('myForm');


    var map = L.map('map').setView([-8.124491, 112.615356], 13);

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

    function generateInput(LatLng) {

        // Menghilangkan "LatLng(" dari teks
        let text = LatLng.toString();
        let textTanpaLatLng = text.replace(/LatLng\(/g, '');
        // console.log(textTanpaLatLng);

        let newString = textTanpaLatLng.replace(/\)/g, '|');
        // console.log(newString);

        // Memisahkan koordinat menjadi array dengan membagi string berdasarkan koma dan menghapus spasi
        const coordinatesArray = newString.split('|');

        jumlahPerulangan = coordinatesArray.length - 1;
        // paragraf.innerHTML = '' + coordinatesArray;
        console.log(coordinatesArray);

        // Loop untuk membuat kolom input sebanyak jumlahPerulangan
        for (let i = 0; i < jumlahPerulangan; i++) {
            // Membuat elemen input
            const input = document.createElement('input');

            // Menetapkan atribut atribut input
            input.type = 'text'; // Anda dapat mengganti tipe input sesuai kebutuhan
            input.id = `input${i}`; // Nama atribut input
            input.name = `input${i}`; // Nama atribut input
            if (i == 0) {
                input.value = coordinatesArray[i]; // Nama atribut input
            } else {
                input.value = coordinatesArray[i].replace(',', ''); // Nama atribut input
            }
            input.placeholder = `Input ${i}`; // Placeholder untuk input

            // Menambahkan elemen input ke dalam form
            form.appendChild(input);
        }
    }
    var shpfilePaths = <?= $data_json ?>; // This will be an array in JavaScript

    // To access the first file path:
    var firstFilePath = shpfilePaths[0];
    // console.log(firstFilePath);
    var shpfile = new L.Shapefile(''+firstFilePath+'', {
        onEachFeature: function(feature, layer) {
            if (feature.properties) {
                // layer.bindPopup(Object.keys(feature.properties).map(function (k) {
                //     return k + ": " + feature.properties[k];
                // }).join("<br />"), {
                //     maxHeight: 200
                // });

                layer.bindPopup(
                    'Lokasi permohonan'
                );

                layer.setStyle({
                    fillColor: 'orange',
                    color: 'red',
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.7
                });


                var coordinates = layer.getLatLngs(); // Array of LatLng objects
                console.log(coordinates);
                paragraf.innerHTML = "" + coordinates;

                koordinat = coordinates;
                generateInput(coordinates);




            }
        }
    });

    shpfile.addTo(map);
    shpfile.once("data:loaded", function() {
        // console.log("finished loaded shapefile");
        alert('File shp berhasil dimuat.');
    });





    var baseLayers = {
        "Satellite": googleSat,
        "Google Map": googleStreets,
        "Water Color": Stamen_Watercolor,
        "OpenStreetMap": osm,
    };

    var overlays = {
        "example": shpfile,
    };



    L.control.layers(baseLayers, overlays).addTo(map);

    L.Control.geocoder().addTo(map);
</script>