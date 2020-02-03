<?php require("ConnectBDD.php");
if (isset($_POST['login'])) {
    $type = 0;
}
if (isset($_POST['login'], $_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    //Vérification du mdp/login PROFS
    if ($type == 0) {

        if (empty($_POST['login'])) {
            echo 'passe le login';
        }
        $sql = $conn->prepare("SELECT * FROM `Prof` where `Nom` = ? and `MotDePasse` = ?");
        $sql->execute(array($login, $password));
        $userexist = $sql->rowCount();
        $userinfo = $sql->fetch();
    } elseif ($type == 1) {
        $sql = $conn->prepare("SELECT * FROM `Eleve` where `Nom` = ? and `MotDePasse` = ?");
        $sql->execute(array($login, $password));
        $userexist = $sql->rowCount();
        $userinfo = $sql->fetch();
    }
    if ($userexist == 1) {
        session_start();
        $go = "entreenote.php";
        header("location:$go");
    } else {
        echo "<p>Mauvais Mot de passe. Merci de recommencer</p>";
        include('index.php');
        exit;
    }
} else {
    echo "Il manque des champs";
}
include('head.html') ?>
<title>Accueil</title>
</head>

<body>
    <div>
        <div class="login-form">
            <h2 class="login-titre">- Identification Prof -</h2>
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
                        <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Connexion</button>
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