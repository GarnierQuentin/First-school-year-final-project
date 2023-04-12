<?php
require_once "../connexion.php";
session_start();

if($_POST['content'] != '' && $_POST['tag'] != 'Base'){
    $data = [
        'content' => $_POST['content'],
        'date' => date('Y-m-d H:i:s'),
        'tag' => $_POST['tag'],
        'user_id' => $_SESSION["id"]
    ];

    $requete = $database->prepare('INSERT INTO post (content, tag, thumb_up, date, user_id) VALUES (:content, :tag, 0, :date, :user_id)');
    $requete->execute($data);

    if($requete) {
        //redirection vers la page principale après l'insertion en base de donnée
        header('Location: ../index.php');
    } else {
        echo 'Une erreur est survenue';
    }
}
?>