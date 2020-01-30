<?php
session_start();
include("head.html"); ?>
<title>Accueil</title>
</head>

<body>
    <?php
    $conn = new PDO('mysql:host=192.168.65.206;dbname=noel;charset=utf8', 'Colbert', 'Colbert');
    $DonneeUser = $conn->query("SELECT * FROM User");
    $TabUserIndex = 0;

    while ($tab = $DonneeUser->fetch()) {
        $TabUser[$TabUserIndex++] = new User($tab["Id_User"], $tab["Id_Eleve"]);
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