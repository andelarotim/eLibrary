<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;
	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$id=$_GET["id"];
	$db->doQuery("UPDATE REZERVACIJA SET status = 1 WHERE idRezervacija = $id");
	$obj=$db->loadObjectList();
	if($db->getNumRows()!=1)
   {
	   $obj = (object) [
    'error' => "error while updating".mysqli_error ( $conn )];
   }
   else {
	   $obj = (object) [
	   'error' => "error, please fill in all the data required"];
   }
   echo json_encode($obj);
}
