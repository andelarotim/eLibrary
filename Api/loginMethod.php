<?php 
require_once('database.php');
$db= database::getInstance();
session_start();
//header("Content-type:application/json");
if(isset($_POST["username"]) && isset($_POST["password"])){	

	if($conn=$db->connect('127.0.0.1','root','','knjiznicapis')){
$username=mysqli_real_escape_string($conn,$_POST["username"]);
$password=mysqli_real_escape_string($conn,$_POST["password"]);
if($username=="admin" && $password=="admin")
{
	$_SESSION['loggedIn']   = true;
	$_SESSION["admin"]=true;
	  $obj = (object) [
    'loggedIn' =>true,
	'url'=>"window.location.href='pocetna.php'",
	'status'=>"success"];
}
else if (strpos($username, 'student.fsr.ba') !== false)
{

$db->doQuery("SELECT * from korisnik where korisnickoime='$username' AND lozinka='$password'");
$obj=$db->loadObjectList();
if(mysqli_num_rows($obj)==1){
$_SESSION['loggedIn']   = 'true';
$_SESSION['id']=$obj->fetch_assoc()["id"];
$_SESSION["name"]=$username;
	  $obj = (object) [
    'loggedIn' =>true,
	'url'=>"window.location.href='knjiznica.php'",
	'status'=>"success"];
}
else{
	  $obj = (object) [
    'loggedIn' =>true,
	'url'=> "window.location.href='prviPut.php'",
	'status'=>"faill"];
}
}
else{
	  $obj = (object) [
    'loggedIn' =>true,
	'url'=> "window.location.href='prviPut.php'",
	'status'=>"fail"];
}
	}
}

echo json_encode($obj);