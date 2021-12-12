<?php
$host="localhost";
$db="code";
$user="root";
$password="";

$conn=new mysqli($host, $user, $password, $db);


if($conn->connect_errno) {
    exit("Konekcija nije uspostavljena.");
}
?>