<?php
class Prijava {
    public $id;
    public $kurs;
    public $profesor;
    public $cena;

    public function __construct($id=null, $kurs=null, $profesor=null, $cena=null) {
        $this->id=$id;
        $this->kurs=$kurs;
        $this->profesor=$profesor;
        $this->cena=$cena;
    }
    
    public static function getAll(mysqli $conn) {
        $query="SELECT * FROM prijave";
        return $conn->query($query);
    }

    public static function getbyId($id, mysqli $conn) {
        $query="SELECT * FROM prijave WHERE id=$id";
        $objekat = array();
        if($sqlObjekat = $conn->query($query)){
            while($red = $sqlObjekat->fetch_array(1)){
                $objekat[]= $red;
            }
        }

    return $objekat;
    }

    public function deletebyId(mysqli $conn) {
        $query="DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function add(Prijava $prijava, mysqli $conn) {
        $query="INSERT INTO prijave (kurs, profesor, cena) VALUES ('$prijava->kurs','$prijava->profesor', $prijava->cena)";
        return $conn->query($query);
    }

    public static function update(Prijava $novaPrijava, mysqli $conn) {
        $query="UPDATE prijave set kurs='$novaPrijava->kurs', profesor='$novaPrijava->profesor', cena='$novaPrijava->cena' WHERE id='$novaPrijava->id'";
        return $conn->query($query);
    }
}













?>