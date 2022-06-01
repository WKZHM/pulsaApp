const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal.fire({
        icon: 'success',
        title: 'Info',
        text : flashData
    }) 
}

//tombol hapus
$('.tombol-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah anda yakin',
        text: "Data ini dihapus?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      })
})