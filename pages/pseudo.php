<?php 

require_once "../connexion.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>pseudo</title>
</head>
<body>

    <div id="main">
        
        <nav class="menu">

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

                <a href="profile.php">
                <div class="bouton">
                    Profile
                </div>
                </a>

                <div class="clicked">
                    Users
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

            <form action="pseudo.php" method="POST" id="search_form">
                <input type="text" name="recherche" placeholder="Recherchez un utilisateur" id="search_bar">
                <input type="submit" value="Rechercher" id="search_button">
            </form>


            <?php

            if(isSet($_POST['recherche'])){
                $data = [
                    'recherche' => $_POST['recherche']
                ];

            //$requete = $database->prepare("SELECT post.id, post.content, post.thumb_up, post.tag, post.date, post.user_id FROM post INNER JOIN users ON post.user_id = users.id WHERE content LIKE CONCAT('%', :recherche, '%')");
            $search_requete = $database->prepare("SELECT * FROM users WHERE pseudo LIKE CONCAT('%', :recherche, '%')");
            $search_requete->execute($data);

            $users = $search_requete->fetchAll(PDO::FETCH_ASSOC);


            $all_affiched_posts = [];


            foreach ($users as $user) {
                $actual_user_id = $user["id"];
                //var_dump($actual_user_id);

                $data = [
                    'actual_user_id' => $actual_user_id
                ];
                $post_search = $database->prepare("SELECT * FROM post WHERE user_id = :actual_user_id ORDER BY date DESC");
                $post_search->execute($data);

                $result = $post_search->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $post_info) {
                    array_push($all_affiched_posts, $post_info);
                }

            }

            /*
            //affichage de tous les posts qui appartiennent aux comptes recherchés
            foreach ($all_affiched_posts as $single_post) {
                var_dump($single_post);
                echo "<br>";
                echo "<br>";
            }
            */

            //var_dump($all_affiched_posts);

            $link = $database->prepare('SELECT * FROM post INNER JOIN users ON post.user_id = users.id');
            $link->execute();

            $linked_table = $link->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

            
            foreach ($all_affiched_posts as $one_post) {
                
                foreach($linked_table as $ligne_table) {
                    if($ligne_table['id'] == $one_post['user_id']) { //permet de trouver l'utilisateur qui correspond au post
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

                        <div class="trash" id=<?php echo $one_post["id"]; ?>>
                            <?php
                            if(isSet($_SESSION["id"])){
                                if($_SESSION['id'] == $one_post['user_id']){ //si le post appartient à l'utilisateur connecté
                                ?>
                                    <img src="../assets/icones/poubelle.png" alt="bouton de suppression de post">
                                <?php
                                }}?>
                        </div>

                    </div>

                    <div class="nameOfTag">
                        <?php echo "#".$one_post['tag']; ?>
                    </div>

                    <article class="text">
                        <?php echo $one_post['content']; ?>
                    </article>

                    <?php
                    if(isSet($one_post['image'])){ ?>
                        <div class="post_picture">
                            <img src="<?php echo "../assets/images/".$one_post['image']; ?>" alt="photo du post">
                        </div>
                    <?php
                    }?>

                    <div class="date">
                        <?php echo $one_post['date']?>
                    </div>

                </section>

            <?php

            }

        }
            ?>
                

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

                <img src="../assets/icones/plume-doie.png" alt="">

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
                            <option value="sport">Sport</option>
                            <option value="culture">Culture</option>
                            <option value="video_game">JeuxVidéo</option>
                            <option value="histoire">Histoire</option>
                            <option value="cinema">Cinéma</option>
                            <option value="litterature">Littérature</option>
                            <option value="tech">Tech</option>
                            <option value="musique">Musique</option>
                            <option value="anime">Animé</option>
                            <option value="sondage">Sondage</option>
            
                        </select>
                
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

    <script src="../JavaScript/main.js"></script>


</body>
</html>