<?php
require '../functions/functions.php';

if (isset($_POST["register"])) {

    if(registrasi ($_POST) > 0) {
        echo "<script>
                alert ('user baru berhasil ditambahkan')
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/registrasi.css" rel="stylesheet">

</head>
<body>
    
<div class="container1">

        <div class="container-kanan">
            <div class="semua-tabs">

                <div class="tabs">
                    
                    <div class="tabs-bagian-kiri">
                        <img class="icon-tabs-bagian-kiri" src="../img/icons/img_icon_gacha.png">
                    </div>

                    <div class="tabs-bagian-tengah">
                        <div class="tabs-logo-left">
                            <img src="../img/icons/image_empty_v2.png" alt="">
                        </div>

                        <div class="tabs-title">
                            <span>RegistraTION INTERFACE</span>
                        </div>
                        
                        <div class="tabs-logo-right">
                            <img src="../img/icons/image_empty_v2.png" alt="">
                        </div>
                    </div>

                    <div class="tabs-bagian-kanan">
                        <img class="icon-tabs-bagian-kiri" src="../img/icons/img_icon_gacha.png">
                    </div>

                </div>


                <div class="tabs-description">

                    <div class="info info-2">
                        <img src="../img/icons/disk_bg.png" alt="">
                        <span>WELCOME TO RHODES ISLAND, NEW USER</span>
                        <img src="../img/icons/disk_bg.png" alt="">
                    </div>

                        <div class="info-container">

                            <div class="container">

                                <form id="contactForm" action="" method="post">
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <input type="text" name="username" id="username" autocomplete="off" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="password" name="password" id="password" autocomplete="off" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="password2">Confirm Password :</label>
                                        <input type="password" name="password2" id="password2" autocomplete="off" required>
                                    </div>

                                    
                                    <div class="regis-bawah row">
                                        <button type="submit" name="register" class="regis-btn col-5">
                                            <div class="regis-img">
                                                <img src="../img/button/handbook_mission_btn.png" alt="" name="registrasi" class="registrasi-button">
                                            </div>

                                            <div class="regis">
                                                <span>
                                                    Register
                                                </span>
                                            </div>
                                        </button>
                                        
                                        <div class="login-btn col-7">
                                            <span>Already have an account? <br> <a href="login.php"> Login instead.</a></span>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                </div>

            </div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


</body>
</html>