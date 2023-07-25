<?php 
include '../koneksi/koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM tbl_lamaran WHERE id ='$id' ";
$hasil = mysqli_query($koneksi,$query);
$data = mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style_from.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap">

    <title>edit data</title>
</head>
<body>
  <form action="act_update.php" method="post" enctype="multipart/form-data">

<!-- id -->
  <input type="hidden" name="id" value="<?= $data['id']; ?>">

  <!-- nama -->
    <label>nama</label>
    <input type="text" name="nama" value="<?= $data['nama']; ?>">
    <br><br>

<!-- jenis kelamin -->
    <label for="">Jenis Kelamin</label>
    <?php if ($data['jenis_kelamin'] == "laki-laki") {?>
        <input type="radio" name="jenis_kelamin" value="laki-laki" checked>laki-laki
        <input type="radio" name="jenis_kelamin" value="perempuan">perempuan
        <?php }else{?>
            <input type="radio" name="jenis_kelamin" value="laki-laki" >laki-laki
            <input type="radio" name="jenis_kelamin" value="perempuan" checked>perempuan
            <?php } ?>
            <br><br>
            <!-- nama panggilan -->
            <label>nama panggilan</label>
            <input type="text" name="nama_panggilan" value="<?= $data['nama_panggilan']; ?>">
<br><br>
<!-- pendidikan -->
<label for="">pendidikan terakhir</label>
<input type="text" name="pendik" id="" value="<?=$data['pendik']; ?>">
            <br><br>
            <!-- agama -->
            <label>agama</label>
            <select class="form-select" aria-label="Default select example" name="agama">
<?php  if ($data['agama'] == "tidak memilih") { ?>      
  <option selected value="tidak memilih">Agama</option>
  <option value="kristen">kristen</option>
  <option value="islam">islam</option>
  <option value="hindu">hindu</option>
  <option value="buddha">buddha</option>
<?php }
elseif($data['agama']== "kristen"){ ?>
    <option value="tidak memilih">Agama</option>
    <option selected value="kristen">kristen</option>
  <option value="islam">islam</option>
  <option value="hindu">hindu</option>
  <option value="buddha">buddha</option>
<?php }
elseif($data['agama']=="islam"){ ?>
  <option value="tidak memilih">Agama</option>
  <option value="kristen">kristen</option>
  <option selected value="islam">islam</option>
  <option value="hindu">hindu</option>
  <option value="buddha">buddha</option>
<?php }
elseif($data['agama']== "hindu"){ ?>
    <option value="tidak memilih">Agama</option>
    <option value="kristen">kristen</option>
    <option value="islam">islam</option>
    <option selected value="hindu">hindu</option>
    <option value="buddha">buddha</option>
<?php }
else{ ?>
      <option value="tidak memilih">Agama</option>
      <option value="kristen">kristen</option>
      <option value="islam">islam</option>
      <option  value="hindu">hindu</option>
      <option selected value="buddha">buddha</option>
<?php } ?>
    </select>
    <br><br>
