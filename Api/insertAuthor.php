<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;

if(empty($_POST["name"]) || empty($_POST["sname"]))
{
	$obj = (object) [
    'error' => "Molimo unesite sve podatke"];
	echo json_encode($obj);
}
else{

if(isset($_POST["name"]) && isset($_POST["sname"])){	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$name=$_POST["name"];
	$sname=$_POST["sname"];
    $flag=addAuthor($name,$sname);
	unset($_POST);
  if($flag!=1){
	  global $conn;
	$obj = (object) [
    'error' => "error while adding new author".mysqli_error ( $conn )];
	echo json_encode($obj);
  }
  else{
	  $obj = (object) [
	  
    'success' =>"Successfully added new author"];
	echo json_encode($obj);
  }
}
}
}

function addAuthor($name,$snamee){
    global $db;
	global $conn;
	//echo mysqli_error($conn);
	$db->doQuery("INSERT INTO autor(ime_autora,prezime_autora)
				  VALUES('$name','$snamee')");
   $obj=$db->loadObjectList();
   return $db->getNumRows();
}