<?php
session_start();

if(isSet($_SESSION["user"]) and isSet($_SESSION["id"])){
    $_SESSION["user"] = null;
    $_SESSION["id"] = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Connection</title>
</head>
<body>


    <div id="settings">

        <nav class="menu">

            <div class="menu_content">
            
                <div class="profile_picture">
                    <img class="photo" src="../assets/photos_de_profile/not_connected.jpg" alt="photo de profile">
                </div>

                <p class="username">Not connected</p>

                <div class="gap"></div>

                <a href="../index.php">
                    <div class="bouton">
                        Feed
                    </div>
                </a>
                
                <a href="../pages/settings.php">
                <div class="bouton">
                    Settings
                </div>
                </a>


                <a href="../index.php">
                    <div class="connection_clicked">
                        Disconnect
                    </div>
                </a>

            </div>

        </nav>

        <main id="account">

            <div id="choix_formulaires">

                <div class="d-flex justify-content-evenly m-3 align-items-center">

                    <button type="button" class="btn btn-outline-primary">Connexion</button>

                    <button type="button" class="btn btn-outline-info">Inscription</button>

                </div>

            </div>


            <div class="d-flex flex-column align-items-center">
       
                <div id="formulaire_connection" class="col border rounded p-3 bg-success bg-gradient">
                    <h5>Connection</h5>

                    <br>

                    <form action="../proccess/signIn.php" method="POST">

                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
                            <input type="email" class="form-control bootstrap_button" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
                        </div>

                        <div class="mb-2">
                            <label for="exampleInputPassword1" class="form-label">Mot de passse</label>
                            <input type="password" class="form-control bootstrap_button" id="exampleInputPassword1" name="mdp">
                        </div>

                        <button type="submit" class="btn btn-primary btn-custom">Go</button>

                        </form>
                </div>
    
                <div id="formulaire_inscription" class="col border rounded p-3 bg-success bg-gradient">
                    <h5>Inscription</h5>

                    <br>

                    <form action="../proccess/signUp.php" method="POST">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Prénom ?</label>
                            <input type="text" class="form-control bootstrap_button" id="exampleInputEmail2" aria-describedby="emailHelp" name="prenom">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom ?</label>
                            <input type="text" class="form-control exampleInputPassword2 bootstrap_button" name="nom">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Pseudo ?</label>
                            <input type="text" class="form-control exampleInputPassword2 bootstrap_button" name="pseudo">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Adresse mail ?</label>
                            <input type="email" class="form-control exampleInputPassword2 bootstrap_button" name="mail">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe ?</label>
                            <input type="password" class="form-control exampleInputPassword2 bootstrap_button" name="mdp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Lien d'une photo de profile ?</label>
                            <input type="url" class="form-control exampleInputPassword2 bootstrap_button" name="profile_picture">
                        </div>

                        <button type="submit" class="btn btn-primary">Envoyer</button>

                        </form>
                </div>
            </div>

            <div class="gap"></div>

    
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

    <script src="../JavaScript/connection.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>