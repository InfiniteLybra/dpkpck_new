<script>
    // Fungsi untuk menyimpan draft otomatis saat perubahan input
    function saveDraft() {
        const draftForm = document.getElementById('draftForm');
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
    const inputElements = document.querySelectorAll('#name, #email, #message');
    inputElements.forEach(input => {
        input.addEventListener('input', saveDraft);
    });
    const selectElements = document.querySelectorAll('#kelamin'); // Gantilah 'your_select_id_here' dengan ID elemen select Anda
    selectElements.forEach(select => {
        select.addEventListener('change', saveDraft); // Gunakan event 'change' untuk select
    });
</script>