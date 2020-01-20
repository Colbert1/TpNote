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
                <select name="Nom" id="Nom">
                    
                </select>
            </div>
            <!--Note-->
            <div class="login-user">
                <select name="Note" id="Note">
                    <option value="-1">Note:</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                </select>
            </div>
            <button class="btn btn-primary btn-block login-button" type="submit"><i class="fa fa-sign-in"></i>Enregistrer</button>
        </form>
    </div>
</body>

</html>
<!-- //récupération de la liste des users en BDD.
 try {
 $base = new PDO('mysql:host=localhost; dbname=TestProfSN1', 'root', 'root');
 $DonneeBruteUser = $base->query("select * from user");
 $TabUserIndex = 0;
 while ($tab = $DonneeBruteUser->fetch()){
 //ici on creer nos objets User pour chaque tuple de notre requête
 //et on les places dans un tableau de User
 $TabUser[$TabUserIndex++] = new User($tab['ID_User'],$tab['Nom']);

 }
 }
 catch(exception $e) {
 $e->getMessage();
 }


 <FORM action="" methode="POST">
 <select name="pets" id="pet-select">
 <?php
 //parcours du tableau de User pour afficher les options de la liste déroulante
 foreach ($TabUser as $objetUser) {
 echo '<option value="'.$objetUser->getId().'">'.$objetUser->getNom().'</option>';
 }
 ?>
 </select>
 <input type="submit"></input>
 </FORM>


 class User
 {
 private $_id;
 private $_Nom;
 public function __construct($id,$nom){
 $this->_id = $id;
 $this->_Nom = $nom;
 }
 public function getId(){
 return $this->_id;
 }
 public function getNom(){
 return $this->_Nom;
 }
 }


 //traitement du formulaire
 if (isset($_POST["user"])){
 //recherche de l'id dans le tableau de user
 foreach ($TabUser as $objetUser) {
 if ($objetUser->getId()==$_POST["user"]){
 $objetUser->afficherUser();
 }
 }

 }else{echo"Aucun user selectionné";}
 --!>