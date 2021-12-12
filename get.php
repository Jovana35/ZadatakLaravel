<?php
require "dbBroker.php";
require "prijava.php";


if(isset($_POST['id'])){
    $myArray = Prijava::getById($_POST['id'], $conn);
    //vraća u json formatu podatke
    echo json_encode($myArray);
}
?>