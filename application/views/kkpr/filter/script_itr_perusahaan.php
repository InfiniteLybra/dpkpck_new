<script>
    "use strict";
    var KTCreateAccount = function() {
        var e, t, i, o, a, r, s = [];
        return {
            init: function() {
                (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e), (t = document.querySelector("#kt_create_account_stepper")) && (i = t.querySelector("#kt_create_account_form"), o = t.querySelector('[data-kt-stepper-action="submit"]'), a = t.querySelector('[data-kt-stepper-action="next"]'), (r = new KTStepper(t)).on("kt.stepper.changed", (function(e) {
                    4 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList.add("d-inline-block"), a.classList.add("d-none")) : 5 === r.getCurrentStepIndex() ? (o.classList.add("d-none"), a.classList.add("d-none")) : (o.classList.remove("d-inline-block"), o.classList.remove("d-none"), a.classList.remove("d-none"))
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
                        lokasi_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rt_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        rw_tanah: {
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
                        fotokopi_ktp: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        surat_kuasa: {
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
                        surat_tanah: {
                            validators: {
                                notEmpty: {
                                    message: "Harus Diisi!"
                                }
                            }
                        },
                        akte_pendidikan: {
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
                    s[3].validate().then(function(t) {
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
                url: "<?php echo site_url('Itr/get_kota'); ?>",
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
                url: "<?php echo site_url('Itr/get_kecamatan'); ?>",
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
                url: "<?php echo site_url('Itr/get_kelurahan'); ?>",
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
                url: "<?php echo site_url('Itr/get_kota'); ?>",
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
                url: "<?php echo site_url('Itr/get_kecamatan'); ?>",
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
                url: "<?php echo site_url('Itr/get_kelurahan'); ?>",
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
</script>