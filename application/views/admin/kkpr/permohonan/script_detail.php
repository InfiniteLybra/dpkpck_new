<script>
    $(document).ready(function() {
        $("#buka_st").click(function() {
            // Buat input baru dan tambahkan ke dalam "additionalInputs" div
            var newInput1 = $("#table_surat_tanah1");
            var newInput2 = $("#table_surat_tanah2");
            newInput1.show();
            newInput2.show();
        });
        $("#tutup_st").click(function() {
            // Hapus input terakhir dari "additionalInputs" div
            var newInput1 = $("#table_surat_tanah1");
            var newInput2 = $("#table_surat_tanah2");
            newInput1.hide();
            newInput2.hide();
        });
    });
    $(document).ready(function() {
        $("#buka_st_ol").click(function() {
            // Buat input baru dan tambahkan ke dalam "additionalInputs" div
            var newInput1 = $("#table_surat_tanah_ol1");
            var newInput2 = $("#table_surat_tanah_ol2");
            newInput1.show();
            newInput2.show();
        });
        $("#tutup_st_ol").click(function() {
            // Hapus input terakhir dari "additionalInputs" div
            var newInput1 = $("#table_surat_tanah_ol1");
            var newInput2 = $("#table_surat_tanah_ol2");
            newInput1.hide();
            newInput2.hide();
        });
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_fotokopi_ktp"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="fotokopi_ktp"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="fotokopi_ktp"]').prop('disabled', true);
        }
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_tdp"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="tdp"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="tdp"]').prop('disabled', true);
        }
    });
    $('input[name="yn_dokumen_oss"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="dokumen_oss"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="dokumen_oss"]').prop('disabled', true);
        }
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_peta_bidang"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="peta_bidang"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="peta_bidang"]').prop('disabled', true);
        }
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_shp"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="shp"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="shp"]').prop('disabled', true);
        }
    });
    $('input[name="yn_akta_perusahaan"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="akta_perusahaan"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="akta_perusahaan"]').prop('disabled', true);
        }
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_surat_kematian"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="surat_kematian"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="surat_kematian"]').prop('disabled', true);
        }
    });
    // Ketika radio button "Tidak" diubah
    $('input[name="yn_surat_kuasa_ahli_waris"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="surat_kuasa_ahli_waris"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="surat_kuasa_ahli_waris"]').prop('disabled', true);
        }
    });
    $('input[name="yn_surat_dinas_peternakan"]').change(function() {
        if ($(this).val() === '0') {
            // Aktifkan textarea jika "Tidak" dipilih
            $('textarea[name="surat_dinas_peternakan"]').prop('disabled', false);
        } else {
            // Nonaktifkan textarea jika "Ya" dipilih
            $('textarea[name="surat_dinas_peternakan"]').prop('disabled', true);
        }
    });
</script>
<!-- <script>
    var previewTextarea = document.querySelector('[name="preview"]');

    var sourceTextareas = document.querySelectorAll('[data-preview="preview"]');

    sourceTextareas.forEach(function(textarea) {
        textarea.addEventListener('input', function() {
            var previewValue = '';

            sourceTextareas.forEach(function(sourceTextarea) {
                previewValue += sourceTextarea.value + '\n';
            });

            previewTextarea.value = previewValue;
        });
    });
</script> -->
<script>
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah pengiriman formulir

        var submitBtnValue = e.submitter.value;

        if (submitBtnValue === 'submit1') {
            this.action = '<?php echo base_url('Kkpr/proses_keterangan'); ?>'; // Update action dengan URL yang diinginkan
        } else if (submitBtnValue === 'submit2') {
            this.action = '<?php echo base_url('Kkpr/proses_update_admin_kkpr'); ?>';
        }
        this.submit(); // Kirim formulir setelah mengatur ulang action
    });
</script>
<script>
    $(document).ready(function() {

        $('#provinsi_pemohon').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kota'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                    }
                    $('#kota_pemohon').html(html);

                }
            });
            return false;
        });
        $('#kota_pemohon').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].dis_id + '>' + data[i].dis_name + '</option>';
                    }
                    $('#kecamatan_pemohon').html(html);

                }
            });
            return false;
        });
        $('#kecamatan_pemohon').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kelurahan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].subdis_id + '>' + data[i].subdis_name + '</option>';
                    }
                    $('#kelurahan_pemohon').html(html);

                }
            });
            return false;
        });
        $('#provinsi_kuasa').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kota'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                    }
                    $('#kota_kuasa').html(html);

                }
            });
            return false;
        });
        $('#kota_kuasa').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].dis_id + '>' + data[i].dis_name + '</option>';
                    }
                    $('#kecamatan_kuasa').html(html);

                }
            });
            return false;
        });
        $('#kecamatan_kuasa').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kelurahan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].subdis_id + '>' + data[i].subdis_name + '</option>';
                    }
                    $('#kelurahan_kuasa').html(html);

                }
            });
            return false;
        });
        $('#provinsi_perusahaan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kota'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].city_id + '>' + data[i].city_name + '</option>';
                    }
                    $('#kota_perusahaan').html(html);

                }
            });
            return false;
        });
        $('#kota_perusahaan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kecamatan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].dis_id + '>' + data[i].dis_name + '</option>';
                    }
                    $('#kecamatan_perusahaan').html(html);

                }
            });
            return false;
        });
        $('#kecamatan_perusahaan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Kkpr/get_kelurahan'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].subdis_id + '>' + data[i].subdis_name + '</option>';
                    }
                    $('#kelurahan_perusahaan').html(html);

                }
            });
            return false;
        });
        $('#kecamatan_tanah').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('Itr/get_desa'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id_desa + '>' + data[i].nama_desa + '</option>';
                    }
                    $('#kelurahan_tanah').html(html);

                }
            });
            return false;
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#addInput").click(function() {
            // Buat input baru dan tambahkan ke dalam "additionalInputs" div
            var newInput = '<input type="text" class="form-control mb-2" name="kbli_array[]" required />';
            $("#additionalInputs").append(newInput);
        });
        $("#removeInput").click(function() {
            // Hapus input terakhir dari "additionalInputs" div
            $("#additionalInputs input:last-child").remove();
        });
    });
</script>