<!-- nomer telpon -->
    <label>nomor telpon</label>
    <input type="number" name="nomer_telpon" value="<?= $data['nomer_telpon']; ?>">
    <br><br>
    <!-- email -->
    <label>email</label>
    <input type="text" name="email" value="<?= $data['email']; ?>">
    <br><br>
    <label>status perkawinan</label>
    <select name="status_perkawinan">
    <?php  if ($data['status_perkawinan'] == "0") { ?>      
  <option selected value="0">status perkawinan</option>
  <option value="sudah menikah">sudah menikah</option>
  <option value="belum menikah">belum menikah</option>
  <option value="menikah anak 1">menikah anak 1</option>
  <option value="menikah anak 2">menikah anak 2</option>
  <option value="menikah anak 3">menikah anak 3 atau lebih</option>
  <?php }
  elseif($data['status_perkawinan']== "sudah menikah"){ ?> 
  <option value="0">status perkawinan</option>
  <option selected value="sudah menikah">sudah menikah</option>
  <option value="belum menikah">belum menikah</option>
  <option value="menikah anak 1">menikah anak 1</option>
  <option value="menikah anak 2">menikah anak 2</option>
  <option value="menikah anak 3">menikah anak 3 atau lebih</option>
  <?php }
  elseif($data['status_perkawinan']== "belum menikah"){ ?> 
  <option value="0">status perkawinan</option>
  <option value="sudah menikah">sudah menikah</option>
  <option selected value="belum menikah">belum menikah</option>
  <option value="menikah anak 1">menikah anak 1</option>
  <option value="menikah anak 2">menikah anak 2</option>
  <option value="menikah anak 3">menikah anak 3 atau lebih</option>
  <?php }
  elseif($data['status_perkawinan']== "menikah anak 1"){ ?> 
  <option value="0">status perkawinan</option>
  <option value="sudah menikah">sudah menikah</option>
  <option value="belum menikah">belum menikah</option>
  <option selected value="menikah anak 1">menikah anak 1</option>
  <option value="menikah anak 2">menikah anak 2</option>
  <option value="menikah anak 3">menikah anak 3 atau lebih</option>
  <?php }
  elseif($data['status_perkawinan']== "menikah anak 2"){ ?> 
  <option value="0">status perkawinan</option>
  <option value="sudah menikah">sudah menikah</option>
  <option value="belum menikah">belum menikah</option>
  <option value="menikah anak 1">menikah anak 1</option>
  <option selected value="menikah anak 2">menikah anak 2</option>
  <option value="menikah anak 3">menikah anak 3 atau lebih</option>
  <?php }
  else{ ?> 
  <option value="0">status perkawinan</option>
  <option value="sudah menikah">sudah menikah</option>
  <option value="belum menikah">belum menikah</option>
  <option value="menikah anak 1">menikah anak 1</option>
  <option value="menikah anak 2">menikah anak 2</option>
  <option selected value="menikah anak 3">menikah anak 3 atau lebih</option>
      <?php } ?>
    </select>
    <br><br>
  <label>Tanggal lahir :</label>
        <input type="date" name="tanggal_lahir" value="<?= $tanggal; ?>">
        <br><br>
        <label>alamat</label>
    <input type="text" name="alamat" value="<?= $data['alamat']; ?>">
    <br><br>
    <label>RT</label>
    <input type="number" name="rt" value="<?= $data['rt']; ?>">
    <br><br>
    <label>RW</label>
    <input type="number" name="rw" value="<?= $data['rw']; ?>">
    <br><br>
    <label>nomor rumah</label>
    <input type="number" name="nomor_rumah" value="<?= $data['nomor_rumah']; ?>">
    <br><br>
    <label>kode pos</label>
    <input type="number" name="kode_pos" value="<?= $data['kode_pos']; ?>">
    <br><br>
    <label>nomor telpon darurat</label>
    <input type="number" name="nomer_telpon_darurat" value="<?= $data['nomer_telpon_darurat']; ?>">
    <br><br>
    <label>hubungan no darurat</label>
    <input type="text" name="hubungan_no_darurat" value="<?= $data['hubungan_no_darurat']; ?>">
    <br><br>    

    <label>no_ktp</label>
    <input type="text" name="no_ktp" value="<?= $data['no_ktp']; ?>">
    <br><br>

    <label>no_kk</label>
    <input type="text" name="no_kk" value="<?= $data['no_kk']; ?>">
    <br><br>
        
        <!-- foto pelamar -->
        <?php if ($data['foto_pelamar']=="") { ?>  
          <label>Foto pelamar :</label>
        <input type="file" name="foto_pelamar" value="<?= $data['foto_pelamar']; ?>">      
        <?php }else{ ?>
        <img src="../crud_pelamar/foto/ <?= $data['foto_pelamar'] ?>" alt="<?= $data['foto_pelamar'] ?>" width="100"> <label>Foto pelamar :</label>
        <input type="file" name="foto_pelamar" value="<?= $data['foto_pelamar']; ?>">
        <br><br>
        <?php } ?>
        

    <button type="submit" name="submit">kirim</button>
  </form>
</body>
</html>