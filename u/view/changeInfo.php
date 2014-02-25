<?php

//include_once("../model/database.php");
//session_start();  

  class showInfoToChange extends dbManage {
  	private $userID;
  	protected $info;
  	function __construct() {
  		try{ 
  		  if(!isset($_SESSION))session_start();
  	  	  if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {
  	  		throw new Exception("You can not access this page because you are not logged in. <a href= index.php>Please log in or create an account</a>");
  	  	  }
  		$this->userID = $_SESSION['userID'];
  		$this->info = $this->getInfo($this->info, $this->userID);
  		$this->showInfo($this->info);

  	  }  catch (Exception $e){
	       echo "<div id='error'>" . $e->getMessage() . "</div>";
         }
    }
  	
  	
  	function getInfo($info, $userID) {
  		$this->dbConnect('college', 'dba', 'pcs');
  		$STH = $this->select('*', 'users', "userID=$userID");
  	    $info = $STH->fetch(PDO::FETCH_ASSOC);
  	    array_shift($info);
  	    array_pop($info);
  	    return $info;
  	}
	function showInfo($info) {
		$keys = array_keys($info);
		array_splice($keys, 4, 0, "passwordconf");
		$values = array_values($info);
		array_splice($values, 4, 0, " ");
		$infoKeys = array("Username", "Last Name","First Name", "Password", "Password Confirmation", "Email Address", "Phone Number");
		$userInfo = array_combine($infoKeys, $values);
		$i = 0;
		echo "<h2><br>Fill in the information you want to change and click the Change Information button.</h2>";
		echo "<br><br><FORM action='?page=changeInfo' method='post'><fieldset>";
		foreach($userInfo as $k=>$v) {
		$keyNow = $keys[$i];
		$type = 'text';
		if ($k == "Password" || "Password Confirmation") $type = 'password';
		echo "<br>$k  :  $v <input type=$type name= $keyNow";?> value="<?php if(!empty($_POST["$keyNow"])) echo htmlspecialchars($_POST["$keyNow"])?>"> <?php echo "<br>"; 
		$i++;
		}
		echo "<br><input type='submit' value='Change Information'><br></fieldset></FORM>";
		$_SESSION['infoKeys'] = $infoKeys;	
		
	}
	
	
	
//function __destruct() {include("footer.php");}	
  }
//$obj = new showInfoToChange();

?>
