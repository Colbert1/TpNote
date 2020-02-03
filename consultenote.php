<?php session_start();
include("head.html");
include("ConnectBDD.php");
?>
<title>Sujet</title>
</head>

<body>
    <!-- Il faut que ici on appelle les données rentrées dans entreenote.php -->
    <?php

    $noteelv = $conn->prepare("SELECT * FROM `Note` WHERE Id_Eleve = ?");
    $noteelv->execute(array($_SESSION['Id_Eleve']));

    while ($note = $noteelv->fetch()) {

        echo " " . $note["Note"];
    }

    ?>

</body>

</html>