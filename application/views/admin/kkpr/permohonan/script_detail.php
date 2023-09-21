<script>
    $(document).ready(function() {
        $("#buka_st").click(function() {
            // Buat input baru dan tambahkan ke dalam "additionalInputs" div
            var newInput = $("#table_surat_tanah"); 
            newInput.show();
        });
        $("#tutup_st").click(function() {
            // Hapus input terakhir dari "additionalInputs" div
            var newInput = $("#table_surat_tanah");  
            newInput.hide();
        });
    });
</script>