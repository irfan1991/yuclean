<script>
$(document).ready(function() {
  swal({
     title: "Sukses",
     text: "Berhasil menambahkan <strong>{{ $barang_name }}</strong> ke cart!",
     type: "success",
     showCancelButton: false,
    confirmButtonColor: "#63BC81",
    confirmButtonText: "Lanjutkan belanja",
   // cancelButtonText: "Lanjutkan belanja",
     html: true
  },

   function(isConfirm) {
      if (isConfirm) {
         window.location = '{{url('/cata')}}';
      }
  });
});
</script>
