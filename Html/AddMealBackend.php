<?php

$dbhost = 'localhost';
$dbname='talabat_website';
$dbuser='root';
$dbpass='';
$conn= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);


$check = true;


$meal_name =$_REQUEST['MealName'];
$res_name = $_REQUEST['SelectResturant'];
$meal_price = $_REQUEST['price'];
$meal_details = $_REQUEST['details'];

$sql1 = "SELECT * FROM menu";
$rows = $conn->query($sql1);

foreach($rows as $r){
    if($r['MealName'] == $meal_name){
        $check = false;
    }
}

if($check){
    $sql = "INSERT INTO `menu`(`ID`, `resturantName`, `MealName`, `Price`, `details`, `mealimg`, `number_of_orders`)
     VALUES (null,'$res_name','$meal_name','$meal_price','$meal_details','','')";
     $result = $conn->exec($sql);

     if($result !== false){
         echo "AdminPage.php";
     }
     else{
         echo "invalid";
     }
}
else{
    echo'Meal Name Already Exsist';
}


?>