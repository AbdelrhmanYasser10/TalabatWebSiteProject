<?php
$cus_id = $_GET['id'];

$dbhost = 'localhost';
$dbname='talabat_website';
$dbuser='root';
$dbpass='';
$conn= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);


$check = true;


$user_username=$_REQUEST['inputUserame'];
$user_fname = $_REQUEST['fname'];
$user_lname = $_REQUEST['Lname'];
$user_email = $_REQUEST['inputEmail'];
$user_phoneno = $_REQUEST['phonenumber'];
$user_passset = $_REQUEST['inputPassword'];
$user_passcon=$_REQUEST['inputConfirmPassword'];
$user_gender =$_REQUEST['gender'];
$user_address = $_REQUEST['address'];





if($user_passset !== $user_passcon){

echo"The Password not match the confirmation";
}
else{

    $password = $user_passset;

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length<br> and should include at least one upper case letter, one number, and one special character.';
}else{



$sql1 = "SELECT * FROM customers WHERE CustomerID <>'$cus_id'";
$rows = $conn->query($sql1);

foreach($rows as $r){
    if($r['UserName'] == $user_username || $r['Email'] == $user_email){
        $check = false;
    }
}

if($check){

$sql ="UPDATE `customers`
 SET `Email`='$user_email',`phone_no`='$user_phoneno',`fname`='$user_fname',`lname`='$user_lname',`gender`='$user_gender',`pass`='$user_passset',`UserName`='$user_username',`Address`='$user_address'
WHERE CustomerID = '$cus_id'";

$result = $conn->exec($sql);

if($result !== false){
    echo "Home.php?id=$cus_id";
}
else{
    echo "invalid";
}
}
else{
    echo"Duplicated UserName or Email";
}
}
}
?>