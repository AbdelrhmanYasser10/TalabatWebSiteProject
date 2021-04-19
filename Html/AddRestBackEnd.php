<?php

$dbhost = 'localhost';
$dbname='talabat_website';
$dbuser='root';
$dbpass='';
$conn= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);


$check = true;


$RestName=$_REQUEST['ResName'];
$RestJoinDate = $_REQUEST['JoinDate'];
$RestHotline = $_REQUEST['phonenumber'];

$sql1 = "SELECT * FROM resturant";
$rows = $conn->query($sql1);

foreach ($rows as $r){
    if($r['Rest_name'] == $RestName || $r['phone_number'] == $RestHotline){
        $check = false;
    }
}

if($check){
$sql ="INSERT INTO `resturant`(`Rest_name`, `Rest_JoinDate`, `Rest_ID`, `Rest_no_Orders`, `Rest_Img`, `phone_number`) 
VALUES ('$RestName','$RestJoinDate',null,'0','','$RestHotline')";

$result = $conn->exec($sql);

if($result !== false){
    echo "AdminPage.php";
}
else{
    echo "invalid";
}

}
else{
    echo'Invalid Data , Already exsist';
}

?>