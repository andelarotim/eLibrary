<?php
require_once('database.php');
session_start();
$db= database::getInstance();


header("Content-type:application/json");
$conn;
if(empty($_GET["id"]))
{
	$obj = (object) [
    'error' => "error while adding new book"];
	echo json_encode($obj);
}
else{

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$id=$_SESSION["id"];
	$idK=$_GET["id"];
	if(getNumberOfreservations($id)<3)
	{
    $flag=addAuthor($id,$idK);
	unset($_GET);
  if($flag!=1){
	  global $conn;
	$obj = (object) [
    'error' => "error while adding new book".mysqli_error ( $conn )];
	echo json_encode($obj);
  }
  else{
	  $obj = (object) [
	  
    'success' =>"Rezervacija je uspjesna i vrijedi 30 dana"];
	echo json_encode($obj);
  }
	}
	else{
			  $obj = (object) [
	  
    'success' =>"Ne mozete rezervirati vise od 3 knjige"];
	echo json_encode($obj);
	}

}
}
function getNumberOfreservations($id)
{
	    global $db;
	global $conn;
	$db->doQuery("SELECT COUNT(*) as cnt FROM  rezervacija WHERE id_korisnika=$id and status=0");
	   $obj=$db->loadObjectList();
	   return mysqli_fetch_assoc(($obj))["cnt"];
}
function addAuthor($id,$idK){
    global $db;
	global $conn;
	$date=date('Y-m-d');
	$date2=date('Y-m-d', strtotime($date. ' + 30 days'));
	//echo mysqli_error($conn);
	$db->doQuery("INSERT INTO rezervacija(id_korisnika, id_knjige, datum_od, datum_do)
				  VALUES('$id','$idK','$date','$date2')");
   $obj=$db->loadObjectList();
   return $db->getNumRows();
}