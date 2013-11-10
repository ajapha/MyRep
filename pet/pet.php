<?php

echo '<h1>Welcome to the pet registry! <br></h1> <h2>Please enter your information below.</h2>';

echo '<FORM action="insert.php" method="post">
                            <fieldset>
                               <LABEL for="petName">What is your pet\'s name? </LABEL>
                                <INPUT type="text" name="petName" id="petName"><BR>
                                 <LABEL for="owner">What is your name?</LABEL>
                                  <INPUT type="text" name ="owner" id="owner"><BR>
                                   <LABEL for="species">What type of pet do you have? </LABEL>
                                    <INPUT type="species" name ="species" id="species"><BR>                
				      <LABEL for="color">What color is your pet? </LABEL>
                                       <INPUT type="text" name ="color" id="color"><BR>                    
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


?>
