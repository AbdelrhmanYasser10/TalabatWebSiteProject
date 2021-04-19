<?php
include('conn.php');
$sql = "SELECT * FROM resturant";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

function printProductCard($name,$img){
    if(isset($_GET['id'])) {
        // id index exists
        $id = $_GET['id'];
   
    echo'
    <div class="col-6 col-md-4 col-sm">
    <div class="card">
    <img class="card-img-top" src="../img/'.$img.'" alt="Card image cap" style="width:100%;text-algin:center;"">
    <div class="card-body">
      <h5 class="card-title">'.$name.'</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <a href="Menu.php?name='.$name.'&id='.$id.'" class="btn btn-danger">Go to Menu</a>
        </div>
      </div>
    </div>
    <br>';
        }
        else{
            echo'
            <div class="col-6 col-md-4 col-sm">
            <div class="card">
            <img class="card-img-top" src="../img/'.$img.'" alt="Card image cap" style="width:100%;text-algin:center;"">
            <div class="card-body">
              <h5 class="card-title">'.$name.'</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <a href="Menu.php?name='.$name.'" class="btn btn-danger">Go to Menu</a>
                </div>
              </div>
            </div>
            <br>';
        }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>All Resturants</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <style>
        nav .navbar-nav li a {
            color: white !important;
        }
        
        .container section a {
            color: #d8d8d8;
            text-decoration: none;
        }
        
        .container section a:hover {
            color: rgb(255, 94, 0);
        }
    </style>

  <body>


  <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(255, 94, 0); color: white;">
        <div class="container">
        <?php
                                                if(isset($_GET['id'])) {

$customerId = $_GET['id'];
echo'<a href="Home.php?id='.$customerId.'"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>';
                                                }
                                                
                                                else{echo'<a href="Home.php"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>';}
            
            
            
            ?>            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Become a partner</a>
                        </li>
                        <li class="nav-item">
                        <?php
                                                if(isset($_GET['id'])) {

                              $customerId = $_GET['id'];

                              echo'<a class="nav-link" href="Resturants.php?id='.$customerId.'">All Resturants</a>';
                                                }
                                                else{
                            echo'<a class="nav-link" href="Resturants.php">All Resturants</a>';
                                                }
                            ?>                        </li>
                    </ul>
                    <div class="nav-item">
                    <?php
                    if(isset($_GET['id'])) {
                        // id index exists
                        $id = $_GET['id'];
                        include("conn.php");
                        $sql = "SELECT * FROM customers WHERE CustomerID  ='$id'";
                        if($res = $conn->query($sql)){
                        $count = $res->rowCount();
                        $row = $res->fetch(PDO::FETCH_ASSOC);

                        if($count == 1 && !empty($row)){
                            echo'Welcome ,<a href="profile.php?id='.$id.'" style="
                            text-decoration: none;
                            color: white;
                        "> '.$row['fname'].' '.$row['lname'].'</a>';
                            }
                        
                        else{
                        echo'<a href="LogIn.php" style="text-decoration:none;">
                        <button type="button" class="btn btn-light btn-block" onclick="">
                        LogIn Or SignUp
                        </button>
                        </a>';
                        }
                    }
                }
                else{
                    echo'<a href="LogIn.php" style="text-decoration:none;">
                        <button type="button" class="btn btn-light btn-block" onclick="">
                        LogIn Or SignUp
                        </button>
                        </a>';
                }
                       ?> 

                       
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>

<div class="container">
    <div class="row justify-content-md-center">

    <div class="card-group" style="align-items: center;">
        <?php
        foreach($rows as $r){
            printProductCard($r['Rest_name'],$r['Rest_Img']);
        }
        ?>
    </div>
    </div>
</div>
        <div class="container-fluid bg-dark" style="margin-top: 5%; padding: 10px;">
        <div class="container">
            <section style="display: flex;
            justify-content: space-between;
            padding-top: 3rem!important;
    padding-bottom: 3rem!important;">


                <a href="#">Feedback</a>
                <a href="#">Careers</a>
                <a href="#">Terms</a>
                <a href="#">FAQ</a>
                <a href="#">Privacy</a>
                <a href="#">Contact Us</a>
                <a href="#">Sitemap</a>
            </section>
            <p class="text-center" style="color: white;">all rights presented by Abdelrhman Yasser</p>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>