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
</script>
<script>
    // Ambil textarea preview berdasarkan nama atribut
    var previewTextarea = document.querySelector('[name="preview"]');

    // Ambil semua textarea yang memiliki atribut data-preview
    var sourceTextareas = document.querySelectorAll('[data-preview="preview"]');

    // Tambahkan event listener pada setiap textarea yang memiliki atribut data-preview
    sourceTextareas.forEach(function(textarea) {
        textarea.addEventListener('input', function() {
            var previewValue = '';

            // Gabungkan semua nilai dari textarea yang memiliki atribut data-preview
            sourceTextareas.forEach(function(sourceTextarea) {
                previewValue += sourceTextarea.value + '\n';
            });

            // Set nilai textarea preview dengan nilai yang telah digabungkan
            previewTextarea.value = previewValue;
        });
    });
</script>