<?php
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: login.php");
  exit;
}
require 'functions.php';


//pagination
//konfigurasi
    //jumlah halaman = total data / data per halaman
$jumlahDataPerHalaman = 3;
$halamanAktif = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

if (isset($_POST["cari"])) {
    $keyword = $_POST["keyword"];
    // Simpan keyword di URL agar bisa digunakan ulang saat pagination ditekan
    header("Location: ?keyword=" . urlencode($keyword) . "&halaman=1");
    exit;
}

$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";

if ($keyword) {
    $result = query("SELECT * FROM professors WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%'");
    $jumlahData = count($result);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

    // Ambil data sesuai halaman
    $professors = query("SELECT * FROM professors 
                        WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' 
                        LIMIT $awalData, $jumlahDataPerHalaman");
} else {
    $jumlahData = count(query("SELECT * FROM professors"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $professors = query("SELECT * FROM professors LIMIT $awalData, $jumlahDataPerHalaman");
}



// $professors = query ("SELECT * FROM professors LIMIT $awalData, $jumlahDataPerHalaman");
$professors = query ("SELECT * FROM professors");

// tombol cari ditekan
if ( isset($_POST ["cari"])) {
  $professors = cari($_POST["keyword"]);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar professor</title>
</head>

<body>

<!-- untuk logout -->
<a href="logout.php">Logout</a>
<br>
<br>

<!-- untuk registrasi -->
<a href="registrasi.php">registrasi</a>




  <h1>Daftar professors</h1>

<a href = "tambah.php">Tambah data professor</a>
<br><br>

<form action="" method="post">

<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
<button type="submit" name="cari" id="tombol-cari">Cari!</button>

</form>




<!-- navigasi halaman (pagination) -->

<?php if ($halamanAktif > 1): ?>
  <a href="?halaman=<?= $halamanAktif - 1; ?><?= $keyword ? '&keyword=' . urlencode($keyword) : '' ?>">&laquo;</a>
<?php endif; ?>

<?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
  <?php if($i == $halamanAktif): ?>
    <a href="?halaman=<?= $i; ?><?= $keyword ? '&keyword=' . urlencode($keyword) : '' ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
  <?php else: ?>
    <a href="?halaman=<?= $i; ?><?= $keyword ? '&keyword=' . urlencode($keyword) : '' ?>"><?= $i; ?></a>
  <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanAktif < $jumlahHalaman): ?>
  <a href="?halaman=<?= $halamanAktif + 1; ?><?= $keyword ? '&keyword=' . urlencode($keyword) : '' ?>">&raquo;</a>
<?php endif; ?>




<br>

<div id="container">

  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>id</th>
      <th>name</th>
      <th>class</th>
      <th>subclass</th>
      <th>role</th>
      <th>description</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ( $professors as $row ) :?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?= $row['name']?></td>
      <td><?= $row['class']?></td>
      <td><?= $row['subclass']?></td>
      <td><?= $row['role']?></td>
      <td><?= $row['description']?></td>
      <td><img src="img/<?php echo $row["gambar"]; ?>" width="50">
      </td>
      <td>
        <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> | 
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin?');">hapus</a>
      </td>
    </tr>
    
      <?php $i++; ?>
    <?php endforeach; ?>


  </table>

</div>
  
  

</body>

</html> 