<?php


// Koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_a_243040030');

// Query ke tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa" );

// ambil data (fetch mahasiswa dari object result)
// mysqli_fetch_row()  // mengembalikan array numerik
// mysqli_fetch_assoc()  // mengembalikan array associative
// mysqli_fetch_array()  // mengembalikan array keduanya
// mysqli_fetch_object()

// Ubah datanya ke dalam array
// $rows = [];
// while($row = mysqli_fetch_assoc($result)) {
//   $rows [] = $row;
// }
// // Simpan ke variabel mahasiswa
// $mahasiswa = $rows;
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <h1>Daftar Mahasiswa</h1>
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
    <?php while( $mhs = mysqli_fetch_assoc($result) ) :?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?= $mhs['NIM']?></td>
      <td><?= $mhs['Nama']?></td>
      <td><?= $mhs['Email']?></td>
      <td><?= $mhs['Jurusan']?></td>
      <td><img src="img/<?php echo $mhs["gambar"]; ?>" width="50">
      </td>
      <td>
        <a href="">ubah</a> | <a href="">hapus</a>
      </td>
    </tr>
<?php $i++; ?>
<?php endwhile; ?>
  </table>
</body>

</html> 