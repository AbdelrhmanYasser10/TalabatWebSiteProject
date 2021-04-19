<?php
include("conn.php");
$email = $_POST['inputUserame'];
$pass = $_POST['inputPassword'];
$sql = "SELECT * FROM customers WHERE UserName ='$email' AND pass='$pass'";
$res = $conn->query($sql);
$count = $res->rowCount();
$row = $res->fetch(PDO::FETCH_ASSOC);

if($count == 1 && !empty($row)){
    echo'Profile.php?id='.$row['CustomerID'].'';
}
else{
    echo"There is error in username or password";
}
?>
