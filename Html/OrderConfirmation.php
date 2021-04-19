<?php
$user_id = $_GET['id'];
$resturant_name = $_GET['name'];
$order_price = $_GET['price'];
$meals_quantity = $_GET['quantity'];
$order_date = date("Y-m-d");
include('conn.php');

if($user_id !=""){
$sql = "INSERT INTO `orders_tab`(`Order_ID`, `Order_Date`, `Customer_ID`, `ResturantName`, `Price`, `MealsQuantity`)
 VALUES (null,'$order_date',$user_id,'$resturant_name','$order_price','$meals_quantity')";
$result = $conn->exec($sql);
}

function drawConfirmationMsg(){
    $user_id = $_GET['id'];
    if($user_id != ""){
    $resturant_name = $_GET['name'];
    $order_price = $_GET['price'];
    include('conn.php');
    $sql = "SELECT * FROM customers WHERE CustomerID = '$user_id'";
    $rows = $conn->query($sql);
    foreach($rows as $r){
            echo'<div class="card text-white bg-success mb-3" style="max-width: 90%;
            margin-left: auto;
            margin-top: 10%;
            margin-right: auto;">
            <div class="card-header">Mr/Mrs:  '.$r['fname'].' '.$r['lname'].'  Your Order from '.$resturant_name.'</div>
            <div class="card-body">
              <h5 class="card-title">Has been checked out an it will deliver to you on '.$r['Address'].' after 45 minutes</h5>
              <p class="card-text">
                Order Price : '.$order_price.'$ , Cash On delivery
              </p>
            </div>
          </div>';
    }
}
else{
    echo'<div class="card text-white bg-danger mb-3" style="max-width: 90%;
            margin-left: auto;
            margin-top: 10%;
            margin-right: auto;">
            <div class="card-header">You Have To LogIn First</div>
            <div class="card-body">
              <h5 class="card-title">Please Make Sure to login before making any orders</h5>
            </div>
          </div>';
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Confirmation</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
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
      <?php drawConfirmationMsg();?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>