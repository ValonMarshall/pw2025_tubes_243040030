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
$prof = query("SELECT * FROM professors WHERE id = $id") [0];

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
        <input type="hidden" name="id" value="<?= $prof ["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $prof ["gambar"]; ?>">
        <ul>
            <li>
                <label for="name">name : </label>
                <input type="text" name="name" id="name" required value ="<?= $prof["name"]; ?>">
            </li>
            <li>
                <label for="class">class : </label>
                <input type="text" name="class" id="class" required value ="<?= $prof["class"]; ?>">
            </li>
            <li>
                <label for="subclass">subclass : </label>
                <input type="text" name="subclass" id="subclass" required value ="<?= $prof["subclass"]; ?>">
            </li>
            <li>
                <label for="role">role : </label>
                <input type="text" name="role" id="role" required value ="<?= $prof["role"]; ?>">
            </li>
            <li>
                <label for="description">description : </label>
                <input type="text" name="description" id="description" required value ="<?= $prof["description"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <img src="img/<?= $prof['gambar']; ?>" width="40">
                <input type="file" name="gambar" id="gambar"; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>


    </form>



</body>
</html>