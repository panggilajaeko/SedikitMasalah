<?php
require '../koneksi/koneksi.php';
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$nama_panggilan=$_POST['nama_panggilan'];
$pendik=$_POST['pendik'];
$agama=$_POST['agama'];
$nomer_telpon=$_POST['nomer_telpon'];
$email=$_POST['email'];
$status_perkawinan=$_POST['status_perkawinan'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$alamat=$_POST['alamat'];
$rt=$_POST['rt'];
$rw=$_POST['rw'];
$nomor_rumah=$_POST['nomor_rumah'];
$kode_pos=$_POST['kode_pos'];
$nomer_telpon_darurat=$_POST['nomer_telpon_darurat'];
$hubungan_no_darurat = $_POST['hubungan_no_darurat'];
$no_ktp= $_POST['no_ktp'];
$no_kk= $_POST['no_kk'];

$allowed = array('png','jpg','jpeg',);

$lokasi_file = $_FILES['foto_pelamar']['tmp_name'];


$filename = $_FILES['foto_pelamar']['name'];


$ext = pathinfo ($filename, PATHINFO_EXTENSION);


$folder = "../foto/$filename";


if($filename == "") {

    // $query = "INSERT INTO tbl_siswa(nisn,nama,jenkel,kelas,tgl_lahir,hobi,foto)VALUES('$nisn','$nama','$jenkel',
    // '$kelas','$tanggallahir','$hobi','$filename')";
    // mysqli_query($koneksi, $query);
    echo "<script>
          alert('simpan database gagal');
          window.location='index.php';
          </script>";
  
  }


else {

    move_uploaded_file($lokasi_file,"$folder");

    $query = "INSERT INTO tbl_lamaran(nama,jenis_kelamin,nama_panggilan,pendik,agama,nomer_telpon,email,status_perkawinan,tanggal_lahir,alamat,rt,rw,nomor_rumah,kode_pos,nomer_telpon_darurat,hubungan_no_darurat,no_ktp,no_kk,foto_pelamar) VALUES ('$nama','$jenis_kelamin','$nama_panggilan','$pendik','$agama','$nomer_telpon','$email','$status_perkawinan','$tanggal_lahir','$alamat','$rt','$rw','$nomor_rumah','$kode_pos','$nomer_telpon_darurat','$hubungan_no_darurat','$no_ktp','$no_kk','$filename')";

    $hasil = mysqli_query($koneksi,$query);
    echo "<script>
    alert('simpan database berhasil');
    window.location='index.php';
    </script>";
    

}
    

 ?>