<?php
require_once('database.php');

$db= database::getInstance();
session_start();

header("Content-type:application/json");
$conn;
if(empty($_POST["name"]) || empty($_POST["isbn"]) || empty($_POST["idAutor"]) || empty($_POST["opis"]))
{
	$obj = (object) [
    'error' => "Molimo unesite sve podatke"];
	echo json_encode($obj);
}
else{

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
	$name=$_POST["name"];
	$isbn=$_POST["isbn"];
	$idAutor=$_POST["idAutor"];
	$idAutor=explode(",",$idAutor);
	$idAutor=array_unique($idAutor);
	var_dump($idAutor);
	$opis=$_POST["opis"];
    $flag=addAuthor($name,$isbn,$idAutor,$opis);
	unset($_POST);
  if($flag!=1){
	  global $conn;
	$obj = (object) [
    'error' => "error while adding new book".mysqli_error ( $conn )];
	echo json_encode($obj);
  }
  else{
	  $obj = (object) [
	  
    'success' =>"Successfully added new book"];
	echo json_encode($obj);
  }

}
}
function addAuthor($name,$isbn,$idAutor,$opis){
    global $db;
	global $conn;
	//echo mysqli_error($conn);
	$db->doQuery("INSERT INTO knjiga(naziv, isbn, opis)
				  VALUES('$name','$isbn','$opis')");
				  $last_row = mysqli_insert_id($conn);
			
	for($i=0;$i<COUNT($idAutor);$i++)
	{
	
		$db->doQuery("INSERT INTO autor_knjiga(idAutor,idKnjiga)
		VALUES('$idAutor[$i]','$last_row')");
	}
   $obj=$db->loadObjectList();
   return $db->getNumRows();
}