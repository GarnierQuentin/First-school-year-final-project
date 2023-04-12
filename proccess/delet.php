<?php
require_once "../connexion.php";

$data = [
    'id' => $_POST['current_post_ID']
];

$requete = $database->prepare('DELETE FROM post WHERE id = :id');

$requete->execute($data);

header('Location: ../index.php');

?>