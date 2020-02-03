<?php require("ConnectBDD.php");
session_start();
include("head.html");
include("User.php"); ?>
<title>Accueil</title>
</head>

<body>
    <?php
    try {
        $DonneeUser = $conn->query("SELECT * FROM Note");
        $TabUser = 0;
        while ($tab = $DonneeUser) {
            $TabUser[$TabUser++] = new User($tab["Id_Note"], $tab["Note"]);
        }
    } catch (exception $e) {
        $e->getMessage();
    }

    ?>
    <FORM action="" method="POST">
        <?php
        foreach ($TabUser as $objetUser) {
            echo '<p><input type="checkbox" value="' . $objetUser->getId() . '" name="User[]" />';
            echo '<label for="coding">' .
                $objetUser->getNote() . ' </label></p>';
        }
        ?>
        <input type="submit"></input>
    </FORM>

    <?php
    if (isset($_POST["Note"])) {
        foreach ($_POST['Note'] as $IdUser) {
            $j = 0;
            foreach ($TabUser as $objetUser) {
                if ($objetUser->getId() == $IdUser) {
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