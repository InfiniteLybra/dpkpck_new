<script>
    // Fungsi untuk menyimpan draft otomatis saat perubahan input
    function saveDraft() {
        const draftForm = document.getElementById('kt_create_account_form');
        const formData = new FormData(draftForm);

        // Kirim data draft ke server
        fetch('<?= base_url('Kkpr/save_draft_lhs') ?>', {
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
    const inputElements = document.querySelectorAll('#tgl_survei,#petugas1,#petugas2,#koordinat,#luas_tanah_jalan,#guna_lahan,#batas_utara,#batas_selatan,#batas_barat,#batas_timur,#kemiringan_tanah,#fungsi_kelas_jalan,#keterangan1,#keterangan2,#keterangan3,#keterangan4,#keterangan5,#keterangan6,#rencana_pola_ruang,#radius_mata_air');
    inputElements.forEach(input => {
        input.addEventListener('input', saveDraft);
    });
    const selectElements = document.querySelectorAll('#masuk_lsd,#masuk_kp2b,#pihak_lain'); // Gantilah 'your_select_id_here' dengan ID elemen select Anda
    selectElements.forEach(select => {
        select.addEventListener('change', saveDraft); // Gunakan event 'change' untuk select
    });
    document.addEventListener('DOMContentLoaded', function() {
    const draftData = <?= json_encode($draft_data) ?>;
    for (const key in draftData) {
        if (draftData.hasOwnProperty(key)) {
            const element = document.getElementById(key);
            if (element) {
                element.value = draftData[key];
            }
        }
    }
});
</script>