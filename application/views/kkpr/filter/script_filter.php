<script>
    // document.getElementById("formulir").addEventListener("change", function() {
    //     var selectedOption = this.value;
    //     var formKKPR = document.getElementById("form_kkpr");
    //     var formITR = document.getElementById("form_itr");

    //     // Sematikan form yang tidak dipilih
    //     formKKPR.style.display = "none";
    //     formITR.style.display = "none";

    //     // Tampilkan form yang sesuai berdasarkan pilihan
    //     if (selectedOption === "kkpr") {
    //         $('.kkpr:visible').fadeOut();
    //         // fade in new selected subcontent
    //         $('.kkpr').fadeIn();
    //     } else if (selectedOption === "itr") {
    //         formITR.style.display = "block";
    //     }
    // });
</script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script>
    $(document).ready(function() {
        $("#umk").on("change", function() {
            var selectedOption = $(this).val();
            var form = $("#pengajuan");        

            // Sematikan form yang tidak dipilih
            form.hide();

            // Tampilkan form yang sesuai berdasarkan pilihan
            if (selectedOption === "umk") {
                form.show();
            } else if (selectedOption === "non_umk") {
                form.show();
            }
        });
        $("#formulir").on("change", function() {
            var selectedOption = $(this).val();
            var formKKPR = $("#form_kkpr");
            var formITR = $("#form_itr");

            // Sematikan form yang tidak dipilih
            formKKPR.hide();
            formITR.hide();

            // Tampilkan form yang sesuai berdasarkan pilihan
            if (selectedOption === "kkpr") {
                formKKPR.show();
            } else if (selectedOption === "itr") {
                formITR.show();
            }
        });
    });
    $(document).ready(function() {
        $("#id_pengajuan").on("change", function() {
            var selectedText = $(this).find("option:selected").text();
            $("#isi_pengajuan").val(selectedText);
        });
    });
    $(document).ready(function() {
        $("#id_pengajuan").on("change", function() {
            var selectedOption = $(this).val();
            var form = $("#lainyaInput");           

            // Sematikan form yang tidak dipilih
            form.hide();            

            // Tampilkan form yang sesuai berdasarkan pilihan
            if (selectedOption === "lainya") {
                form.show();
            } else{
                form.hide();
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
      $('#modalPersiapan').modal('show');
    });
  </script>