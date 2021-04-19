<?php

$dbhost = 'localhost';
$dbname='talabat_website';
$dbuser='root';
$dbpass='';
$conn= new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);


$emp_id=$_REQUEST['Id'];

$check = true;


$emp_name=$_REQUEST['Name'];
$emp_Email = $_REQUEST['Email'];
$emp_salary = $_REQUEST['salary'];
$emp_Age = $_REQUEST['Age'];
$emp_phoneno = $_REQUEST['phonenumber'];
$emp_position = $_REQUEST['position'];
$emp_passset=$_REQUEST['inputPassword'];
$emp_passcon=$_REQUEST['inputConfirmPassword'];
$emp_gender =$_REQUEST['gender'];
$emp_address= $_REQUEST['address'];


if($emp_Age < 0){
    echo'Employee Age is -ve Number !!';
}
else{
if($emp_salary < 0){
    echo'Employee Salary is -ve Number !!!';
}
else{
if($emp_passset !== $emp_passcon){

echo"The Password not match the confirmation";
}
else{

    $password = $emp_passset;

// Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length<br> and should include at least one upper case letter, one number, and one special character.';
}else{



$sql1 = "SELECT * FROM employees WHERE ID <> '$emp_id'";
$rows = $conn->query($sql1);

foreach($rows as $r){
    if($r['mail'] == $user_Email){
        $check = false;
    }
}

if($check){
$sql ="UPDATE `employees` SET `mail`='$emp_Email',`password`='$emp_passset',`position`='$emp_position',`name`='$emp_name',`Age`='$emp_Age',`salary`='$emp_salary',`gender`='$emp_gender',`phone_number`='$emp_phoneno',`Address`='$emp_address' 
WHERE ID='$emp_id'";

$result = $conn->exec($sql);

if($result !== false){
    echo "AdminPage.php";
}
else{
    echo "invalid";
}
}
else{
    echo"That Email already exsist";
}
}
}
}
}
?>