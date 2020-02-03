<?php require("ConnectBDD.php");
session_start();
class Connexion
{

    private $_id;


    public function InscriptionEleve($nom, $prenom, $password)
    {
        global $conn;
        $e = $conn->prepare("INSERT INTO `Eleve`(`Nom`, `Prenom`, `MotDePasse`) VALUES (:Nom, :Prenom, :MotDePasse)");
        $e->execute([
            'Nom' => $nom,
            'Prenom' => $prenom,
            'MotDePasse' => $password,
        ]);
    }

    public function ConnexionEleve($nom)
    {
        global $conn;
        $connect = $conn->prepare("SELECT * FROM Eleve WHERE Nom = :Nom");
        $connect->execute([
            'Nom' => $nom,
        ]);
        $connect = $connect->fetch();

        $_SESSION['Id_Eleve'] = $connect['Id_Eleve'];
        $_SESSION['Nom'] = $connect['Nom'];
        $_SESSION['Prenom'] = $connect['Prenom'];
        $_SESSION['MotDePasse'] = $connect['MotDePasse'];
    }

    public function InscriptionProf($nom, $prenom, $password)
    {
        global $conn;
        $e = $conn->prepare("INSERT INTO `Prof`(`Nom`, `Prenom`, `MotDePasse`) VALUES (:Nom, :Prenom, :MotDePasse)");
        $e->execute([
            'Nom' => $nom,
            'Prenom' => $prenom,
            'MotDePasse' => $password,
        ]);
    }

    public function ConnexionProf($nom)
    {
        global $conn;
        $connect = $conn->prepare("SELECT * FROM Prof WHERE Nom = :Nom");
        $connect->execute([
            'Nom' => $nom,
        ]);
        $connect = $connect->fetch();

        $_SESSION['Id_Prof'] = $connect['Id_Prof'];
        $_SESSION['Nom'] = $connect['Nom'];
        $_SESSION['Prenom'] = $connect['Prenom'];
        $_SESSION['MotDePasse'] = $connect['MotDePasse'];
    }
}
