<?php
class home {

  function __construct() {
    if(!isset($_SESSION)) {
   	  session_start();
    }
    try {
  	 if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
  		throw new Exception("You can not access this page because you are not logged in. <a href= index.php>Please log in or create an account</a>");
	 }
  	 echo "<br><h2>Welcome back " .  $_SESSION['firstName'] . "</h2>";
  	 echo '<a href= "index.php?page=showInfoToChange">Change your information</a><br>';
     echo "<br><h3>What info would you like to find out today?</h3>";


    }
    catch (Exception $e){
	  echo "<div id='error'>" . $e->getMessage() . "</div>";
    }
  }
}


?>
