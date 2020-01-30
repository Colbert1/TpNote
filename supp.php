<?php
session_start();
include("head.html");
include("User.php"); ?>
<title>Accueil</title>
</head>

<body>
    <?php
    try {
        $conn = new PDO('mysql:host=192.168.65.206;dbname=noel;charset=utf8', 'Colbert', 'Colbert');
        $DonneeUser = $conn->query("SELECT * FROM Eleve");
        $TabUserIndex = 0;
        while ($tab = $DonneeUser) {
            $TabUser[$TabUserIndex++] = new User($tab["Id_Eleve"], $tab["Nom"]);
        }
        }
        catch(exception $e) {
        $e->getMessage();
        }
       
    ?>

    <h2 class="login-title">- Suppression dans la BDD -</h2>
    <FORM action="" method="POST">
        <?php
        foreach ($TabUser as $objetUser) {
            echo '<p><input type="checkbox" value="' . $objetUser->getId() . '" name="users[]" />';
            echo '<label for="coding">' .
                $objetUser->getNom() . ' </label></p>';
        }
        ?>
        <input type="submit"></input>
    </FORM>
</body>

</html>