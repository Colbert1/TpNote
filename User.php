<?php
class User
{
    private $_id;
    private $_Nom;

    public function __construct($id, $nom)
    {
        $this->_id = $id;
        $this->_Nom = $nom;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getNom()
    {
        return $this->_Nom;
    }

    public function afficherUser(){
        echo "".$this->_id."".$this->_Nom;
    }

    public function deleteUser(){
        echo "".$this->_id."".$this->_Nom;
        global $conn;
        $delet = $conn->prepare("DELETE FROM `Note` WHERE `Id_Note` = ?");
        $delet->execute(array($this->_id));
    }
}
?> 