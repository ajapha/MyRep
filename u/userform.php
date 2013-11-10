<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>College Info</title>
        <link rel="shortcut icon" href="http://www.clker.com/cliparts/2/5/8/b/136130882740104470Black Graduation Cap.svg.thumb.png" />
</head>

<?php

echo '<h1>Welcome to the Website! <br></h1> <h2>Please enter your information below.</h2>';
echo '<FORM action="useradd.php" method="post">
                            <fieldset>
                               <LABEL for="firstName">First Name? </LABEL>
                                 <INPUT type="text" name="firstName" id="firstName"><BR>
                                  <LABEL for="lastName">Last Name</LABEL>
                                   <INPUT type="text" name ="lastName" id="lastName"><BR>
                                   <LABEL for="email">Email Address </LABEL>
                                      <INPUT type="text" name ="email" id="email"><BR>                
                                     <LABEL for="password">Choose a password </LABEL>
                                   <INPUT type="password" name ="password" id="password"><BR>         
                                 <LABEL for="phone">Phone Number</LABEL>
                               <INPUT type="phone" name="phone" id="phone"><BR>
                               <INPUT type="submit">
                             </fieldset>
                         </FORM>';


?>

