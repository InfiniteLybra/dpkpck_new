<script>
    "use strict";
    var KTCreateAccount = function() {
        var e, t, i, o, a, r, s = [];
        return {
            init: function() {
                (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e), (t = document.querySelector("#kt_create_account_stepper")) && (i = t.querySelector("#kt_create_account_form"), o = t.querySelector('[data-kt-stepper-action="submit"]'), a = t.querySelector('[data-kt-stepper-action="next"]'), (r = new KTStepper(t)).on("kt.stepper.changed", (function(e) {
                    3 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList.add("d-inline-block"), a.classList.add("d-none")) : 5 === r.getCurrentStepIndex() ? (o.classList.add("d-none"), a.classList.add("d-none")) : (o.classList.remove("d-inline-block"), o.classList.remove("d-none"), a.classList.remove("d-none"))
                })), r.on("kt.stepper.next", (function(e) {
                    console.log("stepper.next");
                    var t = s[e.getCurrentStepIndex() - 1];
                    t ? t.validate().then((function(t) {
                        console.log("validated!"), "Valid" == t ? (e.goNext(), KTUtil.scrollTop()) : Swal.fire({
                            text: "Maaf, Semua form harus diisi!!!",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-light"
                            }
                        }).then((function() {
                            KTUtil.scrollTop()
                        }))
                    })) : (e.goNext(), KTUtil.scrollTop())
                })), r.on("kt.stepper.previous", (function(e) {
                    console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop()
                })), s.push(FormValidation.formValidation(i, {
                    fields: {
                        nama_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        provinsi_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kota_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kecamatan_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kelurahan_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        alamat_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rt_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rw_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        telp_pemohon: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        fotokopi_ktp: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })), s.push(FormValidation.formValidation(i, {
                    fields: {
                        nama_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        nib: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        skala_usaha: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        klasifikasi_resiko: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kbli: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        provinsi_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kota_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kecamatan_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kelurahan_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        alamat_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rt_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rw_perusahaan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        dokumen_oss: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        tdp_nib: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        npwp: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })), s.push(FormValidation.formValidation(i, {
                    fields: {
                        status_tanah_sm: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kota_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kecamatan_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        kelurahan_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        perluasan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        luas_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        peruntukan_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        file_status_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        peta_bidang: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rekomendasi_dinas_komunikasi: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        surat_dinas_perdagangan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        surat_dinas_peternakan: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        surat_pertamina: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        daftar_nama_kk: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        surat_fkub: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        dokumen_oss: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        shp: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                })), o.addEventListener("click", function(e) {
                    s[2].validate().then(function(t) {
                        console.log("validated!");
                        if (t === "Valid") {
                            e.preventDefault();
                            o.disabled = true;
                            o.setAttribute("data-kt-indicator", "on");
                            setTimeout(function() {
                                o.removeAttribute("data-kt-indicator");
                                o.disabled = false;
                                document.getElementById("kt_create_account_form").submit();
                            }, 2000);
                        } else {
                            Swal.fire({
                                text: "Maaf, Semua form harus diisi!!!",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then(function() {
                                KTUtil.scrollTop()
                            })
                        }
                    })
                }), $(i.querySelector('[name="card_expiry_month"]')).on("change", (function() {
                    s[3].revalidateField("card_expiry_month")
                })), $(i.querySelector('[name="card_expiry_year"]')).on("change", (function() {
                    s[3].revalidateField("card_expiry_year")
                })), $(i.querySelector('[name="business_type"]')).on("change", (function() {
                    s[2].revalidateField("business_type")
                })))
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTCreateAccount.init()
    }));
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
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    $(document).ready(function() {
        $("#status_tanah").on("input", function() {
            var rtValue = $(this).val();
            var namaPemohonContainer = $("#status_tanah_container");

            // Hapus semua form nama pemohon yang ada sebelumnya
            namaPemohonContainer.empty();

            // Buat form nama pemohon sesuai dengan nilai input number
            for (var i = 0; i < rtValue; i++) {
                var formNamaPemohon = '<div class="mb-3 row">' +
                    '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>' +
                    '<div class="col-md-9 col-sm-9">' +
                    '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />' +
                    '</div>' +
                    '</div>' +
                    '<div class="mb-3 row">' +
                    '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah <span class="required"></span></label>' +
                    '<div class="col-md-9 col-sm-9">' +
                    '<input type="file" id="file_status_tanah" name="file_status_tanah[]" class="form-control "accept=".jpg, .pdf">' +
                    '<small>File yang diterima hanya .jpg dan .pdf</small>' +
                    '</div>' +
                    '</div>';

                namaPemohonContainer.append(formNamaPemohon);
            }
        });
    });
    $(document).ready(function() {
        $("#jumlah_kbli").on("input", function() {
            var rtValue = $(this).val();
            var namaPemohonContainer = $("#kbli_container");

            // Hapus semua form nama pemohon yang ada sebelumnya
            namaPemohonContainer.empty();

            // Buat form nama pemohon sesuai dengan nilai input number
            for (var i = 0; i < rtValue; i++) {
                var formNamaPemohon = '<div class="mb-3 row">' +
                    '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">KBLI <span class="required"></span></label>' +
                    '<div class="col-md-9 col-sm-9">' +
                    '<input type="text" class="form-control mb-2" name="kbli_array[]" required />' +
                    '</div>' +
                    '</div>';

                namaPemohonContainer.append(formNamaPemohon);
            }
        });
    });
    $(document).ready(function() {
        $("#status_tanah").on("input", function() {
            var statusTanahValue = parseInt($(this).val());
            var FileStatusTanahContainer = $("#file_status_tanah_container");

            // Tampilkan form "Fotokopi KTP Pemohon" jika nilai status_tanah lebih dari 3
            if (statusTanahValue > 3) {
                FileStatusTanahContainer.show();
            } else {
                FileStatusTanahContainer.hide();
            }
        });
    });
    $(document).ready(function() {
        $("#pemilik_lahan_meninggal_y").on("change", function() {
            var selectedOption = $(this).val();
            var formPLM = $("#lahan_meninggal");

            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "1") {
                formPLM.show();
            } else {
                formPLM.hide();
            }
        });
    });
    $(document).ready(function() {
        $("#pemilik_lahan_meninggal_t").on("change", function() {
            var selectedOption = $(this).val();
            var formPLM = $("#lahan_meninggal");

            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "0") {
                formPLM.hide();
            } else {
                formPLM.hide();
            }
        });
    });
</script>
<script>
    // Fungsi untuk menyimpan draft otomatis saat perubahan input
    function saveDraft() {
        const draftForm = document.getElementById('kt_create_account_form');
        const formData = new FormData(draftForm);

        // Kirim data draft ke server
        fetch('<?= base_url('Kkpr/save_draft') ?>', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    console.log('Draft saved successfully.');
                } else {
                    console.error('Failed to save draft.');
                }
            })
            .catch(error => {
                console.error('An error occurred:', error);
            });
    }

    // Tambahkan event listener untuk input
    const inputElements = document.querySelectorAll('#nama_pemohon, #alamat_pemohon, #rt_pemohon, #rw_pemohon, #telp_pemohon,  #nama_kuasa, #alamat_kuasa, #rt_kuasa, #rw_kuasa, #telp_kuasa,  #nib, #peruntukan_tanah,#luas_tanah,#lokasi_tanah,#rt_tanah,#rw_tanah');
    inputElements.forEach(input => {
        input.addEventListener('input', saveDraft);
    });
    const selectElements = document.querySelectorAll('#provinsi_pemohon, #kota_pemohon, #kecamatan_pemohon, #kelurahan_pemohon,#provinsi_kuasa, #kota_kuasa, #kecamatan_kuasa, #kelurahan_kuasa,#skala_usaha,#klasifikasi_resiko, #status_tanah_sm,#perluasan,#kota_tanah,#kecamatan_tanah,#kelurahan_tanah'); // Gantilah 'your_select_id_here' dengan ID elemen select Anda
    selectElements.forEach(select => {
        select.addEventListener('change', saveDraft); // Gunakan event 'change' untuk select
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
//ATAS NAMA SENDIRI
    $(document).ready(function() {
        $("#id_st_1").on("change", function() {
            var selectedOption = $(this).val();
            var formANS = $("#dasar_surat_tanah");
            var formANOL = $("#surat_peralihan");
            var formS = $("#file_sertifikat");
            var formL = $("#file_letter");

            var formSM = $("#sewa_menyewa");
            var formFSSM = $("#file_sertifikat_sewa_menyewa");
            var formFLSM = $("#file_letter_sewa_menyewa");
            
            var formPK = $("#perjanjian_kerjasama");
            var formFSPK = $("#file_sertifikat_perjanjian_kerjasama");
            var formFLPK = $("#file_letter_perjanjian_kerjasama");

            var formPPJB = $("#ppjb");
            var formFSPPJB = $("#file_sertifikat_ppjb");
            var formFLPPJB = $("#file_letter_ppjb");

            var formAJB = $("#ajb");
            var formFSAJB = $("#file_sertifikat_ajb");
            var formFLAJB = $("#file_letter_ajb");

            var formAH = $("#akta_hibah");
            var formFSAH = $("#file_sertifikat_akta_hibah");
            var formFLAH = $("#file_letter_akta_hibah");

            var formAPH = $("#akta_pelepasan_hak");
            var formFSAPH = $("#file_sertifikat_akta_pelepasan_hak");
            var formFLAPH = $("#file_letter_akta_pelepasan_hak");

            var formKW = $("#keterangan_waris");
            var formFSKW = $("#file_sertifikat_keterangan_waris");
            var formFLKW = $("#file_letter_keterangan_waris");

            formANS.hide();
            formANOL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "atas_nama_sendiri") {
                formANS.show();

                formSM.hide();
                formFSSM.hide();
                formFLSM.hide();

                formPK.hide();
                formFSPK.hide();
                formFLPK.hide();

                formPPJB.hide();
                formFSPPJB.hide();
                formFLPPJB.hide();

                formAJB.hide();
                formFSAJB.hide();
                formFLAJB.hide();

                formAH.hide();
                formFSAH.hide();
                formFLAH.hide();

                formAPH.hide();
                formFSAPH.hide();
                formFLAPH.hide();

                formKW.hide();
                formFSKW.hide();
                formFLKW.hide();
            }else if (selectedOption === "atas_nama_orang_lain") {
                formANOL.show();
                formS.hide();
                formL.hide();
            } 
            else {
                formS.hide();
                formL.hide();
            }
        });
    });
    $(document).ready(function() {
        $("#id_st_2").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat");
            var formL = $("#file_letter");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanah").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanah").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanah").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanah .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahL").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahL").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahL").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahL .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//ATAS NAMA ORANG LAIN
    $(document).ready(function() {
        $("#id_st_3").on("change", function() {
            var selectedOption = $(this).val();
            var formSM = $("#sewa_menyewa");
            var formPK = $("#perjanjian_kerjasama");
            var formPPJB = $("#ppjb");
            var formAJB = $("#ajb");
            var formAH = $("#akta_hibah");
            var formAPH = $("#akta_pelepasan_hak");
            var formKW = $("#keterangan_waris");

            formSM.hide();
            formPK.hide();
            formPPJB.hide();
            formAJB.hide();
            formAH.hide();
            formAPH.hide();
            formKW.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sewa_menyewa") {
                formSM.show();
            }else if (selectedOption === "perjanjian_kerjasama") {
                formPK.show();
            }else if (selectedOption === "ppjb") {
                formPPJB.show();
            }else if (selectedOption === "ajb") {
                formAJB.show();
            }else if (selectedOption === "akta_hibah") {
                formAH.show();
            }else if (selectedOption === "akta_pelepasan_hak") {
                formAPH.show();
            }else if (selectedOption === "keterangan_waris") {
                formKW.show();
            }
             else {
                formLPK.show();
            }
        });
    });
