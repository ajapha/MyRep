<?php
  $obj = new program;

  class program {
	function __construct() {
		if(isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
			$obj = new $page();
		} else {
			$obj = new homepage;
		}
	}
  }

  class page {
	public function __construct() {
		if($_SERVER['REQUEST_METHOD'] == 'GET') {
			$this->get();
		} else {
			$this->post();
		}
	}
	protected function get() {
		echo 'form';
	}
	protected function post() {
		echo 'process form';
	}
  }

  class homepage extends page{
	protected function get() {
		echo "<H1>Welcome to your checkbook helper!</H1>"; 
		echo '<a href="bankform.php?page=logInForm" class="stylish-button">Log In</a>
		
		<style type="text/css">
		.stylish-button {
			-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			color:#333;
			background-color:#FA2;
			border-radius:5px;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border:none;
			font-size:16px;
			font-weight:700;
			padding:4px 16px;
			text-shadow:#FE6 0 1px 0
		}
		</style>';
		echo '<a href="bankform.php?page=newUserForm" class="stylish-button">New User</a>
		
		<style type="text/css">
		.stylish-button {
			-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
			color:#333;
			background-color:#FA2;
			border-radius:5px;
			-moz-border-radius:5px;
			-webkit-border-radius:5px;
			border:none;
			font-size:16px;
			font-weight:700;
			padding:4px 16px;
			text-shadow:#FE6 0 1px 0
		}
		</style>';
	}
  }

  class logInForm extends page{
	 public function get() {
	    echo $_REQUEST;
	 	echo '<FORM action="bankform.php?page=authenticate" method="post">
                 <fieldset>
                   <LABEL for="username">Username: </LABEL>
                     <INPUT type="text" name="username" id="username"><BR>
                       <LABEL for="password">Password: </LABEL>
                     <INPUT type="password" name ="password" id="password"><BR>
                   <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';
	 }
  }
	
	class newUserForm extends page {
	  public function get() { 
	    echo '<FORM action="bankform.php?page=addNewUser" method="post">
                            <fieldset>
			                  <LABEL for="username">Username: </LABEL>
                                <INPUT type="text" name="username" id="username"><BR>
                                 <LABEL for="password">Password: </LABEL>
                                  <INPUT type="password" name ="password" id="password"><BR>
                                  <LABEL for="first_name">First Name: </LABEL>
                                   <INPUT type="text" name="first_name" id="first_name"><BR>
                                  <LABEL for="last_name">Last Name: </LABEL>                     
			                     <INPUT type="text" name="last_name" id="last_name"><BR>
                                <LABEL for="account_number">Account Number: </LABEL>                       
			                   <INPUT type="text" name="account_number" id="account_number"><BR>
                             <INPUT type="submit" value="Send"> <INPUT type="reset">
                           </fieldset>
                         </FORM>';
	  }
	}
    
    class dbtcrt_form {
      public function get() {  
        echo '<FORM action="index.php?page=bankform" method="post">
                            <fieldset>
                              <LABEL for="amount">Amount: </LABEL>
                                <INPUT type="text" name="amount" id="lastname"><BR>
                                  <LABEL for="source">Source: </LABEL>
                                    <INPUT type="text" name="source" id="lastname"><BR>
                                  <INPUT type="radio" name="type" value="debit"> Debit<BR>
                                <INPUT type="radio" name="type" value="credit"> Credit<BR>
                              <INPUT type="checkbox" name="moretranstype" value="yes"> More Trans<BR>
                            <INPUT type="submit" value="Send"> <INPUT type="reset">
                          </fieldset>
                       </FORM>';
      }
    }
  //Keith told me that the following should be restructered.
  class addNewUser extends page {
	public $username;
	public $first_name;
	public $last_name; 
	public $account_number;
	public $password;
    public $userinfo = array();
    
    protected function post() {
      $this->username = $_POST['username'];
      $this->first_name = $_POST['first_name'];
      $this->last_name = $_POST['last_name'];
      $this->account_number = $_POST['account_number'];
      $this->password = $_POST['password'];
      //$userInfo = array_combine($userKeys, $userinfo);
      //$newUserInfo= array($username=>$userInfo);
      $this->newUserInfo[$this->username] = array("first_name"=>$this->first_name,'last_name'=>$this->last_name, 'account_number'=>$this->account_number, 'password'=>$this->password); 
      $this->writeCSV();
      print_r($this->newUserInfo);
    }  
    protected function writeCSV() {  
      echo '<br>  We need to make a function to write the array to a csv file';
    }
  }

  class authenticate extends page {
  	public function post() {
      		echo "we need to make a function to check the csv file for the username and password";
    }
  }
?>
