<?php 
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_a_tubes_243040030');


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
    $name = htmlspecialchars($data ["name"]);
    $class = htmlspecialchars($data ["class"]);
    $subclass = htmlspecialchars($data ["subclass"]);
    $role = htmlspecialchars($data ["role"]);
    $description = htmlspecialchars($data ["description"]);
    $gambar = htmlspecialchars($data ["gambar"]);

    // upload gambar dulu
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

 // QUERY INSERT/CREATE DATA
    $query = "INSERT INTO professors (name, class, subclass, role, description, gambar)
                VALUES
                ('$name','$class','$subclass', '$role', '$description','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload() {
    $gambarFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES ['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload, apabila diharuskan ada gambar
    if ($error === 4 ) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $gambarFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar');
            </script>
            ";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranFile > 2000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar!');
            </script>
            ";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
         //generate gambar gambar baru
        $gambarFileBaru = uniqid();
        $gambarFileBaru .= '.';
        $gambarFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $gambarFile);

    return $gambarFile;
}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM professors WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    //htmlspecialchar, mengamankan dari input script html 
    $id = $data["id"];
    $name = htmlspecialchars($data ["name"]);
    $class = htmlspecialchars($data ["class"]);
    $subclass = htmlspecialchars($data ["subclass"]);
    $role = htmlspecialchars($data ["role"]);
    $description = htmlspecialchars($data ["description"]);
    $gambar = ($data ["gambar"]);
    $gambarLama =($data ["gambarLama"]);

    // /cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

 // QUERY INSERT/CREATE DATA
    $query = "UPDATE professors SET 
                name = '$name',
                class = '$class', 
                subclass = '$subclass', 
                role = '$role',
                description = '$description',
                gambar = '$gambar'
            WHERE id = '$id'
                ";

                
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}



function cari($keyword) {
    $query = "SELECT * FROM professors
                WHERE
                name LIKE '%$keyword%' OR
                class LIKE '%$keyword%' OR
                subclass LIKE '%$keyword%' OR
                role LIKE '%$keyword%' OR
                description LIKE '%$keyword%'
                gambar LIKE '%$keyword%' OR
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
