<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Document</title>
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

                <a href="../index.php">
                    <div class="bouton">
                        Feed
                    </div>
                </a>

                <div class="clicked">
                    Profile
                </div>
                
                <a href="settings.php">
                    <div class="bouton">
                        Settings
                    </div>
                </a>

                <a href="connection.php">
                    <div class="connection">
                        Disconnect
                    </div>
                </a>

            </div>

        </div>

        <div id="posts">

            <div id="post_content" value="is_connected>

            <?php

            $requete = $database->prepare('SELECT * FROM post ORDER BY date DESC WHERE user_id == $_SESSION["id"]');

            $requete->execute();

            $posts = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            $user_table = $database->prepare('SELECT * FROM users WHERE id == $_SESSION["id"]');
            $user_table->execute();

            $the_user_table = $user_table->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            foreach($posts as $post) {
                
                ?>

                <div class="post">

                    <div class="profile">

                        <div class="identity">

                            <div class="mini_profile_picture">
                                <img class="photo" src=<?php echo $the_user_table["profile_picture"]; ?> alt="mini photo de profile">
                            </div>

                            <div class="username">
                            <?php echo $the_user_table["pseudo"]; ?>
                            </div>

                        </div>

                        <div class="trash" id=<?php echo $post["id"]; ?>>
                            <img src="assets/icones/poubelle.png" alt="bouton de suppression de post">
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
                        <form action="proccess/delet.php" method="POST">
                            <input type="submit" value="Oui" style="background : none; border : none;">
                            <input id="input_yes_form" type="hidden" name="current_post_ID" value="">
                        </form>
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
                                <input type="submit" value="Publier" style="background : none; border : none;">
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

</body>
</html>