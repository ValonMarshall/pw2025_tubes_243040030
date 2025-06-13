<?php 
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: ../auth/login.php");
  exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset ($_POST ["submit"]) ) {
    
   

    // cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert ('data berhasil ditambahkan!');
                document.location.href = '../admin/admin-index.php';
            </script>
        ";
    } else {
        echo "<script>
                alert ('data gagal ditambahkan!');
                document.location.href = '../admin/admin-index.php';
            </script>
        ";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Tambah data professor</title>
</head>
<body>
    <h1>Tambah data professor</h1>

    <!-- UPLOAD// enctype seakan akan formnya punya 2 jalur -->
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" required>
            </li>
            <li>
                <label for="class">class : </label>
                <input type="text" name="class" id="class" required>
            </li>
            <li>
                <label for="subclass">subclass : </label>
                <input type="text" name="subclass" id="subclass" required>
            </li>
            <li>
                <label for="role">role : </label>
                <input type="text" name="role" id="role" required>
            </li>
            <li>
                <label for="description">description : </label>
                <input type="text" name="description" id="description" required>
            </li>
            <li>
                <label for="gambar">gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>


    </form>









</body>
</html>