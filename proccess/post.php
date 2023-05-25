<?php
require_once "../connexion.php";
session_start();

if($_POST['content'] != '' && $_POST['tag'] != 'Base'){
    if(isset($_FILES['post_picture'])){

        $file = $_FILES['post_picture'];

        if($file['size'] <= 2000000){
            $verif_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if($verif_extension == "jpg" || $verif_extension == "png" || $verif_extension == "gif"){

                move_uploaded_file($file['tmp_name'], "../assets/images/".$file['name']);
                $img = $file['name'];

            }else{
                echo "Veuillez sélectionner un fichier de type JPG, PNG ou GIF";
                $img = NULL;
            }
        }else{
            echo 'Fichier trop lourd. Taille maximale : 2Mo';
            $img = NULL;
        }
    }else{
        $img = NULL;
    }

    $data = [
        'content' => $_POST['content'],
        'tag' => $_POST['tag'],
        'user_id' => $_SESSION["id"],
        'post_image' => $img
    ];

    $requete = $database->prepare('INSERT INTO post (content, image, tag, thumb_up, user_id) VALUES (:content, :post_image, :tag, 0, :user_id)');
    $requete->execute($data);

    if($requete) {
        //redirection vers la page principale après l'insertion en base de donnée
        header('Location: ../index.php');
    } else {
        echo 'Une erreur est survenue';
    }
}
?>