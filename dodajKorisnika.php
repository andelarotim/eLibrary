<!DOCTYPE html>
<html lang="en">
<head>
  <title>Korisnik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
	console.log("hehe");
    $("#posaljiAutor").click(function(e){
      e.preventDefault();
var http = new XMLHttpRequest();

var params = "method=insertUser&name="+namee.value+"&pw="+pw.value;
console.log(params);
http.open('POST', 'index.php', true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
		
				console.log(http.responseText);
		var json=JSON.parse(http.responseText);

		console.log(json)
		if(json["error"])
		{
			document.getElementsByClassName("porukaGr")[0].innerText="Greska: " + json["error"]
			document.getElementsByClassName("poruka")[0].innerText=""
		}
		else
		{
			document.getElementsByClassName("poruka")[0].innerText="Uspjesno dodan korisnik"
			document.getElementsByClassName("porukaGr")[0].innerText=""
		}
        console.log(http.responseText);
    }

}
http.send(params);

});
});
</script>
</head>
<body>

<?php include_once("izbornik.php");?>
  
<div class="container">
<div class="form-group">
  <label >Korisnicko ime:</label>
  <input type="text" id="namee" class="form-control">
</div>
<div class="form-group">
  <label >Lozinka:</label>
  <input type="text" id="pw"class="form-control" >
</div>
<button id="posaljiAutor">Dodaj</button>
</div>
<div class="text">
<center><font color="green" size="3" class="poruka"></font></center>
<center><font color="red" size="3" class="porukaGr"></font></center>
</text>
</body>
</html>
