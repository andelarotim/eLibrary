<!DOCTYPE html>
<html lang="en">
<head>
  <title>Knjiga</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  <?php
  require_once('/Api/isLoggedInAdmin.php');
  ?>
$(document).ready(function(){
		var selected = [];
var http = new XMLHttpRequest();


http.open('GET', 'index.php?method=getAuthors', true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.

    if(http.readyState == 4 && http.status == 200) {
		var json=JSON.parse(http.responseText)
		json.data.forEach(item => {
        var option = $('<input type="checkbox" value="' + item.id + '">' + item.ime_autora +" "+ item.prezime_autora +'</input>');
        $("#" + "lista").append(option);
		  $("#" + "lista").append("<br>");
    });
    }

}
http.send();

$("#posaljiKnjiga").click(function(e){

$('#lista input:checked').each(function() {
    selected.push($(this).val());
});
	console.log(selected);
	console.log("salji");
      e.preventDefault();
var htttp = new XMLHttpRequest();
console.log(selected);
var params = "method=insertBook&name="+namee.value+"&isbn="+isbn.value+"&idAutor="+selected+"&opis="+opis.value;
console.log(params);
htttp.open('POST', 'index.php', true);

//Send the proper header information along with the request
htttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

htttp.onreadystatechange = function() {//Call a function when the state changes.
    if(htttp.readyState == 4 && htttp.status == 200) {
							console.log(htttp.responseText);
		var json=JSON.parse(htttp.responseText);

		console.log(json)
		if(json["error"])
		{
			document.getElementsByClassName("porukaGr")[0].innerText="Greska: " + json["error"]
			document.getElementsByClassName("poruka")[0].innerText=""
			
		}
		else
		{
			document.getElementsByClassName("poruka")[0].innerText="Uspjesno dodana knjiga"
			document.getElementsByClassName("porukaGr")[0].innerText=""
		}
        console.log(htttp.responseText);
		


}
console.log("ne moze");

}
htttp.send(params);





});
});
</script>
</head>
<body>

<?php include_once("izbornik.php");?>
  
<div class="container">
<div class="form-group">
  <label >Naziv:</label>
  <input type="text" id="namee" class="form-control">
</div>
<div class="form-group">
  <label >Isbn:</label>
  <input type="text" id="isbn"class="form-control" >
</div>
<div class="form-group">
  <label >Opis:</label>
  <input type="text" id="opis"class="form-control" >
</div>

<div class="form-group">
  <label >Odaberite autora:</label>
  <div id="lista" ></div>
</div>
<button id="posaljiKnjiga">Dodaj</button>

</div>
<div class="text">
<center><font color="green" size="3" class="poruka"></font></center>
<center><font color="red" size="3" class="porukaGr"></font></center>
</text>
</body>
</html>
