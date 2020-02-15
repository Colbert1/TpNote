<?php require("ConnectBDD.php");
session_start();
include("head.html");
include("User.php"); ?>
<title>Suppression</title>
</head>

<body>
    <?php
    try {
        $DonneeBruteUser = $conn->query("SELECT * FROM Note");
        $TabUserIndex = 0;
        while ($tab = $DonneeBruteUser->fetch()) {
            $TabUser[$TabUserIndex++] = new User($tab["Id_Note"], $tab["Note"]);
        }
    } catch (exception $e) {
        $e->getMessage();
    }


    ?>
    <FORM action="" method="POST">
        <p>Qui Supprimer ?</p>
        <?php
        foreach ($TabUser as $objetUser) {
            echo '<p><input type="checkbox" value="' . $objetUser->getId() . '" name="Note[]" />';
            echo '<label for="coding">' . $objetUser->getNote() . ' </label></p>';
        }
        ?>
        <input type="submit"></input>
    </FORM>

    <?php
    if (isset($_POST["Note"])) {
        foreach ($_POST['Note'] as $idUser) {
            $j = 0;
            foreach ($TabUser as $objetUser) {
                if ($objetUser->getId() == $idUser) {
                    $objetUser->deleteNote();
                    unset($TabUser[$j]);
                }
                $j++;
            }
        }
    }
    ?>
    </FORM>
</body>

</html>