//SEWA_MENYEWA
    $(document).ready(function() {
        $("#id_st_sewa_menyewa").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_sewa_menyewa");
            var formL = $("#file_letter_sewa_menyewa");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahSM").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahSM").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahSM").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahSM .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLSM").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLSM").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLSM").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLSM .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//PERJANJIAN KERJASAMA    
    $(document).ready(function() {
        $("#id_st_perjanjian_kerjasama").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_perjanjian_kerjasama");
            var formL = $("#file_letter_perjanjian_kerjasama");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahPK").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahPK").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahPK").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahPK .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLPK").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLPK").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLPK").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLPK .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//PPJB
    $(document).ready(function() {
        $("#id_st_ppjb").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_ppjb");
            var formL = $("#file_letter_ppjb");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahPPJB").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahPPJB").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahPPJB").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahPPJB .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLPPJB").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLPPJB").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLPPJB").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLPPJB .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//AJB
    $(document).ready(function() {
        $("#id_st_ajb").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_ajb");
            var formL = $("#file_letter_ajb");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahAJB").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahAJB").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahAJB").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahAJB .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLAJB").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLAJB").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLAJB").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLAJB .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//AKTA HIBAH
    $(document).ready(function() {
        $("#id_st_akta_hibah").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_akta_hibah");
            var formL = $("#file_letter_akta_hibah");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahAH").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahAH").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahAH").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahAH .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLAH").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLAH").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLAH").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLAH .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//AKTA PELEPASAN HAK
    $(document).ready(function() {
        $("#id_st_akta_pelepasan_hak").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_akta_pelepasan_hak");
            var formL = $("#file_letter_akta_pelepasan_hak");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahAPH").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahAPH").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahAPH").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahAPH .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLAPH").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLAPH").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLAPH").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLAPH .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//KETERANGAN WARIS
    $(document).ready(function() {
        $("#id_st_keterangan_waris").on("change", function() {
            var selectedOption = $(this).val();
            var formS = $("#file_sertifikat_keterangan_waris");
            var formL = $("#file_letter_keterangan_waris");

            formS.hide();
            formL.hide();
            // Tampilkan atau sembunyikan form berdasarkan pilihan
            if (selectedOption === "sertifikat") {
                formS.show();
            } else {
                formL.show();
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahKW").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah SHM/SHGB <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahKW").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahKW").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahKW .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
    $(document).ready(function() {
        var inputCount = 1; // Untuk melacak jumlah input yang ada
        $("#addInputtanahLKW").click(function() {
            // Buat input baru dengan ID yang unik
            var newInput = '<div class="newInput" id="input' + inputCount + '">';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Status Tanah <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="text" class="form-control mb-2" name="status_tanah_array[]" required />';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_perusahaan">Surat Tanah Letter C / Petok D <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_status_tanah[]" class="form-control" accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '<div class="mb-3 row">';
            newInput += '<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> Peta Bidang <span class="required"></span></label>';
            newInput += '<div class="col-md-9 col-sm-9">';
            newInput += '<input type="file" name="file_peta_bidang[]" class="form-control " accept=".jpg, .pdf">';
            newInput += '<small>File yang diterima hanya .jpg dan .pdf</small>';
            newInput += '</div>';
            newInput += '</div>';
            newInput += '</div>';

            // Tambahkan input baru ke dalam "additionalInputstanah" div
            $("#additionalInputstanahLKW").append(newInput);

            // Tingkatkan hitungan input
            inputCount++;
        });

        $("#removeInputtanahLKW").click(function() {
            if (inputCount > 1) { // Pastikan selalu ada minimal satu input
                // Hapus input terakhir dari "additionalInputstanah" div
                $("#additionalInputstanahLKW .newInput:last-child").remove();
                inputCount--; // Kurangi hitungan input
            }
        });
    });
//
</script>