<?php
class userForm {//updated for index!!
  function __construct(){
    //include_once("header.php");
    if ($_SERVER['REQUEST_METHOD'] == 'GET') echo '<h1>Welcome to the Website! <br></h1> <h2>Please enter your information below.</h2>';
?>
          <FORM action="?page=addUser" method="post">
                            <fieldset>
                              <LABEL for='userName'>Username</LABEL>
                                 <INPUT type='text' name='userName' id='userName' value="<? if(isset($_POST["userName"])) echo htmlspecialchars($_POST["userName"]);?>"><?php echo "<br>" ?><BR>                    
                                   <LABEL for="firstName">First Name </LABEL>
                                     <INPUT type="text" name="firstName" id="firstName" value="<?php if(isset($_POST["firstName"])) echo htmlspecialchars($_POST["firstName"]);?>"><?php echo "<br>" ?><BR>
                                       <LABEL for="lastName">Last Name</LABEL>
                                         <INPUT type="text" name ="lastName" id="lastName" value="<?php if(isset($_POST["lastName"])) echo htmlspecialchars($_POST["lastName"]);?>"><?php echo "<br>" ?><BR>
                                           <LABEL for="email">Email Address </LABEL>
                                           <INPUT type="text" name ="email" id="email" value="<?php if(isset($_POST["email"])) echo htmlspecialchars($_POST["email"]);?>"><?php echo "<br>" ?><BR>        
                                         <LABEL for="password">Choose a password </LABEL>
                                       <INPUT type="password" name ="password" id="password"><?php echo "<br>" ?><BR>
                                     <LABEL for="passwordconf">Please re-enter your passoword </LABEL>
                                   <INPUT type="password" name ="passwordconf" id="passwordconf"><?php echo "<br>" ?><BR>  
                                 <LABEL for="phone">Phone Number</LABEL>
                               <INPUT type="text" name="phone" id="phone" value="<?php if(isset($_POST["phone"])) echo htmlspecialchars($_POST["phone"]);?>"><?php echo "<br>" ?><BR>
                               <INPUT type="submit">
                             </fieldset>
                           </FORM>

<?php 
//include("footer.php");
  }
}
?>
