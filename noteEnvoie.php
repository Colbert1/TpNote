<?php
session_start();

if (isset($_POST['Eleve'], $_POST['Note'])) {
    extract($_POST);
    $eEleve = $_POST['Eleve'];
    $eNote = $_POST['Note'];

    //Connexion à la BDD
    $conn = new PDO('mysql:host=localhost;dbname=noel', 'Colbert', 'Colbert');

    //Ajout de la note -à faire-
    $sql = $conn->prepare("INSERT INTO `note` VALUES (?,?)");
    $sql->execute(array($eEleve, $eNote));
    $userexist = $sql->rowCount();
    $userinfo = $sql->fetch();
    include("note.php");
} else {
    echo '<p>Vous avez oublié de remplir un champ.</p>';
    include('note.php');
    // On renvoie vers la page
    exit;
}
