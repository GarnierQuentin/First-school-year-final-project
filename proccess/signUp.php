<?php
session_start();


require_once "../connexion.php";

if($_POST['prenom'] != '' && $_POST['nom'] != '' && $_POST['pseudo'] != '' && $_POST['mail'] != '' && $_POST['mdp'] != '' && $_POST['profile_picture'] != ''){
    $data = [
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'pseudo' => $_POST['pseudo'],
        'mail' => $_POST['mail'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT),
        'profile_picture' => $_POST['profile_picture']
    ];

    $requete = $database->prepare('INSERT INTO users (prenom, nom, pseudo, mail, mdp, profile_picture) VALUES (:prenom, :nom, :pseudo, :mail, :mdp, :profile_picture)');
    $requete->execute($data);

    $recherche = $database->prepare('SELECT * FROM users ORDER BY id DESC');
    $recherche->execute();

    $result = $recherche->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur

    if($requete) {
        //redirection vers la page principale après l'insertion en base de donnée
        $_SESSION["user"] = $result[0];
        $_SESSION["id"] = $result[0]["id"];
        header('Location: ../index.php');
        //var_dump($result);
    } else {
        echo 'Une erreur est survenue';
    }

} else {
    echo 'Veuillez remplir le champ';
}

?>