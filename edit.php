<?php 
include('connect.php');
$id = $_POST['id_edit'];
$message = $_POST['message_edit'];
$sql = "UPDATE messages SET message=? where id=?";
$q = $db->prepare($sql);
$data=array($message,$id);
$q->execute($data);