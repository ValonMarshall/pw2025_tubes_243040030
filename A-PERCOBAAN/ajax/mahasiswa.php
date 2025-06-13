<?php
require '../functions.php';

$keyword = $_GET ["keyword"];

$query = "SELECT * FROM mahasiswa2
                WHERE
            NIM LIKE '%$keyword%' OR
            Nama LIKE '%$keyword%' OR
            Email LIKE '%$keyword%' OR
            Jurusan LIKE '%$keyword%'
            ";
$mahasiswa = query ($query);
?>


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
        <a href="ubah.php?id=<?php echo $row["id"]; ?>">ubah</a> | 
        <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin?');">hapus</a>
      </td>
    </tr>
    
<?php $i++; ?>
<?php endforeach; ?>


  </table>