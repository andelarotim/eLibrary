<?php
require_once('database.php');
$db= database::getInstance();
session_start();
header("Content-type:application/json");
$conn;
	

if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){

   $db->doQuery("SELECT *FROM rezervacija Join Knjiga k  on k.ID = rezervacija.id_knjige Join korisnik ko on ko.id = rezervacija.id_korisnika where status=0");
   $obj=$db->loadObjectList();
   $rows=[];
   while($r=mysqli_fetch_assoc(($obj))){
       $rows["data"][]=$r;
   }
 
   echo json_encode(($rows));
}
