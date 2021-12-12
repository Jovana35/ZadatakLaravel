<?php

require "dbBroker.php";
require "prijava.php";

if(isset($_POST['id']) && isset($_POST['course']) && isset($_POST['teacher']) && isset($_POST['price'])) {
$novaPrijava =  new Prijava($_POST['id'], $_POST['course'], $_POST['teacher'], $_POST['price']);
$status = Prijava::update($novaPrijava,$conn);

if ($status){
    echo "Success";
}else{
    echo "Failed";
}

}
?>