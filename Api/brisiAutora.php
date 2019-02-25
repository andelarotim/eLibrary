<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;
	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$id=$_GET["id"];
  $db->doQuery("DELETE FROM autor where id = $id");
   $obj=$db->loadObjectList();
   if($db->getNumRows()!=1)
   {
	   $obj = (object) [
    'error' => "error while deleting author".mysqli_error ( $conn )];
   }
   echo json_encode($obj);
}
