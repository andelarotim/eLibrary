<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <style type="text/css">

</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  
$(document).ready(function(){
	$('body').on('click', 'td.rezerviraj', function() {
    // do something
	var potvrda=confirm("Rezervirajte knjigu?");
	if(potvrda){
	var Id= parseInt($(this).closest('tr').children('td:first').text());
	console.log(Id)

	
	var http = new XMLHttpRequest();

http.open('GET', 'index.php?method=insertReservation&id='+Id, true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
		var json = JSON.parse(http.responseText);
		
					alert(json.success)
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

http.open('GET', 'index.php?method=getBooks', true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
				console.log(http.responseText);
		var json=JSON.parse(http.responseText);
		var tablica="<table id='tabi' class='table table-hover table stripped' ><thead><th class='hide'>id</th><th>Naziv</th><th>Isbn</th><th>Opis</th><th>Autor</th><th class='hide'></th> </thead><tbody>"
          for (var i in json.data) {
			  console.log(json);
			  console.log(i);
                //console.log(jsonObj.data)
                //console.log(jsonObj.data[i].reading_value)
                //console.log(jsonObj.data[i])
				tablica+="<tr>"
				tablica+="<td class='hide' class='id'>"+json.data[i].ID+"</td>"
				tablica+="<td>"+json.data[i].naziv+"</td>"
				tablica+="<td>"+json.data[i].isbn+"</td>"  
				tablica+="<td>"+json.data[i].opis+"</td>"  
				tablica+="<td>"
						for(var j in json.data[i].autori)
						{
								tablica+=json.data[i].autori[j].ime_autora+" "+json.data[i].autori[j].prezime_autora+"<br>"
						}
						tablica+="</td>";
				tablica+="<td class='rezerviraj '><span class='glyphicon glyphicon-plus'></span></td>"

                }
				tablica+="  </tbody><table>"
           
			document.getElementById("tablica").innerHTML=tablica
			            $('#tabi').DataTable({
       
            });
		console.log(json)
	
        console.log(http.responseText);
		 }
    

}
http.send();

});
</script>
</head>
<body>

<?php include_once("knjiznicaizbornik.php");?>
  
<div id="tablica"></div>
<div class="text">
<center><font color="green" size="3" class="poruka"></font></center>
<center><font color="red" size="3" class="porukaGr"></font></center>
</text>
</body>
</html>

