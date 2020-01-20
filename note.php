<?php
include("head.html");
?>
<title>Sujet</title>
</head>

<body>
<div>
    <table>
            <tr>
                <th>Nom de l'eleve</th>
                <th>Note /20</th>
            </tr>
            <?php
            /*
                echo "<tr><td>";
                Appel du Nom + Note
                $sql = $conn->prepare("SELECT * FROM `note` AND convert(TEXT,CHAR)");
                $sql->fetch();
                echo "$sql";
                echo "</td></tr>";*/
            ?>
    </table>
</div>
<div>
        <!--Formulaire POST-->
        <form action="noteEnvoie.php" method="post">
            <!--Eleve-->
            <div class="login-user">
                <input type="text" class="form-control" name="Eleve" placeholder="Nom">
            </div>
            <!--Note-->
            <div class="login-user">
                <input type="text" class="form-control" name="Note" placeholder="Note">
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>
</body>

</html>