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
}
