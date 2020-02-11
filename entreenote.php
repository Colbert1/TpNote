<?php require("ConnectBDD.php");
session_start();

if (isset($_POST['Eleve'])) {

    $eEleve = $_POST['Eleve'];
    $eNote = $_POST['Note'];
    //Ajout de la note -à faire-    
    $sql_RecupID = $conn->query("SELECT `Eleve`.`Id_Eleve` FROM `Eleve` WHERE `Eleve`.`Nom` = $eEleve");
    $Id_Eleve = $sql_RecupID->fetch();
    $sql_RecupID->closeCursor();

    $sql = $conn->query("INSERT INTO `Note` (`Id_Note`, `Id_Prof`, `Id_Eleve`, `Note`) VALUES (NULL,``,`$Id_Eleve`,`$eNote`) WHERE `Note`.`Id_Eleve` = `Eleve`.`Id_Eleve` AND `Note`.`Id_Prof` = `Prof`.`Id_Prof`");
    echo "Rentrée réalisée";
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
                            $TabUser[$TabUserIndex++] = new User($tab['Id_Eleve'], $tab['Nom']);
                        }
                    } catch (exception $e) {
                        $e->getMessage();
                    }
                    //parcours du tableau de User pour afficher les options de la liste déroulante
                    foreach ($TabUser as $objetUser) {
                        echo '<option value='.$objetUser->getId().'>'.$objetUser->getNote().'</option>';
                    } ?>
                </select>
            </div>



            <!--Note-->
            <div class="login-user">
                <select name="Note" id="Note">
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        //echo '<option name="Note" value="' . $i . '">' . $i . '</option>';
                        echo '<option value="Note">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>

    <?php

    //traitement du formulaire
    if (isset($_POST["Eleve"])) {
        //recherche de l'id dans le tableau de user
        foreach ($TabUser as $objetUser) {
            if ($objetUser->getId() == $_POST["Eleve"]) {
                $objetUser->afficherNote();
            }
        }
    }else{
        echo"Aucun user selectionné";
    }
    ?>
</body>

</html>