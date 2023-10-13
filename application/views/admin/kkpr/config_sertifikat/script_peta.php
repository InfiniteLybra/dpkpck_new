<!-- <script>
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
        alert('sip');
    });
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var fungsiJalanSelect = document.getElementById("fungsi_jalan1");
        var kelasJalanSelect = document.getElementById("kelas_jalan1");
        var inputBaruRow = document.getElementById("tr_gsp_1");
        var tombolTampilkanInput = document.getElementById("cek1");
        var tombolRefreshInput = document.getElementById("refresh1");

        // Event listener untuk tombol "Tampilkan Input Baru"
        tombolTampilkanInput.addEventListener("click", function() {
            var nilaiFungsiJalan = fungsiJalanSelect.value;
            var nilaiKelasJalan = kelasJalanSelect.value;

            if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '5,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '5,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '5,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '12,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '7,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = '5,5 m & 2 m';
            } else {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_1").value = 'tidak ada';
            }
        });
        // Event listener untuk tombol "Refresh"
        tombolRefreshInput.addEventListener("click", function() {
            // Mengosongkan nilai dari inputan baru
            inputBaruRow.style.display = "none"; // Menyembunyikan elemen input baru
            inputBaru.value = ''; // Mengosongkan nilai input
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var fungsiJalanSelect = document.getElementById("fungsi_jalan2");
        var kelasJalanSelect = document.getElementById("kelas_jalan2");
        var inputBaruRow = document.getElementById("tr_gsp_2");
        var tombolTampilkanInput = document.getElementById("cek2");
        var tombolRefreshInput = document.getElementById("refresh2");

        // Event listener untuk tombol "Tampilkan Input Baru"
        tombolTampilkanInput.addEventListener("click", function() {
            var nilaiFungsiJalan = fungsiJalanSelect.value;
            var nilaiKelasJalan = kelasJalanSelect.value;

            if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '5,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '5,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '5,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '12,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '7,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = '5,5 m & 2 m';
            } else {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_2").value = 'tidak ada';
            }
        });
        // Event listener untuk tombol "Refresh"
        tombolRefreshInput.addEventListener("click", function() {
            // Mengosongkan nilai dari inputan baru
            inputBaruRow.style.display = "none"; // Menyembunyikan elemen input baru
            inputBaru.value = ''; // Mengosongkan nilai input
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var fungsiJalanSelect = document.getElementById("fungsi_jalan3");
        var kelasJalanSelect = document.getElementById("kelas_jalan3");
        var inputBaruRow = document.getElementById("tr_gsp_3");
        var tombolTampilkanInput = document.getElementById("cek3");
        var tombolRefreshInput = document.getElementById("refresh3");

        // Event listener untuk tombol "Tampilkan Input Baru"
        tombolTampilkanInput.addEventListener("click", function() {
            var nilaiFungsiJalan = fungsiJalanSelect.value;
            var nilaiKelasJalan = kelasJalanSelect.value;

            if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '5,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '5,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '5,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '12,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '7,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = '5,5 m & 2 m';
            } else {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_3").value = 'tidak ada';
            }
        });
        // Event listener untuk tombol "Refresh"
        tombolRefreshInput.addEventListener("click", function() {
            // Mengosongkan nilai dari inputan baru
            inputBaruRow.style.display = "none"; // Menyembunyikan elemen input baru
            inputBaru.value = ''; // Mengosongkan nilai input
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        var fungsiJalanSelect = document.getElementById("fungsi_jalan4");
        var kelasJalanSelect = document.getElementById("kelas_jalan4");
        var inputBaruRow = document.getElementById("tr_gsp_4");
        var tombolTampilkanInput = document.getElementById("cek4");
        var tombolRefreshInput = document.getElementById("refresh4");

        // Event listener untuk tombol "Tampilkan Input Baru"
        tombolTampilkanInput.addEventListener("click", function() {
            var nilaiFungsiJalan = fungsiJalanSelect.value;
            var nilaiKelasJalan = kelasJalanSelect.value;

            if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ap' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'kp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lp' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '5,5 m & 7 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'lip' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '5,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'as' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 15 m';
            } else if (nilaiFungsiJalan == 'ks' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 5 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 3 m';
            } else if (nilaiFungsiJalan == 'ls' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '5,5 m & 10 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'r') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '12,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 's') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '7,5 m & 2 m';
            } else if (nilaiFungsiJalan == 'lis' && nilaiKelasJalan == 'k') {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = '5,5 m & 2 m';
            } else {
                inputBaruRow.style.display = "table-row";
                document.getElementById("gsp_4").value = 'tidak ada';
            }
        });
        // Event listener untuk tombol "Refresh"
        tombolRefreshInput.addEventListener("click", function() {
            // Mengosongkan nilai dari inputan baru
            inputBaruRow.style.display = "none"; // Menyembunyikan elemen input baru
            inputBaru.value = ''; // Mengosongkan nilai input
        });
    });

    $(document).ready(function() {
        $("#jumlah_koordinat").on("input", function() {
            var rtValue = $(this).val();
            var namaPemohonContainer = $("#koor");

            // Hapus semua form nama pemohon yang ada sebelumnya
            namaPemohonContainer.empty();
            var jumlahInputSebelumnya = $("input[name='koordinat[]']").length;
            // Buat form nama pemohon sesuai dengan nilai input number
            for (var i = 0; i < rtValue; i++) {
                var karakter = String.fromCharCode('a'.charCodeAt(0) + i + jumlahInputSebelumnya);
                var formNamaPemohon = '<div class="mb-3 row">' +
                    '<input type="text" name="koordinat[]" class="form-control" value="' + karakter + '.">' +
                    '</div>';

                namaPemohonContainer.append(formNamaPemohon);
            }
        });
    });
    $(document).ready(function() {
        var inputCount = $("input[name='koordinat[]']").length;
        const characters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j']; // Atur karakter yang ingin digunakan

        $("#addInput").click(function() {
            if (inputCount < characters.length) {
                // Buat input baru dan tambahkan ke dalam "additionalInputs" div
                var newInput = '<div class="newInput" id="input' + inputCount + '">' +
                    '<div class="mb-3 row">' +
                    '<input type="text" name="koordinat[]" class="form-control" value="' + characters[inputCount] + '.">' +
                    '</div>' +
                    '</div>';
                $("#additionalInputs").append(newInput);
                inputCount++;
            }
        });
        $("#removeInput").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputs .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        $(document).ready(function() {
            $('#id_lainya').change(function() {
                if ($(this).is(':checked')) {
                    $('#lainyaInput').show(); // Tampilkan input tambahan
                } else {
                    $('#lainyaInput').hide(); // Sembunyikan input tambahan jika checkbox tidak dicentang
                }
            });
        });
    });
</script>