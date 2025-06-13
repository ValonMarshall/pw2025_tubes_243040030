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

    // upload gambar dulu
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

 // QUERY INSERT/CREATE DATA
    $query = "INSERT INTO mahasiswa2 (NIM, Nama, Email, Jurusan, gambar)
                VALUES
                ('$NIM','$Nama','$Email','$Jurusan','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES ['gambar']['error'];
    $tmpNama = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload, apabila diharuskan ada gambar
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>
            ";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
         //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFile);

    return $namaFile;
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa2 WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    //htmlspecialchar, mengamankan dari input script html 
    $id = $data["id"];
    $NIM = htmlspecialchars($data ["NIM"]);
    $Nama = htmlspecialchars($data ["Nama"]);
    $Email = htmlspecialchars($data ["Email"]);
    $Jurusan = htmlspecialchars($data ["Jurusan"]);
    $gambarLama = htmlspecialchars($data ["gambarLama"]);

    // /cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

 // QUERY INSERT/CREATE DATA
    $query = "UPDATE mahasiswa2 SET 
                NIM = '$NIM',
                Nama = '$Nama',
                Email = '$Email', 
                Jurusan = '$Jurusan', 
                gambar = '$gambar'
            WHERE id = $id
                ";
               
                
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


function cari($keyword) {
    $query = "SELECT * FROM mahasiswa2
                WHERE
                NIM LIKE '%$keyword%' OR
                Nama LIKE '%$keyword%' OR
                Email LIKE '%$keyword%' OR
                Jurusan LIKE '%$keyword%' OR
                gambar LIKE '%$keyword%'
            ";
            return query ($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert ('username sudah terdaftar');
            </script>";
        return false;
    }

    
    //cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert ('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    //tambahkan user baru ke database
    mysqli_query ($conn, "INSERT INTO user (username, password) VALUES ('$username', '$password')");

    return mysqli_affected_rows($conn);


}


?>
