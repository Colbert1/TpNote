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
<div>
        <!--Formulaire POST-->
        <form action="noteEnvoie.php" method="post">
            <!--Eleve-->
            <div class="login-user">
                <input type="text" class="form-control" name="Eleve" placeholder="Nom">
                <select name="Nom" id="Nom">
                    <?php
                    try {
                        $base = new PDO('mysql:host=192.168.65.206; dbname=EcoleDirecte', 'Colbert', 'Colbert');
                        $DonneeUser = $base->query("SELECT * from User");
                        $TabUserIndex = 0;
                        while ($tab = $DonneeUser->fetch()) {
                            //ici on creer nos objets User pour chaque tuple de notre requête
                            //et on les places dans un tableau de User
                            $TabUser[$TabUserIndex++] = new User($tab['Id_User'], $tab['Nom']);
                        }
                    } catch (exception $e) {
                        $e->getMessage();
                    }
                    ?>
                </select>
            </div>
            <!--Note-->
            <div class="login-user">
                <select>
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>
    <!--
 <FORM action="" methode="POST">
 <select name="pets" id="pet-select">
 <?php
    /*parcours du tableau de User pour afficher les options de la liste déroulante
    foreach ($TabUser as $objetUser) {
        echo '<option value="' . $objetUser->getId() . '">' . $objetUser->getNom() . '</option>';
    } */
    ?>
 </select>
 <input type="submit"></input>
 </FORM>


 


 //traitement du formulaire
 if (isset($_POST["user"])){
 //recherche de l'id dans le tableau de user
 foreach ($TabUser as $objetUser) {
 if ($objetUser->getId()==$_POST["user"]){
 $objetUser->afficherUser();
 }
 }

 }else{echo"Aucun user selectionné";}
 -->