<?php require("ConnectBDD.php");
session_start();

if (isset($_POST['Eleve'])) {

    $eEleve = $_POST['Eleve'];
    $eNote = $_POST['Note'];
    //Ajout de la note -à faire-    
    $sql_RecupID = $conn->query("SELECT `Id_Eleve` FROM `Eleve` WHERE `Eleve`.`Nom` = $_POST[Eleve]");
    $Id_Eleve = $sql_RecupID->fetch();
    $sql_RecupID->closeCursor();

    try {
       // echo "INSERT INTO `Note` (`Id_Prof`, `Id_Eleve`, `Note`) VALUES (" . $_SESSION['Id_Prof'] . "," . $eEleve . "," . $eNote . " )";
        $sql = $conn->query("INSERT INTO `Note` (`Id_Prof`, `Id_Eleve`, `Note`) VALUES (" . $_SESSION['Id_Prof'] . "," . $eEleve . "," . $eNote . " )");
    } catch (exception $e) {
        $e->getMessage();
    }
    echo "Rentrée réalisée";
    echo "";
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
                    try {
                        $DonneeBruteUser = $conn->query("SELECT * FROM `Eleve`");
                        $TabUserIndex = 0;
                        while ($tab = $DonneeBruteUser->fetch()) {
                            $TabUser[$TabUserIndex++] = new User($tab['Id_Eleve'], $tab['Nom']);
                        }
                    } catch (exception $e) {
                        $e->getMessage();
                    }
                    foreach ($TabUser as $objetUser) {
                        echo '<option value=' . $objetUser->getId() . '>' . $objetUser->getNote() . '</option>';
                    } ?>
                </select>
            </div>



            <!--Note-->
            <div class="login-user">
                <select name="Note" id="Note">
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        echo '<option value="Note">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>

    <?php
    if (isset($_POST["Eleve"])) {
        foreach ($TabUser as $objetUser) {
            if ($objetUser->getId() == $_POST["Eleve"]) {
                $objetUser->afficherNote();
            }
        }
    } else {
        echo "Aucun user selectionné";
    }
    ?>
</body>

</html>