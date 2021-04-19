<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

</head>

<body>

   
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(255, 94, 0); color: white;">
        <div class="container">
            <a href="Home.php"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>
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
                            ?>                          </li>
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

    <div class="jumbotron jumbotron-fluid" style="background-color: rgba(255, 243, 225, 0.986);">
        <div class="container text-center">
            <h1 class="display-3">Order food online in Egypt</h1>
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-append"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Search for a resturant" style="margin-top: 5%;">
                <input type="button" class="btn" style="background-color: rgb(255, 94, 0); color: white;margin-top: 5%;" value="Let's Go">
            </div>
        </div>

    </div>



    <div class="container text-center">
        <h1 class="display-5 font-weight-bold">Your everyday , right away</h1>
        <p>Order food and grocery delivery online from hundreds of restaurants nearby</p>
    </div>



    <div class="container">

        <div class="row text-center">
            <div class="col-md">
                <img style="background-color: tomato;" src="../img/vertical-restaurants.webp">
                <h2>Restaurant</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    <br> Ipsa voluptates at, porro, officiis obcaecati molestiae vitae odio iusto,
                    <br> nisi veritatis aut quis fuga quod impedit eos. Cupiditate esse minima laboriosam?</p>
                <?php
                                                if(isset($_GET['id'])) {

                              $customerId = $_GET['id'];

                              echo'<a class="nav-link text-danger" href="Resturants.php?id='.$customerId.'">Explore</a>';
                                                }
                                                else{
                            echo'<a class="nav-link text-danger" href="Resturants.php">Explore</a>';
                                                }
                            ?>              </div>
          
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>

</body>

</html>