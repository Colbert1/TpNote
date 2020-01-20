<?php
session_start();

include("head.html"); ?>
<title>Accueil</title>
</head>

<body>
    <div class="container login-form">
        <h2 class="login-title">- Suppression dans la BDD -</h2>
        <div class="panel panel-default">
            <div class="panel-body">

                <!--Suppression-->
                <form action="DataNote.php" method="post">

                    <!--Ligne-->
                    <div class="input-group login-user">
                        <input type="text" name="ligne" placeholder="Choix de la ligne">
                    </div>
                    <!--Table-->
                    <div class="input-group login-user">
                        <input type="text" name="table" placeholder="Choix de la table">
                    </div>
                    <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Confirmer</button>

                </form>
            </div>

        </div>
    </div>
</body>

</html>