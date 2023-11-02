<script>
    // Fungsi untuk menyimpan draft otomatis saat perubahan input
    function saveDraft() {
        const draftForm = document.getElementById('kt_create_account_form');
        const formData = new FormData(draftForm);

        // Kirim data draft ke server
        fetch('<?= base_url('Kkpr/save_draft_peta_draft') ?>', {
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
    const inputElements = document.querySelectorAll('#koordinat_tengah');
    inputElements.forEach(input => {
        input.addEventListener('input', saveDraft);
    });
    const selectElements = document.querySelectorAll(''); // Gantilah 'your_select_id_here' dengan ID elemen select Anda
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