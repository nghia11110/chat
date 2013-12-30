<?php
include('connect.php');
//$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM messages ORDER BY id ASC");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
echo  '<div>' .$row['user']. ' : ' .$row['message'].'<button onclick="delete_message('.$row['id']. ')" >Delete </button> <button onclick="edit_message('.$row['id']. ')" >Edit </button></div>' ;
}