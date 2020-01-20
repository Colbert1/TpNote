<?php 
if(isset($_POST['Last_Name'])) 
{
  
    $LastName = $_POST['Last_Name'];
    $password = $_POST['password'];
    $pseudo   = $_POST['Pseudo'];
    $id       = $_POST['id'];
  
    //Connexion à la BDD
  
    $conn = new PDO('mysql:host=192.168.65.206;dbname=noel;charset=utf8','Colbert','Colbert');
  
    //Vérification du mdp/login
    $sql = $conn->prepare("INSERT INTO `tbl_user` VALUES ('?','?','?','?')");
    $sql->execute(array($id,$pseudo,$LastName,$password));
    $userexist = $sql->rowCount();
    $userinfo = $sql->fetch();
  
    if($userexist == 1) {
        echo "<p>Utilisateur deja existant. Merci de recommencer</p>";
        include('index.php'); 
        exit; 
  
    }else{
        session_start();
        $go = "note.php";
        header("location:$go");
        echo "<p>Vous etes bien logu2</p>";
    }   
  }else{
    echo "Il manque des champs";
  }
  include('head.html')?>
      <title>Accueil</title>
  </head>
  <div>
  
  <a href="index.php"><input type="button" class="btn" value='Déconnexion'/></a>
  </div>
  </html> 