<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;
	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
  $db->doQuery("SELECT *FROM autor");
   $obj=$db->loadObjectList();
   $rows=[];
   while($r=mysqli_fetch_assoc(($obj))){
       $rows["data"][]=$r;
   }
 
   echo json_encode(($rows));
}
