<?php
include('conn.php');
$Id =1;
$sql = "SELECT * FROM resturant WHERE Rest_id = Id";
$stmt = $conn->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>