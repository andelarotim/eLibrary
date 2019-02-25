<?php
 header("Access-Control-Allow-Origin: *");

if(isset($_GET['method'])) {
	 if(searchGet($_GET['method'])){
	require '/Api/'.$_GET['method'] . '.php';
	 }
}
else if(isset($_POST["method"])){
	 if(searchPost($_POST['method'])) {
	require '/Api/'.$_POST['method'].'.php';
	 }
}

function searchGet($method){
    $methods=['insertReservation','brisiAutora','getAuthors','getBooks','brisiKnjigu','getReservations','getAllReservations','returnBook'];
    foreach ($methods as $m){
        if($m==$method){
            return true;
        }
    }
    return false;
}
function searchPost($method){
    $methods=['insertBook','loginMethod','insertAuthor','insertUser'];
    foreach ($methods as $m){
        if($m==$method){
            return true;
        }
    }
	
    return false;
}