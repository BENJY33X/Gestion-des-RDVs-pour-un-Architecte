<?php
require_once APPROOT.'/config/config.php';
require_once APPROOT."../config/Function.php";
class UserModel
{
    protected $db;
    public function __construct()
    {
        $con = new Database();
        $this->db = $con->dbh;
    }
    public function SelectAll()
    {
        $conn = $this->db;
        $requi = "SELECT * FROM `utilisateur` WHERE id";
        $stm = $conn->prepare($requi);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function select($data, $id)
    {
        $conn = $this->db;
        $requi = "SELECT " . $data . "FROM `utilisateur` WHERE id=" . $id;
        $stm = $conn->prepare($requi);
        return  $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function remove($id)
    {
        $conn = $this->db;
        $requi = "DELETE FROM `utilisateur` WHERE id=" . $id;
        $stm = $conn->prepare($requi);
        $stm->execute();
    }
    // methodes pour insert une data dans database
    public function insert($data)
    {
        $conn = $this->db;
        $requi = "INSERT INTO `utilisateur` (Nom,Prenom,Age,CIN,Reference_unique) VALUES (?,?,?,? )";
        $stm = $conn->prepare($requi);
        $stm->execute($data);
    }
    public function Updat($data, $id)
    {
        $conn = $this->db;
        $requi = "UPDATE `utilisateur` SET `Nom`=" . $data['Nom'] . ",`Prenom`=" . $data['Prenom'] . ",`Age`=" . $data['Age'] . ",`CIN`=" . $data['CIN'] . ",`Reference_unique`=" . $data['Reference_unique'] . " WHERE id=$id";
        $stm = $conn->prepare($requi);
        $stm->execute();
    }
    
}
