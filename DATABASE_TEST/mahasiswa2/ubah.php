<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: login.php");
  exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];
// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa2 WHERE id = $id") [0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset ($_POST ["submit"]) ) {

    // cek apakah data berhasil diubah atau tidak
    if ( ubah($_POST) > 0) {
        echo "
            <script>
                alert ('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "<script>
                alert ('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Ubah data mahasiswa</title>
</head>
<body>
    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mhs ["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs ["gambar"]; ?>">
        <ul>
            <li>
                <label for="NIM">NIM : </label>
                <input type="text" name="NIM" id="NIM" required value ="<?= $mhs["NIM"]; ?>">
            </li>
            <li>
                <label for="Nama">Nama : </label>
                <input type="text" name="Nama" id="Nama" required value ="<?= $mhs["Nama"]; ?>">
            </li>
            <li>
                <label for="Email">Email : </label>
                <input type="text" name="Email" id="Email" required value ="<?= $mhs["Email"]; ?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan : </label>
                <input type="text" name="Jurusan" id="Jurusan" required value ="<?= $mhs["Jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <img src="img/<?= $mhs['gambar']; ?>" width="40">
                <input type="file" name="gambar" id="gambar"; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>


    </form>



</body>
</html>