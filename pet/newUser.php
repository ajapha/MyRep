<?php
echo "Please enter your email address and password.";

   echo '<FORM action="verify.php" method="post">
                            <fieldset>
                                   <LABEL for="email">Email Address </LABEL>
                                      <INPUT type="text" name ="email" id="email"><BR>                
                                     <LABEL for="password">Password </LABEL>
                                   <INPUT type="password" name ="password" id="password"><BR>         
                               <INPUT type="submit">
                             </fieldset>
                         </FORM>';


?>
