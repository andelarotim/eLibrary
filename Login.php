<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript">
$(document).ready(function(){
	console.log("hehe");
    $("#loggMeIn").click(function(e){
      e.preventDefault();
var http = new XMLHttpRequest();

var params = "method=loginMethod&username="+uname.value+"&password="+pwd.value;
http.open('POST', 'index.php', true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

http.onreadystatechange = function() {//Call a function when the state changes.
    if(http.readyState == 4 && http.status == 200) {
				console.log(http.responseText);
		var json=JSON.parse(http.responseText);

		console.log(json)
		if(json["status"]=="fail")
		{
			document.getElementsByClassName("msg")[0].innerText="Korisnicko ime mora sadrzavati @student.fsr.ba"
		}
		else if(json["status"]=="faill")
		{
			document.getElementsByClassName("msg")[0].innerText="Kontaktirajte admina za registraciju"
		}
		else
		{
			eval(json["url"]);
		}
        console.log(http.responseText);
    }

}
http.send(params);

});
});
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Prijava</h3>
	
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" id="uname"class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" id="pwd" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" id="loggMeIn"value="Login" class="btn float-right login_btn">
					</div>
				</form>
							<br><br><br><br><center><font color="red"  size="5 "class="msg"></font></center>
			</div>

		</div>
	</div>
</div>
</body>
</html>