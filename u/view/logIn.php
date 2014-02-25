
<?php
//!!updated for index!!
class logInForm {
  function __construct() {
	//include("header.php");
      if($_SERVER['REQUEST_METHOD'] == 'GET') echo "Please enter your email address and password.";
//../model/verify.php
      echo '<FORM action="index.php?page=verify" method="post">
                               <fieldset><BR>
                                 <LABEL for="username">Username</LABEL>
                                    <INPUT type="text" name ="username" id="username"'; if (isset($_POST['username'])) echo "value=$_POST[username]"; echo'><BR><BR>                
                                     <LABEL for="password">Password </LABEL>
                                    <INPUT type="password" name ="password" id="password"'; if (isset($_POST['password'])) echo "value=$_POST[password]"; echo' ><BR><br>         
                                 <INPUT type="submit">
                               </fieldset>
                             </FORM>';

//include("footer.php");
  }
}
?>
