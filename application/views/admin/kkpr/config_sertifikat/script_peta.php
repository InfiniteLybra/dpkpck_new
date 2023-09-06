<script>
        var paragraf = document.querySelector("#paragraf");
        var coordinatesList = document.getElementById('list_input');
        const inputContainer = document.getElementById("inputContainer");


        var m = L.map('map').setView([-7.939216, 112.692261], 15);
        var watercolor = L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.jpg', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
        }).addTo(m);

        var shpfile = new L.Shapefile('<?= base_url('assets_dokumen/shp/') ?>real_shp.zip', {
            onEachFeature: function(feature, layer) {
                if (feature.properties) {
                    layer.bindPopup(
                        'Lokasi permohonan'
                    );
                    var coordinates = layer.getLatLngs();
                    console.log(coordinates);
                    paragraf.innerHTML = "" + coordinates[1];

                    i = 0;
                    while (i < coordinates.length) {

                        var inputElement = document.createElement("input");

                        // Menetapkan tipe dan atribut lainnya
                        inputElement.type = "text";
                        inputElement.id = "latlng_" + i;
                        inputElement.name = "latlng" + i;
                        var coordinat = coordinates[i] + "";
                        var value1 = coordinat.replace("LatLng(", "");
                        var value2 = value1.replace(")", "");
                        inputElement.value = value2;
                        inputElement.readOnly = true;

                        var kolomInputDiv = document.getElementById("kolomInput");
                        kolomInputDiv.appendChild(inputElement);

                        i++;
                    }


                }
            }
        });
        shpfile.addTo(m);
        shpfile.once("data:loaded", function() {
            // console.log("finished loaded shapefile");
            alert('sip');
        });
    </script>