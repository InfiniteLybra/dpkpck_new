    document.addEventListener("DOMContentLoaded", function () {
        const acceptButtons = document.querySelectorAll(".acc-button");
        acceptButtons.forEach(function (button) {
        button.addEventListener("click", function () {
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
                text: "Data berhasil diterima.",
                showConfirmButton: false,
                timer: 1200,
                });
            }
            });
        });
        });

        const rejectButtons = document.querySelectorAll(".reject-button");
        rejectButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Data ini akan terhapus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e6381a",
            cancelButtonColor: "#9a9de4",
            confirmButtonText: "Ya, Saya Yakin",
            cancelButtonText: "Batal",
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text:"Data berhasil ditolak.",
                showConfirmButton: false,
                timer: 1200,
                });
            }
            });
        });
        });
    });

    const rejectButtons = document.querySelectorAll(".warning-button");
    rejectButtons.forEach(function (button) {
    button.addEventListener("click", function () {
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
        }
        });
    });
    });

    const logoutButtons = document.querySelectorAll(".logout-button");
    logoutButtons.forEach(function (button) {
    button.addEventListener("click", function () {
        Swal.fire({
        title: "Apakah Anda Yakin?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#e6381a",
        cancelButtonColor: "#9a9de4",
        confirmButtonText: "Log Out",
        cancelButtonText: "Batal",
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            icon: "success",
            title: "Berhasil Log Out!",
            showConfirmButton: false,
            timer: 1200,
            });
        }
        });
    });
    });