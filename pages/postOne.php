<?php
require_once "../connexion.php";
session_start();
$e = file_get_contents("php://input");
var_dump(json_decode($e,true));

if($_POST['content'] != '' && $_POST['tag'] != 'Base'){

    $data = [
        'content' => $_POST['content'],
        'tag' => $_POST['tag'],
        'user_id' => $_SESSION["id"],
    ];

    $requete = $database->prepare('INSERT INTO post (content, tag, thumb_up, date, user_id) VALUES (:content, :tag, 0, :user_id)');
    $requete->execute($data);

    if($requete) {
        //redirection vers la page principale après l'insertion en base de donnée
        //header('Location: ../index.php');
    } else {
        echo 'Une erreur est survenue';
    }

}
else{
    $data = [
        'content' => "Message automatique fait par mon créateur",
        'date' => date('Y-m-d H:i:s'),
        'tag' => "Tech",
        'user_id' => 5,
    ];

    $requete = $database->prepare('INSERT INTO post (content, tag, thumb_up, date, user_id) VALUES (:content, :tag, 0, :date, :user_id)');
    $requete->execute($data);

    if($requete) {
        //redirection vers la page principale après l'insertion en base de donnée
        //header('Location: ../index.php');
    } else {
        echo 'Une erreur est survenue';
    }
}

?>