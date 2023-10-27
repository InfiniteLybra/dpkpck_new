$(document).ready(function () {
    var current_fs, next_fs, previous_fs; // fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    setProgressBar(current);

    $(".next").click(function () {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // Hapus pesan kesalahan sebelumnya
        current_fs.find('.error-message').remove();

        // Pemeriksaan input
        var inputs = current_fs.find('input[required]');
        var allInputsFilled = true;

        inputs.each(function () {
            if ($(this).val() === "") {
                allInputsFilled = false;
                $(this).after('<div class="error-message">Harus diisi!</div>');
            }
        });

        if (!allInputsFilled) {
            // Tidak lanjut jika ada input yang belum terisi
            return;
        }

        // Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        // Show the next fieldset
        next_fs.show();
        // Hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now) {
                // For making fieldset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(++current);
        // Scroll ke atas dengan animasi
        $('html, body').animate({
            scrollTop: current_fs.offset().top
        }, 790); // Ubah nilai sesuai dengan kecepatan yang Anda inginkan
    });
    // Untuk tombol "Previous"
    $(".previous").click(function () {
        // ... (kode yang sudah ada)

        // Scroll ke atas dengan animasi
        $('html, body').animate({
            scrollTop: current_fs.offset().top
        }, 790); // Ubah nilai sesuai dengan kecepatan yang Anda inginkan
    });

    $(".previous").click(function () {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        // Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        // Show the previous fieldset
        previous_fs.show();

        // Hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now) {
                // For making fieldset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 500
        });
        setProgressBar(--current);
    });

    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
    }

    $(".submit").click(function () {
        var current_fs = $(this).parent();

        current_fs.find('.error-message').remove();

        var inputs = current_fs.find('input[required]');
        var allInputsFilled = true;

        inputs.each(function () {
            if ($(this).val() === "") {
                allInputsFilled = false;
                $(this).after('<div class="error-message">Harus diisi!</div>');
            }
        });

        if (allInputsFilled) {
            Swal.fire({
                title: "Apakah Anda Yakin?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3136b9",
                cancelButtonColor: "#9a9de4",
                confirmButtonText: "Ya, Saya Yakin",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        showConfirmButton: false,
                        timer: 1200,
                    });
    
                    $('#msform').submit();
                }
            });
        }
    })
});
