<?php
/*
echo '<FORM action="insert.php" method="post">
                            <fieldset>
                                          <LABEL for="petName">What is your pet\'s name? </LABEL>
                                <INPUT type="text" name="petName" id="petName"><BR>
                                 <LABEL for="owner">What is your name?</LABEL>
                                  <INPUT type="text" name ="owner" id="owner"><BR>
                                   <LABEL for="species">What type of pet do you have? </LABEL>
                                    <INPUT type="species" name ="species" id="species"><BR>                  
                                     <LABEL for="color">What color is your pet? </LABEL>
                                    <INPUT type="color" name ="color" id="color"><BR>
				      <LABEL for="birth">What is your pet\'s birthday? </LABEL>
                                   <INPUT type="date" name="birth" id="birth"><BR>
                                   <LABEL for="death">When did your pet die(if applicable)? </LABEL>            
                                              <INPUT type="date" name="death" id="last_name"><BR>
                                         <LABEL for="gender">What gender is your pet? </LABEL><br>                     
                                            <INPUT type="radio" name="gender" value="m">Male<br>
                                        <INPUT type="radio" name="gender" value="f">Female<BR>
                                    <INPUT type="submit" value="Send"> <INPUT type="reset">
                           </fieldset>
                         </FORM>';
*/
$petName = $_POST['petName']; 
$owner = $_POST['owner']; 
$species = $_POST['species'];
$birth = $_POST['birth'];
$death = $_POST['death'];
$gender = $_POST['gender'];
$color = $_POST['color'];     

$insert_ct = 3; 
$host = 'localhost';
$dbname = 'pcs1';
$user = 'dba';
$pass = 'pcs';

try {
  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}  catch (PDOException $e) {

   echo $e->getMessage();

}
//$query = "INSERT INTO pet(name, owner, species, gender, birth, death) VALUES('$petName', '$owner', '$species', '$gender', '$birth', '$death'");
$insert_ct =  $DBH->exec("INSERT INTO pet(name, owner, species, gender, birth, death, color) VALUES('$petName', '$owner', '$species', '$gender', '$birth', '$death', '$color')");
//$DBH = NULL;

if($insert_ct == 1){
echo '<h1><br>Thank you, we have entered your pet\'s information into our registry.</h1>';
}

?>                                         
