<?php 
require "dbBroker.php";
require "prijava.php";

session_start();
if(!isset($_SESSION['id'])) {
    header('Location: register.php');
    exit();
}

$rezultat=Prijava::getAll($conn);

if(!$rezultat) {
    echo "Greška.";
    die();
}

if($rezultat->num_rows==0) {
    echo "Još uvek nema prijavljenih korisnika.";
    die();
}
else {
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <!--navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="img/img1.png" height="100" width="100"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#courses">Courses</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#connect">Connect</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--image slider-->
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/img2.png" margin="auto" id="img2">
                <div class="carousel-caption">
                    <h1 class="display-2">Code</h1>
                    <h3>Online programming courses</h3>
                    <a href="#connect"><button type="button" class="btn btn-outline-light btn-lg">CONNECT</button></a>
                    <a href="#team"><button type="button" class="btn btn-primary btn-lg">OUR TEAM</button></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/img3.png">
            </div>
            <div class="carousel-item">
                <img src="img/img4.jpg">
            </div>
        </div>
    </div>


    <!--jumbotron-->
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">Learn HTML, CSS, Bootstrap and more.</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#"><button type="button" class="btn btn-outline-secondary-btn-lg">Start learning now</button></a>
            </div>
        </div>
    </div>

    <!--welcome section-->
    <p id="courses"></p>
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Built with ease</h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">Courses</p>
            </div>
        </div>
    </div>

    <!--courses section-->
    <div class="container-fluid padding">
        <div class="row text-center padding">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="fas fa-code"></i>
                <h3>HTML</h3>
                <p>the most basic building block of the web</p>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <i class="fas fa-bold"></i>
                <h3>BOOTSTRAP</h3>
                <p>the world's most popular front-end open source toolkit</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <i class="fab fa-css3"></i>
                <h3>CSS</h3>
                <p>describing the presentation of web pages</p>
            </div>
        </div>
        <hr class="my-4">
    </div>

    <!--table section-->
    <article class="index-table">
        <div class="container">
            <div class="table-responsive">
            <table class="table table-bordered table-hover" style="background-color: #a696ce; text-align: center;">
            <tr>
                <th>Course</th>
                <th>Teacher</th>
                <th>Price</th>
            </tr>
            <?php 
            while($row=$rezultat->fetch_array()):
            ?>
            <tr>
                <td><?php echo $row["kurs"] ?></td>
                <td><?php echo $row["profesor"] ?></td>
                <td><?php echo $row["cena"] ?></td>
                <td>
                <label class="custom-radio-btn">
                <input type="radio" name="checked-donut" value=<?php echo $row["id"] ?>>
                <span class="checkmark"></span>
                </label>
                </td>
            </tr>
            <?php
            endwhile;
        }
            ?>
        </table>
            </div>
        </div>
       
    </article>

    <!-- Choose section-->
    <div class="container-fluid padding">
        <div class="row text-center paading">
            <div class="col-12">
                <h3>Choose</h3>
            </div>
            <div class="col-12 padding">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new course</button>
    <button id="delete" formmethod="post" class="btn btn-danger">Delete selected course</button>
    <button id="izmeni" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Update selected course</button>

            </div>
        </div>
    </div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal sadrzaj-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">

      <div class="container prijava-form">
                        <form action="#" method="post" id="add">
                            <h3 style="color: black; text-align: center">Add new course</h3>
                            <div class="row">
                                <div class="col-md-11 ">
                                    <div class="form-group">
                                        <label for="">Course</label>
                                        <input type="text" style="border: 1px solid black" name="course"  class="form-control" placeholder="Enter course name."/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Teacher</label>
                                        <input type="text" style="border: 1px solid black" name="teacher"  class="form-control" placeholder="Enter teacher's name."/>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Price</label>
                                        <input type="text" style="border: 1px solid black" name="price"  class="form-control" placeholder="Enter price."/>
                                    </div>
                                    <div class="form-group">
                                        <button id="btnAdd" type="submit" class="btn btn-success btn-block" tyle="background-color: purple; border: 1px solid black;">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal sadrzaj-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container prijava-form">
                        <form action="#" method="post" id="update">
                            <h3 style="color: black">Update course</h3>
                            <div class="row">
                                <div class="col-md-11 ">
                                <div class="form-group">
                                        <input id="id" type="text" name="id" class="form-control" placeholder="Id" value="" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input id="course" type="text" name="course" class="form-control" placeholder="Course" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="teacher" type="text" name="teacher" class="form-control" placeholder="Teacher" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="price" type="text" name="price" class="form-control" placeholder="Price" value="" />
                                    </div>
                                    
                                        <button id="btnUpdate" type="submit" class="btn btn-success btn-block" tyle="background-color: purple; border: 1px solid black;">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>



        </div>

    </div>


    <!-- fixed background-->
    <figure>
        <div class="fixed-wrap">
            <div id="fixed">
            </div>
        </div>
    </figure>

    <!--meet the team-->
    <p id="team"></p>
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Meet the team</h1>
            </div>
            <hr>
        </div>
    </div>
    <!--cards-->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="img/img6.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Sarah Doe</h4>
                        <p class="card-text">Sarah is an Internet entrepreneur with almost 10 years of experience.</p>
                        <a href="#team" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="img/img7.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Marie Jo</h4>
                        <p class="card-text">Marie is a designer with almost 5 years of digital design experience.</p>
                        <a href="#team" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="img/img8.jpg">
                    <div class="card-body">
                        <h4 class="card-title">Katy Ho</h4>
                        <p class="card-text">Katy is a developer with over 5 years of web development experience.</p>
                        <a href="#team" class="btn btn-outline-secondary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--philosophy-->
    <div class="container-fluid padding">
        <div class="row padding">
            <div class="col-md-12 col-lg-6">
                <h2>Our Philosophy</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatum deleniti ex repudiandae cupiditate explicabo cum quas, voluptate nostrum voluptatibus, quaerat quos. Accusantium nobis rem error odit sint eaque ipsam ad.</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius, adipisci? Blanditiis facilis nam aliquid magnam beatae temporibus. Ratione iure ut aliquam similique voluptatum voluptas, quod impedit, omnis molestiae corrupti magnam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quia voluptas dolore sed id illo laborum a doloribus, pariatur saepe quis nulla, porro eligendi eum beatae. Rem autem voluptate dolor.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum atque ducimus quibusdam eveniet aperiam, sequi molestias asperiores, quas quia architecto vero! Doloribus nisi doloremque praesentium quaerat, ex iste veritatis ipsam.</p>
                <br>
                
            </div>
            <div class="col-lg-6">
                <img src="img/img9.jpg" class="img-fluid">
            </div>
        </div>
        <hr class="my-4">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9b02447dda.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>