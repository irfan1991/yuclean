<script>
$(document).ready(function() {
  swal({
     title: "Sukses",
     text: "Berhasil menambahkan <strong>{{ $barang_name }}</strong> ke cart!",
     type: "success",
     showCancelButton: true,
     confirmButtonColor: "#63BC81",
     confirmButtonText: "Konfirmasi pesanan",
     cancelButtonText: "Lanjutkan belanja",
     html: true
  }, function(isConfirm) {
      if (isConfirm) {
          window.location = '{{url('/cart')}}';
      }
  });
});
</script>
