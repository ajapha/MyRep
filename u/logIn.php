<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>College Info</title>
        <link rel="shortcut icon" href="http://www.clker.com/cliparts/2/5/8/b/136130882740104470Black Graduation Cap.svg.thumb.png" />
</head>

<?php
echo "Please enter your email address and password.";

   echo '<FORM action="verify.php" method="post">
                            <fieldset>
                                   <LABEL for="email">Email Address </LABEL>
                                      <INPUT type="email" name ="email" id="email"><BR>                
                                     <LABEL for="password">Password </LABEL>
                                   <INPUT type="password" name ="password" id="password"><BR>         
                               <INPUT type="submit">
                             </fieldset>
                         </FORM>';


?>
