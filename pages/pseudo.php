<?php 

require_once "../connexion.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>pseudo</title>
</head>
<body>
    <form action="../proccess/search.php" method="POST">
        <input type="text" name="recherche" placeholder="Recherchez un utilisateur">
        <input type="submit" value="Rechercher">
    </form>

    <?php

    if(isSet($_POST["recherche"])){
        require "../proccess/search.php";
    }

    ?>


</body>
</html>