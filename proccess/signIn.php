<?php
require_once "../connexion.php";
session_start();

if($_POST['mail'] != '' && $_POST['mdp'] != ''){
        $data = [
            'mail' => $_POST['mail'],
        ];

        $requete = $database->prepare('SELECT * FROM users WHERE mail = :mail');
        $requete->execute($data);

        $result = $requete->fetchAll(PDO::FETCH_ASSOC); //le résultat est stocké en format tableau avec un clé et une valeur
        
        if(!empty($result) && password_verify($_POST['mdp'],$result[0]['mdp'])) {
            //redirection vers la page principale après l'insertion en base de donnée
            //var_dump($result);
            //de la forme :
            // array(1) { [0]=> array(6) { ["id"]=> int(2) ["name"]=> string(7) "Quentin" ["pseudo"]=> string(5) "Finex" ["mail"]=> string(30) "quentin.garnier@edu.devinci.fr" ["password"]=> string(7) "456Lune" ["picture"]=> string(184) "https://static.cnews.fr/sites/default/files/styles/image_744_419/public/2023-01-24t002359z_1910106149_rc2hzt9va06r_rtrmadp_3_tesla-musk-trial-taille1200_63d3cebecad48.jpg?itok=ppLN-B9d" } }
            $_SESSION["user"] = $result[0];
            $_SESSION["id"] = $result[0]["id"];
            header('Location: ../index.php');
        } else {
            echo 'Une erreur est survenue';
            header('Location: ../pages/connection.php');
        }

    } else {
        echo 'Veuillez remplir le champ';
    
    }
?>