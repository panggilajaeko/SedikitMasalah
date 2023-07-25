<?php 
// menghubungkan koneksi ke database
include '../koneksi/koneksi.php';

$id = $_GET['id'];

// untuk menghapus file gambar dari folder img
$cekGambar = "SELECT * FROM tbl_lamaran WHERE id='$id'";
$ada = mysqli_query($koneksi,$cekGambar);
$data = mysqli_fetch_array($ada);
if ($data) {
    # code...
  
    $fotoLama = $data['foto_pelamar'];
    unlink("../foto/$fotoLama");
    
    // query delete
    $query = "DELETE FROM tbl_lamaran WHERE id='$id'";
    $hasil = mysqli_query($koneksi,$query);
}


if ($hasil) {
    echo "<script>
    alert('Hapus data berhasil !');
    window.location='berhasil_login.php';
         </script>";
}else {
    echo "<script>
    alert('Hapus data gagal !');
    window.location='berhasil_login.php';
         </script>";
}
 ?>