<?php
require_once "connexion.php";
session_start();

$users = $database->prepare('SELECT * FROM users');

$users->execute();

$all_users = $users->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Projet Axe CDI</title>
</head>
<body>

    <div id="main">
        
        <div class="menu">

            <div class="menu_content">
            
                <div class="profile_picture">
                    <img class="photo" src=<?php echo $_SESSION["user"]["profile_picture"]; ?> alt="photo de profile">
                </div>

                <p class="username"><?php echo $_SESSION["user"]["pseudo"]; ?></p>

                <div class="gap"></div>

                <div class="clicked">
                    Feed
                </div>
                
                <a href="pages/settings.php">
                    <div class="bouton">
                        Settings
                    </div>
                </a>

                <a href="pages/connection.php">
                    <div class="connection">
                        Disconnect
                    </div>
                </a>

            </div>

        </div>

        <div id="posts">

            <div id="post_content">

            <?php

            $requete = $database->prepare('SELECT * FROM post ORDER BY date DESC');

            $requete->execute();

            $posts = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            $link = $database->prepare('SELECT * FROM post INNER JOIN users ON post.user_id = users.id');
            $link->execute();

            $linked_table = $link->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            foreach($posts as $post) {

                foreach($linked_table as $ligne_table) {
                    if($ligne_table['id'] == $post['user_id']) { //permet de trouver l'utilisateur qui correspond au post
                        $pseudo = $ligne_table['pseudo'];
                        $image = $ligne_table['profile_picture'];
                    }
                }?>

                <div class="post">

                    <div class="profile">

                        <div class="identity">

                            <div class="mini_profile_picture">
                                <img class="photo" src=<?php echo $image; ?> alt="mini photo de profile">
                            </div>

                            <div class="username">
                            <?php echo $pseudo; ?>
                            </div>

                        </div>

                        <div class="trash">
                            <?php
                            if($_SESSION['id'] == $post['user_id']){ //si le post appartient à l'utilisateur connecté
                            ?>
                            <img src="assets/icones/poubelle.png" alt="">
                            <?php
                            }?>
                        </div>

                    </div>

                    <div class="nameOfTag">
                        <?php echo "#".$post['tag']; ?>
                    </div>

                    <div class="text">
                        <?php echo $post['content']; ?>
                    </div>

                </div>

                <?php

            }
            
            ?>
                
            </div>

            <div id="delet">

                <div id="question">
                Êtes-vous sûr de vouloir supprimer ce post ?
                </div>
        
                <br>
        
                <div id="choix">
                    <div id="yes">
                        Oui
                    </div>
                    <div id="no">
                        Non
                    </div>
                </div>
        
            </div>

            <div id="do_a_post">

                <img src="assets/icones/plume-doie.png" alt="">

            </div>


            <div id="publish">

                <form action="proccess/post.php" method="POST">

                    <div id="text_input">
            
                        Tapez votre commentaire (en moins de 100 caractères) :
                        <textarea name="content" id="content_text_input" maxlength="100" required></textarea>
            
                    </div>
            
            
                    <div id="roll_of_tags">
                    
                        <select name="tag" id="liste_tags" required>
            
                            <option value="">Choisissez un tag</option>
                            <option value="Sport">Sport</option>
                            <option value="Culture">Culture</option>
                            <option value="Jeux vidéo">JeuxVidéo</option>
                            <option value="Histoire">Histoire</option>
                            <option value="Cinema">Cinéma</option>
                            <option value="Litterature">Littérature</option>
                            <option value="Tech">Tech</option>
                            <option value="Musique">Musique</option>
                            <option value="Anime">Animé</option>
                            <option value="Sondage">Sondage</option>
            
                        </select>
            
                        <div id="final_submit_part">
            
                            <div id="cancel_button">
                                Annuler
                            </div>
            
                            <div id="submit_button">
                                <input type="submit" placeholder="Publier" style="background : none; border : none;">
                            </div>
            
                        </div>
                
                    </div>

                </form>
        
            </div>

        </div>
        
        <div id="tags">

            <div id="tags_content">
                
                <div id="tag_text">
                    <b><p>TAGS</p></b>
                </div>

                <div id="all_tags">
                    
                    <div id="Sport" class="tag_choice">
                        <p>Sport</p>
                    </div>

                    <div id="Culture" class="tag_choice">
                        <p>Culture</p>
                    </div>

                    <div id="video_game" class="tag_choice">
                        <p>JeuxVidéo</p>
                    </div>

                    <div id="Histoire" class="tag_choice">
                        <p>Histoire</p>
                    </div>

                    <div id="Cinema" class="tag_choice">
                        <p>Cinéma</p>
                    </div>

                    <div id="Litterature" class="tag_choice">
                        <p>Littérature</p>
                    </div>

                    <div id="Tech" class="tag_choice">
                        <p>Tech</p>
                    </div>

                    <div id="Musique" class="tag_choice">
                        <p>Musique</p>
                    </div>

                    <div id="Anime" class="tag_choice">
                        <p>Animé</p>
                    </div>

                    <div id="Sondage" class="tag_choice">
                        <p>Sondage</p>
                    </div>

                    <div id="clear">
                        Clear tag(s)
                    </div>

                </div>

            </div>

        </div>

        <div id="mobile_navbar">

            <div id="burger_menu" class="mobile_sidebar">
                <img src="assets/icones/burger-bar.png" alt="">
            </div>

            <div id="mobile_tag_menu" class="mobile_sidebar">
                <img src="assets/icones/etiqueter.png" alt="">
            </div>

            <div id="mobile_post" class="mobile_sidebar">
                <img src="assets/icones/plume-doie.png" alt="">
            </div>

        </div>
 
    </div>
    
    <script src="JavaScript/main.js"></script>
</body>
</html>