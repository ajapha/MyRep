<?php

//include_once("database.php");
  //!!updated for index!!
  class activate extends dbManage {
  	protected $info;
  	protected $userID;
  	protected $lastName;
  	protected $phone;
  	
  	function __construct() {
  		$this->lastName = $_GET['c'];
  		$this->phone = $_GET['d'];
  		$this->info = $this->getInfo($this->info);
  		$this->checkInfo($this->info);
  	}
  	
  	function getInfo($info) {
      $this->dbConnect('college', 'dba', 'pcs');
      $STH = $this->select("userID,lastName, phone_num", "users");
      $info = $STH->fetchAll(PDO::FETCH_ASSOC);
      return $info;  
  	 }
    function checkInfo($info){
    	foreach($info as $k=>$v) {
    		if(hash('ripemd160', $v['lastName']) == $this->lastName && hash('ripemd160', $v['phone_num']) == $this->phone) {
    			$this->userID = $v['userID'];
    			$count = $this->activate();
    			if($count == 1) {
    				header("Location: index.php?page=logInForm");
    		    }echo "<center><pre>There is a problem with your activation</pre></center>";
    		}
    	}
    }
    function activate() {
    	$this->dbConnect('college', 'dba', 'pcs');
    	$count = $this->update('users', 'active', 'on', "userID = $this->userID");
      return $count;
    }
  
  
  }

//$obj = new activate;
?>
