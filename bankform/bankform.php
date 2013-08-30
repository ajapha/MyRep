<?php
  $obj = new program;
   
  class program {
	function __construct() {
		if(isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
			echo '<center><H2>E-Bank, <u>your</u> online bank</H2></center>';
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
		echo "<center><H1>Welcome to E-Bank!</H1></center>"; 
		echo '<center><a href="bankform.php?page=logInForm" class="stylish-button">Log In</a>
		
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
		</style></center><br>';
		echo '<center><a href="bankform.php?page=newUserForm" class="stylish-button">New User</a>
		
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
		</style></center>';
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
			                  <LABEL for="username">Set Your Username: </LABEL>
                                <INPUT type="text" name="username" id="username"><BR>
                                 <LABEL for="password">Type Your Password: </LABEL>
                                  <INPUT type="password" name ="password" id="password"><BR>
                                   <LABEL for="password_confirm">Confirm Your Password: </LABEL>
                                    <INPUT type="password" name ="password_confirmation" id="password_confirm"><BR>                  
	    		                     <LABEL for="first_name">First Name: </LABEL>
                                   <INPUT type="text" name="first_name" id="first_name"><BR>
                                   <LABEL for="last_name">Last Name: </LABEL>                     
			                      <INPUT type="text" name="last_name" id="last_name"><BR>
	    		                 <LABEL for="email_address">Email Address: </LABEL>                     
			                    <INPUT type="text" name="email_address" id="email"><BR>
                              <INPUT type="submit" value="Send"> <INPUT type="reset">
                           </fieldset>
                         </FORM>';
	  }
	 
  }
    
    class dbtcrt_form extends page{
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
  abstract class file_manage extends page{  
   	public function writeFile($file, $array, $type) {
      $fp = fopen($file, $type);
      fputcsv($fp, $array, ',');
      fclose($fp);
    }
    	 
    public function readFile($file, $type) {
        $user_info = array();
        $user_keys = array('username', 'first_name', 'last_name', 'email_address', 'password', 'account_number');
    	$row = 1;
      if (($handle = fopen($file, $type)) !== FALSE) {
    	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    	  $users_info["$row"] = array_combine($user_keys, $data);
    	  $row++;
    	 } fclose($handle);
      }  return $users_info;
    }
  }    
  
  class user {
	public $username;
	public $first_name;
	public $last_name; 
	public $account_number;
	public $password;
	public $email_address;

  	public function setProps() {
      	$this->username = $_POST['username'];
        $this->first_name = $_POST['first_name'];
        $this->last_name = $_POST['last_name']; 
        $this->password = $_POST['password'];
        $this->email_address = $_POST['email_address'];
        $this->newUserInfo = array();
        $this->newUserInfo = array($this->username, $this->first_name, $this->last_name, $this->email_address, $this->password); 
        return $this->newUserInfo;
    }
     public function setAccountNumber() {
     	$info = $this->setProps();
     	$this->account_number = rand(11111111, 19999999);
     	$info[] = $this->account_number;
     	return $info;
     }	
     public function welcomeUser() {
     	echo "<center><H2>Welcome $this->first_name!</H2> <br> <H4>Thank you for banking with us.</H4> <br> <pre>Your account number is $this->account_number</pre></center>";
       	echo '<center><a href="bankform.php?page=dbtcrt_form">Click here to begin entering transactions.</a></center>'; 
       	echo '<center><FORM action="bankform.php?page=dbtcrt_form" method="post">
       	        <fieldset>
       			  <LABEL for="starting balance">Please enter your starting balance. $</LABEL>                     
			       <INPUT type="text" name="starting_balance" id="starting balance"><BR>
                  <INPUT type="submit" value="Send"> <INPUT type="reset">
                 </fieldset>
               </FORM></center>';
	 
     }
  }    	
     
  class authenticate extends file_manage {
      public $users_info;
      public $data;
  	public function post() {
      $this->users_info = $this->readFile('user_info.csv', 'r'); 
      $this->find_username();
      $this->welcome_user();	
    }
    protected function find_username() {
    	$num = 1; 
      while(isset($this->users_info["$num"]) && $num < 100) {  
            $a = $this->users_info["$num"];
          if(in_array($_POST['username'], $a, true) && (in_array($_POST['password'], $a, true))) {
    	      $this->data = $a;
          } $num ++; 
      }   
    }
    protected function welcome_user() {
    if(isset($this->data)) {
          echo "<center><H3><br>Welcome back " . $this->data['first_name'] . '!</H3>' . '<br><pre><b>Account Number ' . $this->data['account_number'] . '</b></pre></center>';
          echo '<center><a href="bankform.php?page=dbtcrt_form">Click here to begin entering transactions.</a></center>';
          echo '<center><a href="bankform.php?page=dbtcrt_form">Click here to change your information.</a></center>';              
      } else {
      	  echo '</b></pre>Username or password were not found.  Please try again.</b></pre>';
      } 
    }
  }  
 
  
  
  class addNewUser extends file_manage{
  	
  	public function __construct() {
  	    $test1 = $this->checkPassword();
  	    $test2 = $this->errorCheck();
      if($test1 > 1 && $test2 > 1) {
  	  	  $obj = new user();
  	 	  $user = $obj->setAccountNumber();	
  	 	  $obj->welcomeUser();
  	 	  //print_r($user);
  	 	  $this->writeFile('user_info.csv', $user, 'a');
  	  }
  	}
    public function checkPassword() {
    	try{
    		if($_POST['password'] != $_POST['password_confirmation']) { 
    			throw new Exception("OOPS! Passwords do not match <br>");
    		}
    	} catch(Exception $e) {
    		echo $e->getMessage();
    	}
        if(isset($e)) {
    	   $test = 1;	
       	   echo '<a href="bankform.php?page=newUserForm">Click here to re-enter your information.</a>';
        } else {
        	$test = 2;
        }
          return $test;     
    }
    	
    public function errorCheck() {
      foreach ($_POST as $key=>$value) {
    	$key2 = str_replace('_', ' ', $key);
    	$key3 = ucfirst($key2);
    	  try{
    	    if($value == NULL) {
    		  throw new Exception("OOPS! Required feild missing. Please enter your $key3.<br>");
    		}
    	  } catch(Exception $e) {
    			echo $e->getMessage();
    		} 
       } if(isset($e)) {
    	   $test = 1;	
       	   echo '<a href="bankform.php?page=newUserForm">Click here to re-enter your information.</a>';
         } else {
         	$test = 2;
         }
         return $test;     
    }
  }

  
     
  
?>
