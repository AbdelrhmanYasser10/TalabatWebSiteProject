<?php

function numberofCustomers(){
    $dbhost = 'localhost';
    $dbname='talabat_website';
    $dbuser='root';
    $dbpass='';
    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

    $sql="SELECT COUNT(*) FROM customers";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    echo "$row[0]";
}

function numberOfEmployees(){
    $dbhost = 'localhost';
    $dbname='talabat_website';
    $dbuser='root';
    $dbpass='';
    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

    $sql="SELECT COUNT(*) FROM employees";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    echo "$row[0]";
}


function totalNumberOfOrders(){

    $dbhost = 'localhost';
    $dbname='talabat_website';
    $dbuser='root';
    $dbpass='';
    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

    $sql="SELECT SUM(number_of_orders) FROM Menu";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    echo "$row[0]";
}

function AverageSalEmployee(){

    $dbhost = 'localhost';
    $dbname='talabat_website';
    $dbuser='root';
    $dbpass='';
    $mysqli = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 

    $sql="SELECT AVG(salary) FROM employees";
    $result=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($result);
    echo "$row[0]$";

}

function drawEmployees(){
    include('conn.php');
    $sql = "SELECT * FROM employees";
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $r){
        echo'
        <tr>
        <td>'.$r['name'].'</td>
        <td>'.$r['position'].'</td>
        <td>'.$r['Age'].'</td>
        <td>'.$r['hiredate'].'</td>
        <td>'.$r['salary'].'$</td>
        <td>'.$r['gender'].'</td>
        <td>'.$r['phone_number'].'</td>
        <td>
        <a href="UpdateEmployeeData.php?id='.$r['ID'].'">UPDATE</a>
        &nbsp;	&nbsp;	
        <a href="DelEmployee.php?id='.$r['ID'].'">DELETE</a>
        </td>
        </tr>
        ';
    }
}

function drawResturants(){

    include('conn.php');
    $sql = "SELECT * FROM resturant";
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $r){
        echo'
        <tr>
        <td>'.$r['Rest_name'].'</td>
        <td>'.$r['Rest_JoinDate'].'</td>
        <td>'.$r['phone_number'].'</td>
        <td><a href="DelResturant.php?id='.$r['Rest_ID'].'">DELETE</a></td>
        </tr>
        ';
    }

}

function drawMeals(){
    include('conn.php');
    $sql = "SELECT * FROM menu";
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $r){
        echo'
        <tr>
        <td>'.$r['resturantName'].'</td>
        <td>'.$r['MealName'].'</td>
        <td>'.$r['Price'].'</td>
        <td><a href="DelMeal.php?id='.$r['ID'].'">DELETE</a>
        </td>
        </tr>
        ';
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="AdminPage.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Page</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="AdminPage.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Actions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin Actions:</h6>
                        <a class="collapse-item" href="AddResturant.php">Add Resturnat</a>
                        <a class="collapse-item" href="AddEmployee.php">Add Employee</a>
                        <a class="collapse-item" href="AddMeal.php">Add Meal</a>              
                    </div>
                </div>
            </li>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <a class="navbar-brand" href="Home.php"><img src="../img/logoOrange.png" width="100px"></a>


                    <!-- Sidebar Toggle (Topbar) -->
               


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistics</h1>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total number of orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            totalNumberOfOrders();
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Average Salary for employees</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            
                                            <?php
                                            AverageSalEmployee();
                                            ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total numbers of employees
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                 numberOfEmployees();
                                                 ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Number of Customers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                 numberofCustomers();
                                                 ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                
 <!-- DataTales Example -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Database Tables</h1>
                    </div>

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Resturants</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Start date</th>
                                            <th>Hotline</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Name</th>
                                            <th>Start date</th>
                                            <th>Hotline</th>
                                            <th>Actions</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php
                                            drawResturants();
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Employees</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Gender</th>
                                            <th>Phone Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Gender</th>
                                            <th>Phone Number</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php
                                      drawEmployees();
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Menu Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Resturant Name </th>
                                            <th>Meal Name</th>
                                            <th>Price</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Resturant Name </th>
                                            <th>Meal Name</th>
                                            <th>Price</th>
                                            <th>Actions</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                      <?php
                                            drawMeals();
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>


                
                <!-- /.container-fluid -->
                
            </div>
         

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>