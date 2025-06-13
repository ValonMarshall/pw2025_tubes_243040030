<?php
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: login.php");
  exit;
}
require '../functions/functions.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>

    <div class="container1">

        <div class="container-kiri">
            <div class="faction">
                <img src="img/logo/LOGO UNPAS.png">
            </div>

            <div class="hero">
                <img src="img/Dion/Dion splash-art.png">
            </div>

            <div class="front-profile-container">
                <div class="front-profile">
                    <div class="job">
                        <span>Software Engineer</span>
                    </div>

                    <div class="engineer-logo">
                        <a href="#engineer-tab">
                            <img src="img/logo/Supporter.png">
                        </a> 
                    </div>

                </div>

                <div class="nama">
                    <span>Dion Marshall Avalon Adhiseputro</span>
                </div>
            </div>

                    <div id="engineer-tab" class="engineer-tab">
                        <div class="close-button">
                            <a href="#">
                                <img src="img/button/close_icon.png">
                            </a>
                        </div>
                        
                        <div class="engineer-description">
                            <div class="engineer-title">
                                <img src="img/icons/icon_profession_support.png" alt="">
                                <span>SOFTWARE ENGINEER</span>
                            </div>
                            <div class="engineer-info">
                                adalah seorang profesional yang merancang, mengembangkan, dan menguji aplikasi perangkat lunak dan sistem komputer untuk memecahkan masalah dunia nyata. 
                            </div>
                        </div>
                    </div>

        </div>




        <div class="container-kanan">
            <div class="semua-tabs">

                <div class="tabs">
                    
                    <div class="tabs-bagian-kiri">
                        <img class="icon-tabs-bagian-kiri" src="img/icons/img_icon_gacha.png">
                    </div>

                    <div class="tabs-bagian-kanan">
                        <div class="tabs-logo">
                            <img src="img/icons/img_record.png">
                        </div>
                    </div>

                </div>

                <div class="tabs-description">

                    <div class="info info-1">
                        <div class="icon-basic-info">
                            <img src="img/icons/img_icon_rb.png">
                        </div>
                        <span>BASIC INFO</span>
                    </div>

                        <div class="info-container">
                            <span>[Name] Dion Marshall Avalon Adhiseputro</span><br>
                            <span>[Gender] Male</span><br>
                            <span>[Class] Guard</span><br>
                            <span>[Subclass] Crusher</span><br>
                            <span>[Experience] 4 years</span><br>
                            <span>[Place of Birth] Cimahi</span><br>
                            <span>[Date of Birth] 21 March 2006</span><br>
                        </div>

                    <div class="info info-2">
                        <div class="icon-more-info">
                            <img src="img/icons/question-icon.png">
                        </div>
                        <span>WHO IS DION?</span>
                    </div>

                        <div class="info-container">
                            <span>
                                Saya, Dion Marshall Avalon Adhiseputro, adalah seorang Software Engineer lulusan Universitas Pasundan yang berbasiskan di Bandung. Saya berpengalaman dalam perancangan perangkat lunak dan telah berkontribusi dalam pengembangkan berbagai aplikasi dan video game, beberapa diantaranya yakni aplikasi pemutar video musik "MPlayer" dan indie game "Re:Knights".
                            </span>
                        </div>

                    <div class="info info-3">
                        <div class="icon-more-info">
                            <img src="img/icons/disk_bg.png">
                        </div>
                        <span>TRIVIA</span>
                    </div>

                        <div class="info-container">
                            <span>
                                Dion ialah seseorang yang termasuk dalam kategori seorang "Gamer", yang dimana hal inilah yang menginspirasinya untuk bisa mengembangkan video gamenya sendiri. Dengan cita-citanya untuk bergabung dengan salah satu studio-studio game ternama, ia terus mengasah kemampuannya dalam bidang pengembangan software dan video game.
                            </span>
                        </div>


                </div>

            </div>
        </div>

    </div>



<!-- navbar -->

    <div class="navbar">

        <img class="navbar-background" src="img/icons/navbar/img_bkg_front.png" alt="">

        <div class="tabs">
        
            <div class="all-sm-btn">
                <div class="home sm-btn">
                    <div class="btn-home">
                        <a href="../user/user-index.php">
                            <img src="img/icons/navbar/img_sp_char_mission.png" alt="">
                            <span>Home</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="about sm-btn">
                    <div class="btn-about">
                        <a href="profile.php">
                            <img src="img/icons/navbar/img_icon_rb.png" alt="">
                            <span>About</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="skills sm-btn">
                    <div class="btn-classes">
                        <a href="../user/class-list.php">
                            <img src="img/icons/navbar/img_btn_squad.png" alt="">
                            <span>Classes</span>
                        </a>
                    </div>
            
                </div>
            </div>
            
            <div class="all-lg-btn">
                <div class="projects lg-btn">
                    <div class="btn-news">
                        <a href="../user/news.php">
                            <img src="img/icons/navbar/img_btn_mission.png" alt="">
                            <span>News</span>
                        </a>
                    </div>
                </div>
    
                <div class="contact lg-btn">
                    <div class="btn-contact">
                        <a href="../user/contact.php">
                            <img src="img/icons/navbar/img_btn_friend.png" alt="">
                            <span>Contacts</span>
                        </a>
                    </div>
                </div>

                <div class="login lg-btn">
                    <div class="login-btn">
                        <a href="../auth/logout.php">
                            <img src="img/icons/navbar/exit.png" alt="">
                            <span>Logout</span>
                        </a>
                    </div>
                </div>

                <div class="login lg-btn">
                    <div class="login-btn">
                        <a href="../auth/login.php">
                            <img src="img/icons/navbar/btn_reconnect.png" alt="">
                            <span>Login</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- navbar menu -->
    <div class="menu-btn">
        <a href="index.php">
        <img class="back-to-home" src="img/icons/navbar/btn_topmenu_back.png" alt="">
        </a>
        <img class="home-btn" src="img/icons/navbar/btn_topmenu_home.png" alt="">
    </div>
  
   



      <script src="../js/slide.js"></script>
</body>
</html>