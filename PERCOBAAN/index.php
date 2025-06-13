<?php
require 'functions.php';
$mahasiswa = query ("SELECT * FROM mahasiswa2")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>

<a href = "tambah.php">Tambah data mahasiswa</a>
<br><br>


  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th>id</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Jurusan</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach ( $mahasiswa as $row ) :?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?= $row['NIM']?></td>
      <td><?= $row['Nama']?></td>
      <td><?= $row['Email']?></td>
      <td><?= $row['Jurusan']?></td>
      <td><img src="img/<?php echo $row["gambar"]; ?>" width="50">
      </td>
      <td>
        <a href="">ubah</a> | 
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin?');">hapus</a>
      </td>
    </tr>
    
<?php $i++; ?>
<?php endforeach; ?>
  </table>
</body>

</html> 