 <script>
     <?php if ($this->session->flashdata('sukses')) { ?>
         Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Sukses!',
            showConfirmButton: false,
            timer: 2000



         });
     <?php } ?>
 </script>

 <script>
     <?php if ($this->session->flashdata('pass_salah')) { ?>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Password lama yang anda masukan salah!'

         });
     <?php } ?>

     <?php if ($this->session->flashdata('pass_sama')) { ?>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Password yang baru Mohon tidak boleh sama dengan yang lama!'

         });
     <?php } ?>

     <?php if ($this->session->flashdata('pass_beda')) { ?>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Password yang baru Mohon tidak boleh sama dengan yang lama!'

         });
     <?php } ?>

     <?php if ($this->session->flashdata('belum_lengkap')) { ?>
         Swal.fire({
             icon: 'error',
             title: 'Gagal',
             text: 'Data gagal diproses! Semua data harus di input'


         });
     <?php } ?>
 </script>

 <script>
     $('.tombol-hapus').on('click', function(e) {

         e.preventDefault();
         const href = $(this).attr('href');

         Swal.fire({
             title: 'Apakah anda yakin?',
             text: "Data akan dihapus!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, hapus!'
         }).then((result) => {
             if (result.isConfirmed) {
                 document.location.href = href;

                 Swal.fire(
                     'Dihapus!!',
                     'Data berhasil dihapus.',
                     'success'
                 )
             }
         });
     })
 </script>

 <script>
     <?php if ($this->session->flashdata('pdf')) { ?>
         const Toast = Swal.mixin({
             toast: true,
             position: 'top-end',
             showConfirmButton: false,
             timer: 5000,
             timerProgressBar: true,
             didOpen: (toast) => {
                 toast.addEventListener('mouseenter', Swal.stopTimer)
                 toast.addEventListener('mouseleave', Swal.resumeTimer)
             }
         })

         Toast.fire({
             icon: 'error',
             title: 'Data Gagal di Update',
             title: 'File yang diupload harus dengan format PDF'
         });

     <?php } ?>
 </script>

 <script>



 </script>
 </body>

 </html>