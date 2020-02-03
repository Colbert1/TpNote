<?php require("ConnectBDD.php");
session_start();

if (isset($_POST['Nom'])) {

    $eEleve = $_POST['Eleve'];
    $eNote = $_POST['Note'];
    //Ajout de la note -à faire-
    echo "SELECT `Eleve`.`Id_Eleve` FROM `Eleve`.`Nom` WHERE `Eleve`.`Nom` = ".$eEleve."";
    $recupID = $conn->query("SELECT `Eleve`.`Id_Eleve` FROM `Eleve`.`Nom` WHERE `Eleve`.`Nom` = ".$eEleve."");
    $recupID->execute(array($eEleve));
    $recupID->fetch();

    $sql = $conn->query("INSERT INTO `Note`.`Id_Eleve` AND `Note`.`Note` VALUES (?,?)");
    $sql->execute(array($recupID,$eNote));
    $affichageNote = $sql->fetch();
    echo $affichageNote;
}
?>

<?php
include("head.html");
include("User.php"); ?>
<title>PROF</title>
</head>

<body>
    <div>

        <!-----rentrer des notes avec le nom des eleves dans un menu deroulant----->

        <!--Formulaire POST-->
        <form method="post" action="">
            <!--Eleve-->
            <div class="login-user">
                <select name="Eleve" id="Nom">
                    <?php
                    //récupération de la liste des users en BDD.
                    try {
                        $base = new PDO('mysql:host=192.168.65.206; dbname=EcoleDirecte', 'Colbert', 'Colbert');
                        $DonneeBruteUser = $base->query("SELECT * FROM `Eleve`");
                        $TabUserIndex = 0;
                        while ($tab = $DonneeBruteUser->fetch()) {
                            //ici on creer nos objets User pour chaque tuple de notre requête
                            //et on les places dans un tableau de User
                            $TabUser[$TabUserIndex++] = new User($tab['Id_User'], $tab['Nom']);
                        }
                    } catch (exception $e) {
                        $e->getMessage();
                    }
                    //parcours du tableau de User pour afficher les options de la liste déroulante
                    foreach ($TabUser as $objetUser) {
                        echo '<option value=".$objetUser->getId().">' . $objetUser->getNote() . '</option>';
                    } ?>
                </select>
            </div>



            <!--Note-->
            <div class="login-user">
                <select>
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        echo '<option name="Note" value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>

    <?php

    //traitement du formulaire
    if (isset($_POST["User"])) {
        //recherche de l'id dans le tableau de user
        foreach ($TabUser as $objetUser) {
            if ($objetUser->getId() == $_POST["User"]) {
                $objetUser->afficherNote();
            }
        }
    }else{
        //echo"Aucun user selectionné";
    }
    ?>
</body>

</html>