<?php require("ConnectBDD.php");
if (isset($_POST['Last_Name'])) {

    $nom = $_POST['Nom'];
    $password = $_POST['MotDePasse'];
    $prenom= $_POST['Prenom'];


    //Vérification du mdp/login
    $sql = $conn->prepare("INSERT INTO `tbl_user` VALUES ('?','?','?','?')");
    $sql->execute(array($prenom, $nom, $password));
    $userexist = $sql->rowCount();
    $userinfo = $sql->fetch();

    if ($userexist == 1) {
        echo "<p>Utilisateur deja existant. Merci de recommencer</p>";
        include('index.php');
        exit;
    } else {
        session_start();
        $go = "index.php";
        header("location:$go");
        echo "<p>Vous etes bien logu2</p>";
    }
} else {
    echo "Il manque des champs";
}
include('head.html') ?>
<title>Accueil</title>
</head>
<div>
    <a href="index.php"><input type="button" class="btn" value='Déconnexion' /></a>
</div>

</html>