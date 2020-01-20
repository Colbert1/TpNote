<?php include('head.html') ?>
<title>Connexion</title>
</head>

<!--Connexion utilisateur-->

<body>
    <div class="login-form">
        <h2 class="login-titre">- Identification -</h2>
        <div class="panel panel-default">

            <div class="panel-body">
                <!--Formulaire POST-->
                <form method="post" action="login2.php">
                    <!--Login-->
                    <div class="login-user">

                        <input id="txtUser" type="text" class="form-control" name="login" placeholder="Nom">
                    </div>
                    <!--Mot de Passe-->
                    <div class="login-password">

                        <input id="txtPassword" type="password" class="form-control" name="password" placeholder="Mot de passe">
                    </div>
                    <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Connexion</button>
                </form>
            </div>

        </div>

    </div>
</body>

</html>