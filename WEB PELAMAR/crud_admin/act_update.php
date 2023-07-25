<?php
include '../koneksi/koneksi.php';
$id = $_POST['id'];
$nama=$_POST['nama'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$nama_panggilan=$_POST['nama_panggilan'];
$pendik=$_POST['pendik'];
$agama=$_POST['agama'];
$nomer_telpon=$_POST['nomer_telpon'];
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

$allowed = array('png','jpg','jpeg');
$filename = $_FILES['foto_pelamar']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!empty($filename)) {
    $lokasi_file= $_FILES['foto_pelamar']['tmp_name'];
    $folder = "../foto/$filename";

    if (!in_array($ext,$allowed)) {
        echo "<script>
            alert('Ekstensi file yang kamu masukkan tidak di izinkan!');
            history.go(-1);
        </script>";
        exit;
    }

    $cek = "SELECT * FROM tbl_lamaran WHERE id='$id'";
    $ada = mysqli_query($koneksi,$cek);
    $data = mysqli_fetch_array($ada);

    if ($data) {
        $fotolama = $data['foto_pelamar'];
        unlink("../foto/$fotolama");
    }

    move_uploaded_file($lokasi_file,"$folder");
} else {
    $query_get_foto_lama = "SELECT foto_pelamar FROM tbl_lamaran WHERE id='$id'";
    $hasil_query = mysqli_query($koneksi, $query_get_foto_lama);
    $foto_lama = mysqli_fetch_array($hasil_query);
    $filename = $foto_lama[0];
}

$query = "UPDATE tbl_lamaran SET nama='$nama',jenis_kelamin='$jenis_kelamin',nama_panggilan='$nama_panggilan',pendik= '$pendik',agama='$agama',nomer_telpon='$nomer_telpon',status_perkawinan='$status_perkawinan',tanggal_lahir='$tanggal_lahir',alamat='$alamat',rt='$rt',rw='$rw',nomor_rumah='$nomor_rumah',kode_pos='$kode_pos',nomer_telpon_darurat='$nomer_telpon_darurat',hubungan_no_darurat='$hubungan_no_darurat',no_ktp='$no_ktp',no_kk='$no_kk',foto_pelamar='$filename' WHERE id='$id'";

$hasil = mysqli_query($koneksi,$query);

if ($hasil) {
    echo "<script>
        alert('Data berhasil diubah');
        window.location='index.php';
    </script>";
} else {
    echo "<script>
        alert('Data gagal diubah');
        history.go(-1);
    </script>";
}
?>
