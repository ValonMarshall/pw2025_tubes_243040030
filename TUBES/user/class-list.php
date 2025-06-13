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
    <title>Class List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/class-list.css">
</head>

<body>


<div class="main-container">
    
    <div class="container-kiri">
        <div class="tab-skills">
        
            <div class="title-skills">
                <img src="../img/backgrounds/fast_team_made.png" alt="">
                <span>
                    CLASS LIST
                </span>
            </div>

            <div class="description-skills">
                <div class="info-skills">
                    <span>Vanguard</span>
                    <p>Vanguards have relatively low DP cost which often makes them among the first units to be deployed in an operation and the ability to generate more DP to allow the rest of the squad to be deployed. They typically have decent, well-rounded stats, allowing Vanguards to handle the initial waves of enemies in an operation.
                    </p>
                </div>

                <div class="info-skills2">
                    <span>Guard</span>
                    <p>Guards have high HP and ATK which gives them high DPS output. They often have good synergy with the other classes, especially Defenders who can block enemies to be pummeled by Guards or with each other to deal even more damage with coordinated attacks. The only weakness that most Guards have is a lack of base RES, making them noticeably vulnerable to enemy Casters and Arts Guards.
                    </p>
                </div>

                <div class="info-skills3">
                    <span>Defender</span>
                    <p>Defenders have high HP and DEF and can block up to three enemies, with few exceptions. However, they have (with certain exceptions) a low ATK and very short attack range – on the same tile as themselves. For this reason, Defenders are best placed in front of a formation to hold enemies back, draw enemy fire, and protect friendly units behind them.
                    </p>
                </div>

                <div class="info-skills4">
                    <span>Sniper</span>
                    <p>Snipers use ranged weaponry (usually crossbows/bows or firearms) to attack enemies from a long range, allowing them to dispatch enemies from a safe distance. Their DP cost is quite low, only slightly higher than Vanguards, allowing Snipers to be deployed early in the game. Snipers have less-than-stellar HP and DEF, so it is best to keep them away from ranged enemies who can easily harm them. They are also ineffective against enemies with high DEF as their attacks will not be effective. In contrast, Snipers excel against enemies with high RES but low DEF, such as enemy Caster.
                    </p>
                </div>


                <div class="info-skills5">
                    <span>Caster</span>
                    <p>
                    Casters attack enemies with their Originium Arts, dealing Arts damage instead of the usual Physical damage. This makes Casters a viable option when facing enemies with high DEF as they typically have little to no RES. While having good ATK, Casters have high DP cost and their attack interval is quite high, making them not as efficient as Snipers against fast-moving enemies and those with RES. Nevertheless, Casters will prove their worth when used correctly and kept away from ranged enemies due to their rather low HP and DEF.
                    </p>
                </div>

                <div class="info-skills6">
                    <span>Medic</span>
                    <p>Instead of attacking enemies, Medics restore the HP of friendly units, making their use indispensable to keeping friendlies on the field and gives them more time to hold the line. Medics restore HP equal to their ATK. Because all Medics but a select few are incapable of attacking enemies and have low HP and DEF, Medics should be kept safe from ranged enemies, who can and will attack them (not helping that Terra does not have an equivalent to the Geneva Conventions in Earth).
                    </p>
                </div>


                <div class="info-skills8">
                    <span>Supporter</span>
                    <p>
                    Supporters provide various means of field support, ranging from buffing other operators, debuffing their enemies, or utilizing summons in combat. Most Supporters' attacks deal Arts damage, allowing them to act as makeshift Casters. Supporters are more micromanagement-intensive than others, as most of them rely on the usage of their abilities to be effective. They are also frail, having a relatively low HP and DEF, though most Supporters have innate RES, so they should be played in combination with Medics.
                    </p>
                </div>

                <div class="info-skills7">
                    
                    <span>Specialist</span>
                    <p>
                    True to the name, Specialists are Operators with specialized functionalities that allow them to influence the battle in various ways, ranging from single-handedly dispatching priority targets, acting as a diversion, or using the terrain to their advantage. Generally, Specialists are not meant to be used as a core operator, but rather as a situational or tactical one as they can only perform at full effectiveness under certain circumstances.
                    </p>
                </div>

                
            </div>


        </div>
    </div>



    <div class="container-tengah">

        <div class="container-tengah-atas">
            <div class="classes-title">
                <span>CHOOSE YOUR FAVORITE CLASS</span>
            </div>
        </div>


        <div class="container-tengah-bawah">

            <div class="semua-tabs">

                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo vanguard" src="../img/class/Vanguard.png" alt="">
                    
                        <div class="title">
                            <span>Vanguard</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo guard" src="../img/class/Guard.png" alt="">
                    
                        <div class="title">
                            <span>Guard</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            
                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo defender" src="../img/class/Defender.png" alt="">
                    
                        <div class="title">
                            <span>Defender</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo sniper" src="../img/class/Sniper.png" alt="">
                    
                        <div class="title">
                            <span>Sniper</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo caster" src="../img/class/Caster.png" alt="">
                        
                        <div class="title">
                            <span>Caster</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo medic" src="../img/class/Medic.png" alt="">
                    
                        <div class="title">
                            <span>Medic</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs1">
                    <div class="tabs-element ">
                        <img class="logo supporter" src="../img/class/Supporter.png" alt="">
                        
                        <div class="title">
                            <span>Supporter</span>
                            <div class="join">
                                <a href="classes.php">
                                    <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                    <span>Join Class!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs1">
                    <div class="tabs-element">
                        <img class="logo specialist" src="../img/class/Specialist.png" alt="">
                        
                        <div class="title">
                            <span>Specialist</span>
                            <div class="join">
                                    <a href="classes.php">
                                        <img src="../img/button/main_mission_confirm_all_btn.png" alt="">
                                        <span>Join Class!</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>





    <div class="container-kanan">
        <div class="container-kanan-dalam">

            <div class="sub-class-title">
                <span>Don't Know Which One to Choose? See the Sub-Classes!</span>
            </div>

            <div class="sub-classes">

            </div>

            <div class="sub-class-info">
                
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