<?php
function drawProfile(){
    $customerId = $_GET['id'];
    include('conn.php');
    $sql = "SELECT * FROM customers WHERE CustomerID ='$customerId'";
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $r){
    echo'
    <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://i1.sndcdn.com/avatars-000377745656-i794s5-t500x500.jpg" alt=""/>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        '.$r['fname'].' '.$r['lname'].'
                                    </h5>
                                   
                                    <p class="proile-rating">UserName <span>'.$r['UserName'].'</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="UpdateUserData.php?id='.$r['CustomerID'].'"><input type="button" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"></a>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$r['CustomerID'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$r['fname'].' '.$r['lname'].'
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$r['Email'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>'.$r['phone_no'].'</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6" style="text-transform:uppercase;">
                                                <p>'.$r['gender'].'</p>
                                            </div>
                                        </div>
                                      
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div style ="text-align:right;">
                <a href="Home.php"><button type="button" class="btn btn-danger">LogOut</button></a>
                </div>
    
    ';
    }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <title>Your Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <style>
body{
    background: white;
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
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
            <?php
            $customerId = $_GET['id'];
            echo'<a href="Home.php?id='.$customerId.'"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>'
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
                            $customerId = $_GET['id'];
                            echo'<a class="nav-link" href="Resturants.php?id='.$customerId.'">All Resturants</a>';
                            ?>
                        </li>
                    </ul>
                    <div class="nav-item">
                        <!-- Button to Open the Modal -->
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

  <div class="container emp-profile">
            <form method="post">
                <?php
                drawProfile();
                ?>
            </form>           
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