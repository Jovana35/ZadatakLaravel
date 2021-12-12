<?php 

class User {
public $id;
public $name;
public $email;
public $password;

public function __construct($id=null, $name=null,$email=null,$password=null) {
    $this->id=$id;
    $this->name=$name;
    $this->email=$email;
    $this->password=$password;

}
public static function logIn($usr, mysqli $conn) {
$query="SELECT * FROM users WHERE name='$usr->name' and email='$usr->email' and password='$usr->password'";


//ovde se povezujemo sa bazom
return $conn->query($query);
}
}

?>