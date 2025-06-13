<?php
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["role"] != "admin") {
  header ("Location: ../auth/login.php");
  exit;
}
require '../functions/functions.php';





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
    $result = query("SELECT * FROM professors WHERE name LIKE '%$keyword%' 
                                                OR class LIKE '%$keyword%' 
                                                OR subclass LIKE '%$keyword%'
                                                OR role LIKE '%$keyword%'");
    
    $jumlahData = count($result);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

    // Ambil data sesuai halaman
    $professors = query("SELECT * FROM professors 
                        WHERE name LIKE '%$keyword%' 
                        OR class LIKE '%$keyword%' 
                        OR subclass LIKE '%$keyword%'
                        OR role LIKE '%$keyword%'
                        LIMIT $awalData, $jumlahDataPerHalaman");
} else {
    $jumlahData = count(query("SELECT * FROM professors"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $professors = query("SELECT * FROM professors LIMIT $awalData, $jumlahDataPerHalaman");
}


$professors = query ("SELECT * FROM professors LIMIT $awalData, $jumlahDataPerHalaman");

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
  <title>Daftar professors</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/index-admin.css" rel="stylesheet">
</head>

<body>


<div class="main-container">


<!-- navbar -->

    <div class="navbar">

        <img class="navbar-background" src="../img/icons/navbar/img_bkg_front.png" alt="">

        <div class="tabs">
        
            <div class="all-sm-btn">
                <div class="home sm-btn">
                    <div class="btn-home">
                        <a href="admin-index.php">
                            <img src="../img/icons/navbar/img_sp_char_mission.png" alt="">
                            <span>Home</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="about sm-btn">
                    <div class="btn-about">
                        <a href="../profile/profile.php">
                            <img src="../img/icons/navbar/img_icon_rb.png" alt="">
                            <span>About</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="skills sm-btn">
                    <div class="btn-classes">
                        <a href="../user/class-list.php">
                            <img src="../img/icons/navbar/img_btn_squad.png" alt="">
                            <span>Classes</span>
                        </a>
                    </div>
            
                </div>
            </div>
            
            <div class="all-lg-btn">
                <div class="projects lg-btn">
                    <div class="btn-news">
                        <a href="../user/news.php">
                            <img src="../img/icons/navbar/img_btn_mission.png" alt="">
                            <span>News</span>
                        </a>
                    </div>
                </div>
    
                <div class="contact lg-btn">
                    <div class="btn-contact">
                        <a href="../user/contact.php">
                            <img src="../img/icons/navbar/img_btn_friend.png" alt="">
                            <span>Contacts</span>
                        </a>
                    </div>
                </div>

                <div class="login lg-btn">
                    <div class="login-btn">
                        <a href="../auth/logout.php">
                            <img src="../img/icons/navbar/exit.png" alt="">
                            <span>Logout</span>
                        </a>
                    </div>
                </div>

                <div class="login lg-btn">
                    <div class="login-btn">
                        <a href="../auth/login.php">
                            <img src="../img/icons/navbar/btn_reconnect.png" alt="">
                            <span>Login</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- navbar menu -->
    <div class="menu-btn">
        <a href="admin-index.php">
        <img class="back-to-home" src="../img/icons/navbar/btn_topmenu_back.png" alt="">
        </a>
        <img class="home-btn" src="../img/icons/navbar/btn_topmenu_home.png" alt="">
    </div>



<!-- CONTAINERS -->

<div class=" container-1">

  <div class=" container-1-1 row">

    <div class="con-sisi con-sisi-kanan col-2">
        <div class="logo-sisi">
            <img src="../img/class/Vanguard_white.png" alt="">
            <img src="../img/class/Guard_white.png" alt="">
            <img src="../img/class/Defender_white.png" alt="">
            <img src="../img/class/Sniper_white.png" alt="">
        </div>
    </div>

    <div class="con-sisi-tengah col-8">

    <div class="con-1-1-tengah row">
        <div class="main-title col">
            <div class="title-img">
                <img src="../img/icons/arknights.png" alt="">
            </div>

        <div class="title-span">
            <Span>RHODES ISLAND TRAINING ACADEMY</Span>
        </div>

        <div class="title-logo">
            <div class="logo-img">
            <img src="../img/logo/Rhodes_02.1.png" alt="">
            </div>
        </div>

        <div class="title-login">
            <img src="../img/icons/navbar/btn_reconnect.png" alt="">
            <span>
                <a href="../auth/registrasi.php">Register</a> | <a href="../auth/login.php">Login</a>
            </span>
        </div>
    </div>
    </div>

</div>


    <div class="con-sisi con-sisi-kanan col-2">
        <div class="logo-sisi">
            <img src="../img/class/Caster_white.png" alt="">
            <img src="../img/class/Medic_white.png" alt="">
            <img src="../img/class/Supporter_white.png" alt="">
            <img src="../img/class/Specialist_white.png" alt="">
        </div>
    </div>

    </div>

    <div class="container-1-2">

    <div class="row">

        <div class="profile col-4">
            <div class="Doctor">
                <img src="../img/Operators/Doctor1.png" alt="">
            </div>
        </div>

        <div class="recruit-desc container col-8">
            <span>Join Us, For The Peace Of Terra</span>
            <p>
                Rhodes Island is currently expanding its operational divisions in response to ongoing global instability and Originium-related crises. We are seeking highly motivated individuals willing to serve in logistics, medical, and front-line combat roles. Whether you're infected or not, if you carry the will to protect, to heal, and to fight — there is a place for you with us.
            </p>
        </div>
    </div>
</div>



    <div class="container-1-3 ">
        <div class="professor">
            <div class="prof-container">
        
                <div class="prof-list">
                    <span>Professors and Trainers of Rhodes Island</span>
                </div>


<!-- navigasi halaman (pagination) -->
<div class="pagination">
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
</div>


                <div class="prof-cards">
                    
<!-- form pencarian -->
<form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian..." autocomplete="off" id="keyword">
    <button type="submit" name="cari" id="tombol-cari">Cari!</button>
</form>


<div class="tambah-data-container">
    <div class="tambah-data">
        <a href = "../functions/tambah-admin.php">Tambah Data Professors</a>
    </div>
</div>


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
            <td><img src="../img/uploaded_img/<?php echo $row["gambar"]; ?>" width="100">
            </td>
            <td>
                <a href="../functions/ubah-admin.php?id=<?php echo $row["id"]; ?>">Update</a> | 
                <a href="../functions/hapus-admin.php?id=<?php echo $row["id"]; ?>" onclick = "return confirm('yakin?');">Delete</a>
            </td>
        </tr>
        
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</div>
  
  
               
                
                </div>
            </div>
        </div>
    </div>


    <div class="container-1-4">
       
    </div>








    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/slide.js"></script>
    <script src="../js/script.js"></script>
</body>

</html> 