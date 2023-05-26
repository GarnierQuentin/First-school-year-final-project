<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Settings</title>
</head>
<body>

    <div id="settings">

        <nav id="menu" class="menu">

            <div class="menu_content">
            
            <?php
            if(!isSet($_SESSION["user"])){
                ?>
                <div class="profile_picture">
                    <img class="photo" src="../assets/photos_de_profile/not_connected.jpg" alt="photo de profile">
                </div>

                <p>Not connected</p>
                <?php
                
                }else{
                ?>
                <div class="profile_picture">
                    <img class="photo" src=<?php echo $_SESSION["user"]["profile_picture"]; ?> alt="photo de profile">
                </div>

                <p class="username"><?php echo $_SESSION["user"]["pseudo"]; ?></p>
                <?php
                }?>

                <div class="gap"></div>

                <a href="../index.php">
                    <div class="bouton">
                        Feed
                    </div>
                </a>

                <?php
                if(isSet($_SESSION["user"])){
                ?>
                    <a href="profile.php">
                        <div class="bouton">
                            Profile
                        </div>
                    </a>

                    <a href="../pages/pseudo.php">
                    <div class="bouton">
                        Users
                    </div>
                    </a>

                <?php
                }
                ?>
                
                <div class="clicked">
                    Settings
                </div>


                <a href="connection.php">
                    <div class="connection">
                        Disconnect
                    </div>
                </a>

            </div>

        </nav>



        <main id="reglages">

            <div id="bloc">
        
                Choix du thème :
                
                <br>
                <br>

                <div id="themes">
                    <button id="dark_theme">Sombre</button>
                    <button id="white_theme">Clair</button>
                </div>

            </div>

        </main>

        <nav id="mobile_navbar">

            <div id="burger_menu" class="mobile_sidebar">
                <img src="../assets/icones/burger-bar.png" alt="">
            </div>

            <div id="mobile_tag_menu" class="mobile_sidebar">
                <img src="../assets/icones/etiqueter.png" alt="">
            </div>

            <div id="mobile_post" class="mobile_sidebar">
                <img src="../assets/icones/plume-doie.png" alt="">
            </div>

        </nav>

    </div>

    <script src="../JavaScript/settings.js"></script>
</body>
</html>