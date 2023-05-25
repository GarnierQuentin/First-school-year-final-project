<?php 
    session_start();
    require_once '../connexion.php';

    if($_POST['recherche'] != ""){
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
            $post_search = $database->prepare("SELECT * FROM post WHERE user_id = :actual_user_id");
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
                                <img src="assets/icones/poubelle.png" alt="bouton de suppression de post">
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
                if(isSet($post['image'])){ ?>
                    <div class="post_picture">
                        <img src="<?php echo "assets/images/".$one_post['image']; ?>" alt="photo du post">
                    </div>
                <?php
                }?>

                <div class="date">
                    <?php echo $one_post['date']?>
                </div>

            </section>

            <?php

            }
            


    } else {
        echo 'Veuillez remplir le champ de recherche';
    }

?>