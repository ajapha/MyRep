<?php
//include("changeInfo.php");
//  session_start();
   //updated for index
  class infoChanged extends showInfoToChange {
    function __construct() {
    	//include_once("header.php");
    	session_start();
    	echo "<h2>Your information has now been updated.</h2><br>  Your information now is:<br>";
        $infoKeys = $_SESSION['infoKeys'];
        unset($infoKeys[4]);  
        unset($_SESSION['infoKeys']);
        $info = array();
        $info = $this->getInfo($info, $_SESSION['userID']);
        $userInfo = array_combine($infoKeys, $info);
        echo "<fieldset>"; 
      foreach($userInfo as $k=>$v) {
        echo "<br>$k : $v<br>";
      }
       echo "</fieldset>";
    
      echo "<br><a href = index.php?page=showInfoToChange>Change my information again</a><br><br>";
      echo "<a href = home.php>Go to my home Page</a>";


    }
  }  
//$obj = new infoChanged;
?>
