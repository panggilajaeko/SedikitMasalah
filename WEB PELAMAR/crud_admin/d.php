<?php
include '../koneksi/koneksi.php';

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berhasil Login</title>
</head>
<body>
  <div>
    <nav>
      <a href="logout.php">Logout</a>
      <form method="get">
        <input type="search" placeholder="Search" aria-label="Search" name="cari">
        <button type="submit" value="Cari">Search</button>
      </form>
    </nav>
  </div>

  <?php
  echo "<h1>Selamat Datang, " . $_SESSION['username'] . "!</h1>";
  ?>

  <div>
    <table>
      <thead>
        <tr>
          <th>NO</th>
          <th>FOTO PELAMAR</th>
          <th>NAMA</th>
          <th>JENIS KELAMIN</th>            
          <th>NAMA PANGGILAN</th>
          <th>PENDIDIKAN</th>
          <th>AGAMA</th>
          <th>NOMOR TELPHON</th>
          <th>EMAIL</th>
          <th>STATUS PERKAWINAN</th>
          <th>TANGGAL LAHIR</th>
          <th>ALAMAT</th>
          <th>RT</th>
          <th>RW</th>
          <th>NOMOR RUMAH</th>
          <th>KODE POS</th>
          <th>NOMOR TELPHON DARURAT</th>
          <th>HUBUNGAN NOMOR DARURAT</th>
          <th>NIK</th>
          <th>NOMER KK</th>
          <th>SELEKSI</th> 
          <th>HAPUS</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if(isset($_GET['cari'])){
          $cari = $_GET['cari'];
          $query = "SELECT * FROM tbl_lamaran WHERE nama LIKE '%$cari%' ORDER BY nama";
        } else {
          $query = "SELECT * FROM tbl_lamaran";	
        }
        $hasil = mysqli_query($koneksi, $query);
        $no = 1;
        while($data = mysqli_fetch_array($hasil)) { 
        ?>
        <tr>
          <td><?=$no;?></td>
          <td><img src="../foto/<?=$data['foto_pelamar'];?>" width="150px"></td>
          <td><?=$data['nama'];?></td> 
          <td><?=$data['jenis_kelamin'];?></td>
          <td><?=$data['nama_panggilan'];?></td>
          <td><?=$data['pendik'];?></td>
          <td><?=$data['agama'];?></td>
          <td><?=$data['nomer_telpon'];?></td>
          <td><?=$data['email'];?></td>
          <td><?=$data['status_perkawinan'];?></td>
          <td><?=$data['tanggal_lahir'];?></td>
          <td><?=$data['alamat'];?></td>
          <td><?=$data['rt'];?></td>
          <td><?=$data['rw'];?></td>
          <td><?=$data['nomor_rumah'];?></td>
          <td><?=$data['kode_pos'];?></td>
     <td><?=$data['nomer_telpon_darurat'];?></td>
     <td ><?=$data['hubungan_no_darurat'];?></td>
     <td><?=$data['no_ktp'];?></td>
   <td><?=$data['no_kk'];?></td>
   <td><a href="update.php?id=<?= $data['id']?>" class="btn btn-outline-success" "w-75 p-3>SELEKSI</a></td>
   <td><a href="hapus.php?id=<?= $data['id']?>"  class="btn btn-outline-danger">HAPUS</a></td>
   <?php $no++; ?>
  <?php }?>
</table>
</tbody>
</body>
</html>