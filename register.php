<?php
include "dbBroker.php";
include "user.php";

session_start();
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $firstname=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $korisnik=new User(1, $name, $email, $password);
    $odgovor=User::logIn($korisnik, $conn);    

    //jedan red znači jedan korisnik
    if($odgovor->num_rows==1) {
        //prima id korisnika koji je ulogovan
        $_SESSION['id']=$korisnik->id;
        header('Location: index.php');
        exit();
    }
    else {
        echo `<script> console.log("Neuspesna prijava"); </script>`;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    
    <p id="apply"></p>
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-12 col-lg-6">
                <div id="ui">
                    <h2 class="reg text-center">Register</h2>
                    <br>
                    <form class="form-group text-center" method="POST" action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>
                        </div>
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <br>
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        <br>
                        <input type="submit" name="create" value="Submit" class="btn btn-primary btn-block btn-lg">
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="img/img5.jpg" class="img-fluid">
            </div>
        </div>
    </div>
    <!--connect-->
    <p id="connect"></p>
    <div class="container-fluid padding">
        <div class="row text-center paading">
            <div class="col-12">
                <h2>Connect</h2>
            </div>
            <div class="col-12 social padding">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                <a href="https://twitter.com/?lang=sr"><i class="fab fa-twitter"></i></a>
                <a href="https://myaccount.google.com/?tab=kk"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>

    <!--footer-->

    <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="img/img1.png" height="100" width="100">
                    <hr class="light">
                    <p>012-345-678</p>
                    <p>code@email.com</p>
                    <p>100 Street Name</p>
                    <p>City, State, 00000</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Our hours</h5>
                    <hr class="light">
                    <p>Monday: 9am - 5pm</p>
                    <p>Saturday: 10am - 4pm</p>
                    <p>Sunday: closed</p>
                </div>
                <div class="col-md-4">
                    <hr class="light">
                    <h5>Service Area</h5>
                    <hr class="light">
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                    <p>City, State, 00000</p>
                </div>
                <div class="col-12">
                    <hr class="light-100">
                    <h5>&copy code.com</h5>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/9b02447dda.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>