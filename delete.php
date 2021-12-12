<?php
require "dbBroker.php";
require "prijava.php";

if(isset($_POST['id'])){
    $obj = new Prijava($_POST['id']);
    $status = $obj->deleteById($conn);
    if ($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}
?>