<?php

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
$user_address= $_REQUEST['address'];

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



$sql1 = "SELECT * FROM customers";
$rows = $conn->query($sql1);

foreach($rows as $r){
    if($r['UserName'] == $user_username || $r['Email'] == $user_email){
        $check = false;
    }
}

if($check){
$sql ="INSERT INTO `customers`(`CustomerID`, `Email`, `phone_no`, `fname`, `lname`, `gender`, `pass`, `UserName`,`Address`) 
VALUES (null,'$user_email','$user_phoneno','$user_fname','$user_lname','$user_gender','$user_passset','$user_username','$user_address')";

$result = $conn->exec($sql);

if($result !== false){
    echo "Home.php";
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