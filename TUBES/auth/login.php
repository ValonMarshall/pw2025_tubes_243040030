<?php
session_start();
require('../functions/functions.php');


// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // Ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");

    // Cek apakah query berhasil dan data ditemukan
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }
    }
}

// kembali ke index bila sudah login
if (isset($_SESSION["login"])) {
    header("Location: ../admin/admin-index.php");
    exit;
}


if( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = query("SELECT * FROM users WHERE username = '$username'")[0];

        //cek password
        if (password_verify($password, $user["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["role"] = $user["role"];
            $_SESSION["username"] = $user["username"];
            

            //cek remember me
            if (isset($_POST["remember"])) {
                //buat cookie
                setcookie('id', $user['id'], time()+60);
                setcookie('key', hash('sha256', $user['username']), time()+60);
            }

            //apakah role admin atau user
            if ($user["role"] == "admin") {
                header("Location: ../admin/admin-index.php");
            } else {
                header("Location: ../user/user-index.php");
            }
            exit;
        }

        $error = true;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
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
                            <span>LOGIN INTERFACE</span>
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
                        <span>ENTER THE CORRECT USERNAME AND PASSWORD</span>
                        <img src="../img/icons/disk_bg.png" alt="">
                    </div>

                        <div class="info-container">

                            <div class="container">

                                <div class="login-error">
                                    <?php if ( isset($error)) : ?>
                                        <img src="../img/icons/back_trans.png" alt="">
                                        <p class="error-message">WRONG USERNAME/PASSWORD</p>
                                        <img src="../img/icons/back_trans_reverse.png" alt="">
                                    <?php endif; ?>
                                </div>


                                <form id="contactForm" action="" method="post">
                                    
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <input type="text" name="username" id="username" autocomplete="off" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <input type="password" name="password" id="password" autocomplete="off" required>
                                    </div>
                        
                                    <div class="form-group" id="check">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember me?</label>
                                    </div>

                                    <div class="form-group" id="check" class="forgot">
                                        <label for="forgot"><a href="">forgot-password?</a></label>
                                    </div>
                        
                                    <div class="login-bawah row">
                                        <button type="submit" name="login" class="login-btn col-5">
                                            <div class="send-button">
                                                <img src="../img/button/handbook_mission_btn.png" alt="" name="login" class="login-button" required>
                                            </div>

                                            <div class="send-text">
                                                <span>
                                                    Login
                                                </span>
                                            </div>
                                        </button>

                                        <div class="regis-btn col-7">
                                                <span>Don't have an account? <br> <a href="registrasi.php"> Register instead.</a></span>
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