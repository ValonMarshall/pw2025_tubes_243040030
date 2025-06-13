<?php
session_start();

if (!isset($_SESSION["login"])) {
  header ("Location: ../auth/login.php");
  exit;
}
require '../functions/functions.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio-Contact</title>
    <link rel="stylesheet" href="../css/contact.css">
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
                            <span>Contacts</span>
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

                    <div class="info info-1">
                        <div class="icon-basic-info">
                            <img src="../img/icons/img_icon_rb.png">
                        </div>
                        <span>SOCIAL MEDIA</span>
                    </div>

                        <div class="info-container">

                            <div class="logo-social facebook">
                                <a href="https://web.facebook.com/dion.avalon.7">
                                    <img src="../img/logo/Facebook.png" alt="">
                                </a>
                            </div>

                            <div class="logo-social instagram">
                                <a href="https://www.instagram.com/d.marshall473/">
                                    <img src="../img/logo/Instagram.png" alt="">
                                </a>
                            </div>
                            <div class="logo-social youtube">
                                <a href="https://www.youtube.com/@sgtmarshall1515">
                                    <img src="../img/logo/YouTube.png" alt="">
                                </a>
                            </div>

                            <div class="logo-social X">
                                <a href="https://x.com/SgtMarshall473">
                                    <img src="../img/logo/X.png" alt="">
                                </a>
                            </div>

                        </div>

                    <div class="info info-2">
                        <div class="icon-more-info">
                            <img src="../img/icons/question-icon.png">
                        </div>
                        <span>CONTACT ME</span>
                    </div>

                        <div class="info-container">


                            <div class="container">

                                <form id="contactForm">
                                    <div class="form-group">
                                        <label for="name">Name<span class="required">*</span></label>
                                        <input type="text" id="name" name="name" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="email">Email<span class="required">*</span></label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="subject">Subject<span class="required">*</span></label>
                                        <input type="text" id="subject" name="subject" required>
                                    </div>
                        
                                    <div class="form-group">
                                        <label for="message">Message<span class="required">*</span></label>
                                        <textarea id="message" name="message" required></textarea>
                                    </div>
                        
                                    <button type="submit">
                                        <div class="send-button">
                                            <img src="../img/button/handbook_mission_btn.png" alt="">
                                        </div>

                                        <div class="send-text">
                                            <span>
                                                Send
                                            </span>
                                        </div>
                                    </button>
                                </form>

                            </div>
                        </div>
                </div>

            </div>
        </div>

    </div>



<!-- navbar -->

    <div class="navbar">

        <img class="navbar-background" src="../img/icons/navbar/img_bkg_front.png" alt="">
       
        <div class="tabs">
        
            <div class="all-sm-btn">
                <div class="home sm-btn">
                    <div class="btn-home">
                        <a href="user-index.php">
                            <img src="../img/icons/navbar/img_sp_char_mission.png" alt="">
                            <span>Home</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="about sm-btn">
                    <div class="btn-about">
                        <a href="about.php">
                            <img src="../img/icons/navbar/img_icon_rb.png" alt="">
                            <span>About</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="skills sm-btn">
                    <div class="btn-classes">
                        <a href="class-list.php">
                            <img src="../img/icons/navbar/img_btn_squad.png" alt="">
                            <span>Classes</span>
                        </a>
                    </div>
            
                </div>
            </div>
            
            <div class="all-lg-btn">
                <div class="projects lg-btn">
                    <div class="btn-news">
                        <a href="news.php">
                            <img src="../img/icons/navbar/img_btn_mission.png" alt="">
                            <span>News</span>
                        </a>
                    </div>
                    
                </div>
    
                <div class="contact lg-btn">
                    <div class="btn-contact">
                        <a href="contact.php">
                            <img src="../img/icons/navbar/img_btn_friend.png" alt="">
                            <span>Contacts</span>
                        </a>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>


    <!-- navbar menu -->
    <div class="menu-btn">

        <a href="classes.php">
        <img class="back-to-home" src="../img/icons/navbar/btn_topmenu_back.png" alt="">
        </a>

       
        <img class="home-btn" src="../img/icons/navbar/btn_topmenu_home.png" alt="">
    </div>
  
   



      <script src="../js/slide.js"></script>
</body>
</html>