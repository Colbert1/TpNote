<?php require("ConnectBDD.php");
require("Connexion.php");
if (!empty($_POST)) {
    $u = new Connexion();
    $valid = true;
    if (isset($_POST['connexion'])) {
        $nom = $_POST['login'];
        $mdp = $_POST['password'];

        if (empty($nom)) {
            $valid = false;
            echo "Il y a pas de pseudo.";
        }
        if (empty($mdp)) {
            $valid = false;
            echo "il y a pas de mdp.";
        }
        $verif = $conn->prepare("SELECT * FROM `Eleve` WHERE Nom = :Nom");
        $verif->execute([
            'Nom' => $nom,
        ]);
        $verif = $verif->fetch();


        if ($verif['Nom'] == "") {
            $valid = false;
            echo "Le pseudo est incorrecte";
        }
        if ($verif["MotDePasse"]) {
            $valid = true;
            echo 'Le mot de passe est valide !';
        } else {
            $valid = false;
            echo 'Le mot de passe est invalide.';
        }
        if ($valid) {

            $u->ConnexionEleve($nom);
            header('Location: consultenote.php');
            exit;
        }
    }
}
?>

include('head.html') ?>
<title>Accueil</title>
</head>

<body>
    <div>
        <div class="login-form">
            <h2 class="login-titre">- Identification Eleve -</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <!--Formulaire POST-->
                    <form method="post" action="">
                        <!--Login-->
                        <div class="login-user">
                            <input id="txtUser" type="text" class="form-control" name="login" placeholder="Nom" required>
                        </div>
                        <!--Mot de Passe-->
                        <div class="login-password">
                            <input id="txtPassword" type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                        </div>
                        <button class="btn btn-primary btn-block login-button" type="submit" name="connexion"><i class="fa fa-sign-in"></i>Connexion</button>
                    </form>
                    <form action="registrer.php">
                        <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>S'inscrire</button>
                    </form>
                </div>
            </div>
        </div>
        <a href="index.php"><input type="button" class="btn" value='Retour' /></a>
</body>
</div>

</html>