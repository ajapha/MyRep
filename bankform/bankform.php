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
  class user {
	public $username;
	public $first_name;
	public $last_name; 
	public $account_number;
	public $password;
    //public $newUserInfo = array();
    
    public function setProps() {
      $this->username = $_POST['username'];
      $this->first_name = $_POST['first_name'];
      $this->last_name = $_POST['last_name'];
      $this->account_number = $_POST['account_number'];
      $this->password = $_POST['password'];
      $this->newUserInfo = array('username' => $this->username,"first_name"=>$this->first_name,'last_name'=>$this->last_name, 'account_number'=>$this->account_number, 'password'=>$this->password); 
      return $this->newUserInfo;
    }  
/*    protected function writeCSV() {  
      echo '<br>  We need to make a function to write the array to a csv file';
    }
  }

  class authenticate extends page {
  	public function post() {
      		echo "we need to make a function to check the csv file for the username and password";
    }
  */
  }
  class addNewUser {
  	
  	public function __construct() {
  		$obj=new user();
  		$user = $obj->setProps();
  		print_r($user);	
  		$fp = fopen('user_info.csv', 'a');
  	    fputcsv($fp, $user, ',');
  		fclose($fp);
  		
  		$obj2 = new file();
  		$obj2->readFile();
  	}
  }

  
  class file {
  	public function readFile(){
  		$row = 1;
  		if (($handle = fopen("user_info.csv", "r")) !== FALSE) {
  			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
  				$num = count($data);
  				echo "<p> $num fields in line $row: <br /></p>\n";
  				$row++;
  				for ($c=0; $c < $num; $c++) {
  				echo $data[$c] . "<br />\n";
  				}
  				}
  				fclose($handle);
  				}
  	}
  }
?>
