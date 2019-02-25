<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="pocetna.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Knjige <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="dodajKnjigu.php">Dodaj</a></li>
          <li><a href="pregledajKnjigu.php">Pregledaj</a></li>
        </ul>
      </li>
	        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Autor <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="dodajAutora.php">Dodaj</a></li>
          <li><a href="pregledajAutora.php">Pregledaj</a></li>
        </ul>
      </li>
      <li><a href="pregledajRezervacije.php">Aktivne Rezervacije</a></li>
	  <li><a href="dodajKorisnika.php">Stvaranje racuna</a></li>
	  <li><a href="api/logout.php">Odjava</a></li>
    </ul>
  </div>
</nav>
  