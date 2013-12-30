
<?php
include('connect.php');
$id = $_POST['id_delete'];
$sql = "DELETE FROM messages where id=?";
$q = $db->prepare($sql);
$data=array($id);
$q->execute($data);
