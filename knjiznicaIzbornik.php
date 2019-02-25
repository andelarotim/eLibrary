<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a id="dobrodosli" class="navbar-brand" href="#">Dobrodosli: <?php session_start();echo $_SESSION["name"];?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="knjiznica.php">Home</a></li>
      <li><a href="pregledajRezervaciju.php">Povijest rezervacija</a></li>

	  <li><a href="api/logout.php">Odjava</a></li>
    </ul>
  </div>
</nav>
  