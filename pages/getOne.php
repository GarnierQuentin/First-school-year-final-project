<?php
require_once "../connexion.php";

$requete = $database->prepare('SELECT * FROM post ORDER BY date DESC LIMIT 1');

$requete->execute();

$posts = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur


echo json_encode($posts);

?>