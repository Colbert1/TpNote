<?php
class User
{
    private $_id;
    private $_Note;

    public function __construct($id, $Note)
    {
        $this->_id = $id;
        $this->_Note = $Note;
    }
    public function getId()
    {
        return $this->_id;
    }
    public function getNote()
    {
        return $this->_Note;
    }

    public function afficherNote()
    {
        echo "Eleve numero " . $this->_id . " : " . $this->_Note;
    }

    public function deleteNote()
    {
        echo "" . $this->_id . "" . $this->_Note;
        global $conn;
        $delet = $conn->prepare("DELETE FROM `Note` WHERE `Id_Note` = ?");
        $delet->execute(array($this->_id));
    }
}
