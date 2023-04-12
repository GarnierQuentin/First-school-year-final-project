<?php

    try{

    $database = new PDO('mysql:host=localhost;dbname=cdi-axe-project', 'root', '');

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

?>