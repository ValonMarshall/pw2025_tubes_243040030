<?php 
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');


function query ($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows [] = $row;
    }
    return $rows;
}


function tambah ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    //htmlspecialchar, mengamankan dar input script html 
    $NIM = htmlspecialchars($data ["NIM"]);
    $Nama = htmlspecialchars($data ["Nama"]);
    $Email = htmlspecialchars($data ["Email"]);
    $Jurusan = htmlspecialchars($data ["Jurusan"]);
    $gambar = htmlspecialchars($data ["gambar"]);

 // QUERY INSERT/CREATE DATA
    $query = "INSERT INTO mahasiswa2 (NIM, Nama, Email, Jurusan, gambar)
                VALUES
                ('$NIM','$Nama','$Email','$Jurusan','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa2 WHERE id = $id");
    return mysqli_affected_rows($conn);
}




?>
