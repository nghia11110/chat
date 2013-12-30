<?php
include('connect.php');
//$text = '#'.$_POST['text'];
$message = $_POST['messages'];
$user = $_POST['user'];
$sql = "INSERT INTO messages (user,message) VALUES (:sas,:asas)";
$q = $db->prepare($sql);
$q->execute(array(':sas'=>$user,':asas'=>$message));

//echo '/' .$row['user']. ' : ' .$row['message'];
echo $db->lastInsertId().':'.$user.':'.$message;