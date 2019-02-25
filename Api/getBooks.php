<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;
	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
  $db->doQuery("SELECT *FROM knjiga");
   $obj=$db->loadObjectList();
   $rows=[];
   while($r=mysqli_fetch_assoc(($obj))){
       $rows["data"][]=$r;
   }

  for($i=0;$i<COUNT($rows["data"]);$i++)
  {

	   $db->doQuery("SELECT *FROM autor_knjiga JOIN autor a on a.id=idAutor WHERE idKnjiga=".$rows["data"]["$i"]["ID"]);
	      $obj=$db->loadObjectList();

			  $rows["data"][$i]["autori"]=[];
	      while($r=mysqli_fetch_assoc(($obj))){
       $rows["data"][$i]["autori"][]=$r;
		  }
		

	
		  
  }
  
   echo json_encode(($rows));
}
