<?php
$name = $_GET['name'];

include('conn.php');
$sql = "SELECT * FROM menu WHERE resturantName ='$name'";
$sql2="SELECT * FROM resturant WHERE Rest_name='$name'";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt2 = $conn->query($sql2);
$rows2= $stmt2->fetchAll(PDO::FETCH_ASSOC);


function printResturant($name,$phoneno,$img){
    echo'<div class="jumbotron jumbotron-fluid">
    <div class="container">
    <img src="../img/'.$img.'" style="float: left; border-radius:50%" width="150px" height="150px">
      <h1 class="display-4" style="display: inline-block;">'.$name.' MENU</h1>
      <p class="lead font-weight-bolder text-uppercase">Call <span class="text-danger">'.$phoneno.'</span> For Support</p>
    </div>
      </div>';
}

function printMeal($name,$img,$details,$price,$no_orders,$rest_name){
    $user_id="";
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
}
    echo'
    <div class="row p-2 bg-white border rounded">
    <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="../img/'.$rest_name.'/'.$img.'"></div>
    <div class="col-md-6 mt-1">
    
        <h5>'.$name.' Meal</h5>   
        <div class="d-flex flex-row">
        <div> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> <span class="fa fa-star star-active"></span> </div>
        <span>&nbsp;	'.$no_orders.'</span>
        </div>
        <p class="">'.$details.'<br><br></p>
    </div>
    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
        <div class="d-flex flex-row align-items-center">
            <h4 class="mr-1">'.$price.' EGP</h4>
        </div>
        <div class="d-flex flex-column mt-4"><a href="cart.php?name='.$rest_name.'&id='.$user_id.'"><button class="btn btn-outline-danger btn-sm mt-2" type="button">Add to cart</button></a></div>
    </div>
</div>
    <br>';
}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Menu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            
            
            
            ?>
            
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
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
                            ?>
                          </li>
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



<?php
        foreach($rows2 as $s){
            printResturant($s['Rest_name'],$s['phone_number'],$s['Rest_Img']);
        }
?>

    <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
        <?php
        foreach($rows as $r){
            printMeal($r['MealName'],$r['mealimg'],$r['details'],$r['Price'],$r['number_of_orders'],$r['resturantName']);
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

    <script>
    
    </script>

</html>