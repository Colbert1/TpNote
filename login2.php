<?php if(isset($_POST['login'], $_POST['password'])) {
  extract($_POST);

  $login = $_POST['login'];
  $password = $_POST['password'];

  //Connexion à la BDD

  $conn = new PDO('mysql:host=192.168.65.206;dbname=noel;charset=utf8','Colbert','Colbert');

  //Vérification du mdp/login
  $sql = $conn->prepare("SELECT * FROM `tbl_user` where `login` = ? and `pwd` = ?");
  $sql->execute(array($login,$password));
  $userexist = $sql->rowCount();
  $userinfo = $sql->fetch();

  if($userexist == 1) {
    session_start();
    $go = "note.php";
    header("location:$go");
    echo "<p>Vous etes bien logu2</p>";

  }else{
    echo "<p>Mauvais Mot de passe. Merci de recommencer</p>";
    include('index.php'); 
    exit; 
  }   
}else{
  echo "Il manque des champs";
}
include('head.html')?>
    <title>Accueil</title>
</head>
<body>
<div>

<a href="index.php"><input type="button" class="btn" value='Déconnexion'/></a>
</body>
</div>
</html> 



