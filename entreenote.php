<?php
session_start();

if (isset($_POST['Eleve'], $_POST['Note'])) {
    extract($_POST);
    $eEleve = $_POST['Eleve'];
    $eNote = $_POST['Note'];

    //Connexion à la BDD
    $conn = new PDO('mysql:host=localhost;dbname=noel', 'Colbert', 'Colbert');

    //Ajout de la note -à faire-
    $sql = $conn->prepare("INSERT INTO `note` VALUES (?,?)");
    $sql->execute(array($eEleve, $eNote));
    $userexist = $sql->rowCount();
    $userinfo = $sql->fetch();
    include("note.php");
}
?>


<?php 
include("head.html");?>
<title>PROF</title>
</head>
<body>
<div>

<!-----ici il faut qu'on puisse rentrer des notes avec le nom des eleves dans un menu deroulant comme avec les notes 
    la boucle note ligne 66 a 78 tu y touches pas !!! ----->
        <!--Formulaire POST-->
        <form action="entreenote.php" method="post">
            <!--Eleve-->
            <div class="login-user">
                <input type="text" class="form-control" name="Eleve" placeholder="Nom">
                <select name="Nom" id="Nom">
                    <?php
                        $base = new PDO('mysql:host=192.168.65.206; dbname=EcoleDirecte', 'Colbert', 'Colbert');
                        $sql2 = $conn->query("SELECT `Nom` FROM `Eleve`");
                        $userinfo = $sql2->fetch();
                    ?>
                </select>
            </div>



            <!--Note-->
            <div class="login-user">
                <select>
                    <?php
                    for ($i = 0; $i <= 20; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>



    
<!-- exemple du cours-->
 <FORM action="" methode="POST">
 <select name="pets" id="pet-select">
 <?php
                //parcours du tableau de User pour afficher les options de la liste déroulante
                foreach ($TabUser as $objetUser) {
                echo '<option value="' . $objetUser->getId() . '">' . $objetUser->getNom() . '</option>';
                } 
    ?>
 </select>
 <input type="submit"></input>
 </FORM>


 


 <?php 
 
 //traitement du formulaire
 if (isset($_POST["user"])){


 //recherche de l'id dans le tableau de user
 foreach ($TabUser as $objetUser) {
 if ($objetUser->getId()==$_POST["user"]){
 $objetUser->afficherUser();
 }
 }

 }else{
     echo"Aucun user selectionné";}
 ?>
</body>
</html>