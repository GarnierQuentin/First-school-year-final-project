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
        
        <nav id="menu" class="menu">

            <div class="menu_content">
            
                <?php
                if(!isSet($_SESSION["user"])){
                ?>
                <div class="profile_picture">
                    <img class="photo" src="assets/photos_de_profile/not_connected.jpg" alt="photo de profile">
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

                <div class="clicked">
                    Feed
                </div>

                <?php
                if(isSet($_SESSION["user"])){
                ?>

                <a href="pages/profile.php">
                    <div class="bouton">
                        Profile
                    </div>
                </a>


                <a href="pages/pseudo.php">
                    <div class="bouton">
                        Users
                    </div>
                </a>
                <?php
                }?>
                
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

        </nav>

        <main id="posts">

            <?php
            if(!isSet($_SESSION["user"])){
                $connected = "is_not_connected";
            }
            else{
                $connected = "is_connected";
            }
            ?>

            <input id="post_content" type="hidden" value=<?php echo $connected; ?> >

            <?php

            $requete = $database->prepare('SELECT * FROM post ORDER BY date DESC');

            $requete->execute();

            $posts = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            $last_post = $posts[0];

            json_encode($last_post);

            $link = $database->prepare('SELECT * FROM post INNER JOIN users ON post.user_id = users.id');
            $link->execute();

            $linked_table = $link->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            //$files = $_FILES['post_picture'];
            //echo "Nom : " . $files['name'] . " / ";
            //echo "Type : " . $files['type'] . " / ";
            //echo "Taille : " . $files['size'] . " / ";
            //echo "Tmp : " . $files['tmp_name'];

            foreach($posts as $post) {

                foreach($linked_table as $ligne_table) {
                    if($ligne_table['id'] == $post['user_id']) { //permet de trouver l'utilisateur qui correspond au post
                        $pseudo = $ligne_table['pseudo'];
                        $image = $ligne_table['profile_picture'];
                    }
                }?>

                <section class="post">

                    <div class="profile">

                        <div class="identity">

                            <div class="mini_profile_picture">
                                <img class="photo" src=<?php echo $image; ?> alt="mini photo de profile">
                            </div>

                            <div class="username">
                            <?php echo $pseudo; ?>
                            </div>

                        </div>

                        <div class="trash" id=<?php echo $post["id"]; ?>>
                            <?php
                            if(isSet($_SESSION["id"])){
                                if($_SESSION['id'] == $post['user_id']){ //si le post appartient à l'utilisateur connecté
                                ?>
                                    <img src="assets/icones/poubelle.png" alt="bouton de suppression de post">
                                <?php
                                }}?>
                        </div>

                    </div>

                    <div class="nameOfTag">
                        <?php echo "#".$post['tag']; ?>
                    </div>

                    <article class="text">
                        <?php echo $post['content']; ?>
                    </article>

                    <?php
                    if(isSet($post['image'])){ ?>
                        <div class="post_picture">
                            <img src="<?php echo "assets/images/".$post['image']; ?>" alt="photo du post">
                        </div>
                    <?php
                    }?>

                    <div class="date">
                        <?php echo $post['date']?>
                    </div>

                </section>

                <?php

                }
                
                ?>

            <div class="gap"></div>
                

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

                <form action="proccess/post.php" method="POST" enctype="multipart/form-data">

                    <div id="text_input">
            
                        Tapez votre commentaire (en moins de 100 caractères) :
                        <textarea name="content" id="content_text_input" maxlength="100" required></textarea>
            
                    </div>
            
            
                    <div id="roll_of_tags">
                    
                        <select name="tag" id="liste_tags" required>
            
                            <option value="">Choisissez un tag</option>
                            <option value="Sport">Sport</option>
                            <option value="Culture">Culture</option>
                            <option value="JeuxVidéo">JeuxVidéo</option>
                            <option value="Histoire">Histoire</option>
                            <option value="Cinéma">Cinéma</option>
                            <option value="Littérature">Littérature</option>
                            <option value="Tech">Tech</option>
                            <option value="Musique">Musique</option>
                            <option value="Animé">Animé</option>
                            <option value="Art">Art</option>
            
                        </select>
                
                    </div>

                    <div id="media">
                        <label for="image">Une image ?</label>
                        <input type="file" name="post_picture" id="image">
                    </div>

                    <div id="final_submit_part">
            
                        <div id="cancel_button">
                            Annuler
                        </div>
        
                        <div id="submit_button">
                            <input type="submit" value="Publier" style="background : none; border : none;">
                        </div>
        
                    </div>

                </form>
        
            </div>

        </main>
        
        <aside id="tags">

            <div id="tags_content">
                
                <div id="tag_text">
                    <p><b>TAGS</b></p>
                </div>

                <div id="all_tags">
                    
                    <div id="sport" class="tag_choice">
                        <p>Sport</p>
                    </div>

                    <div id="culture" class="tag_choice">
                        <p>Culture</p>
                    </div>

                    <div id="video_game" class="tag_choice">
                        <p>JeuxVidéo</p>
                    </div>

                    <div id="histoire" class="tag_choice">
                        <p>Histoire</p>
                    </div>

                    <div id="cinema" class="tag_choice">
                        <p>Cinéma</p>
                    </div>

                    <div id="litterature" class="tag_choice">
                        <p>Littérature</p>
                    </div>

                    <div id="tech" class="tag_choice">
                        <p>Tech</p>
                    </div>

                    <div id="musique" class="tag_choice">
                        <p>Musique</p>
                    </div>

                    <div id="anime" class="tag_choice">
                        <p>Animé</p>
                    </div>

                    <div id="art" class="tag_choice">
                        <p>Art</p>
                    </div>

                    <div id="clear">
                        Clear tag
                    </div>

                </div>

            </div>

        </aside>

        <nav id="mobile_navbar">

            <div id="burger_menu" class="mobile_sidebar">
                <img src="assets/icones/burger-bar.png" alt="">
            </div>

            <div id="mobile_tag_menu" class="mobile_sidebar">
                <img src="assets/icones/etiqueter.png" alt="">
            </div>

            <div id="mobile_post" class="mobile_sidebar">
                <img src="assets/icones/plume-doie.png" alt="">
            </div>

        </nav>
 
    </div>
    
    <script src="JavaScript/main.js"></script>
</body>
</html>