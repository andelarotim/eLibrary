<!DOCTYPE html>
<html lang="en">
<head>
	<title>Rezervacije</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
		$('body').on('click', 'td.brisi', function() {
    // do something
	var potvrda=confirm("Zelite li oznaciti knjigu kao vracenu?");
	if(potvrda){
	var Id= parseInt($(this).closest('tr').children('td:first').text());
	console.log(Id)

	
	var http = new XMLHttpRequest();

http.open('GET', 'index.php?method=returnBook&id='+Id, true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
					console.log(http.responseText)
					location.reload();
		 }
		 else{
			 console.log(http.responseText);
		 }
    

}
http.send();
		}
});
var http = new XMLHttpRequest();

http.open('GET', 'index.php?method=getAllReservations', true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
				console.log(http.responseText);
		var json=JSON.parse(http.responseText);
		var tablica="<table class='table table-hover table stripped' ><thead><th>Id rezervacije</th><th>Naziv</th><th>Datum od</th><th>Datum do</th><th>Id korisnika</th><th>Korisnik</th></thead><tbody>"
          for (var i in json.data) {
			  console.log(json);
			  console.log(i);
                //console.log(jsonObj.data)
                //console.log(jsonObj.data[i].reading_value)
                //console.log(jsonObj.data[i])
				tablica+="<tr>"
				tablica+="<td>"+json.data[i].idRezervacija+"</td>" 
				tablica+="<td>"+json.data[i].naziv+"</td>" 
				tablica+="<td>"+json.data[i].datum_od+"</td>"
				tablica+="<td>"+json.data[i].datum_do+"</td>"
				tablica+="<td>"+json.data[i].id_korisnika+"</td>"
				tablica+="<td>"+json.data[i].korisnickoime+"</td>"
				tablica+="<td class='brisi '><span class='glyphicon glyphicon-ok'></span></td>"

                }
				tablica+="  </tbody><table>"
           
			document.getElementById("tablica").innerHTML=tablica
		console.log(json)
	
        console.log(http.responseText);
		 }
    

}
http.send();

});
</script>
</head>
<body>

<?php include_once("izbornik.php");?>
  
<div id="tablica"></div>
<div class="text">
<center><font color="green" size="3" class="poruka"></font></center>
<center><font color="red" size="3" class="porukaGr"></font></center>
</text>
</body>
</html>
