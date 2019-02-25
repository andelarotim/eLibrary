<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;

if(empty($_POST["name"]) || empty($_POST["pw"]))
{
	$obj = (object) [
    'error' => "Molimo unesite sve podatke"];
	echo json_encode($obj);
}
else{

if(isset($_POST["name"]) && isset($_POST["pw"])){	
if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$name=$_POST["name"];
	$pw=$_POST["pw"];
    $flag=addAuthor($name,$pw);
	unset($_POST);
  if($flag!=1){
	  global $conn;
	$obj = (object) [
    'error' => "error while adding new user".mysqli_error ( $conn )];
	echo json_encode($obj);
  }

  else{
	  $obj = (object) [
	  
    'success' =>"Successfully added new user"];
	echo json_encode($obj);
  }
}
}
}

function addAuthor($name,$pw){
    global $db;
	global $conn;
	//echo mysqli_error($conn);
	$db->doQuery("INSERT INTO korisnik(korisnickoime,lozinka)
				  VALUES('$name','$pw')");
   $obj=$db->loadObjectList();
   return $db->getNumRows();
}