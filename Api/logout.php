<?php 
session_start();
unset($_SESSION["loggedIn"]);
unset($_SESSION["admin"]);
header("Location: ../login.php");