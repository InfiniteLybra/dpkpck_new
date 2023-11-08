<script>
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
    $('#btn-tambah').click(function(event){
      var form = new FormData($('#form_tambah')[0]);
      $.ajax({
        type: "post",
        data:form,
        url:'<?php echo base_url('Siswa/tambah_data_siswa') ?>',
        dataType: 'json',
        cache:'false',
        contentType: false,
        processData: false,
        success: function(hasil){

          if (hasil.hasil) {
            $('#insert').hide('slow');
            location.reload();
          }
        }
      });
    });

    $('#btn-edit').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_edit':$('#form_edit').serialize()},
      url:'<?php echo base_url('User/proses_edit') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#edit').hide('slow');
        window.location.href = '<?php echo base_url('NotifikasiKelolaUser.html') ?>';
      }
    }
  });
   });
    $('#btn-delete').click(function(event){
     $.ajax({
      type: "post",
      data:{'form_delete':$('#form_delete').serialize()},
      url:'<?php echo base_url('User/proses_delete') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){

       if (hasil.hasil) {
        $('#hapus').hide('slow');
        window.location.href = '<?php echo base_url('NotifikasiKelolaUser.html') ?>';
      }
    }
  });
   });

    function get_user(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('User/get_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
       $('[name="nama"]').val(hasil['nama_lengkap']);      
       $('[name="username"]').val(hasil['username']);      
       $('[name="password"]').val(hasil['password']);
     }
   });
   }
    function get_id_delete(x){
     $.ajax({
      type: "post",
      data:'id='+x,
      url:'<?php echo base_url('User/get_user') ?>',
      dataType: 'json',
      cache:'false',
      success: function(hasil){
       $('[name="id"]').val(hasil['id']);
     }
   });
   }
</script>