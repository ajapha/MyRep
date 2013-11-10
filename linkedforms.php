<?php

  session_start();

  if (!isset($_SESSION['count']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['count'] = 0;
      } else {
       $_SESSION['count']++;
      }

  if($_REQUEST == NULL) {
    echo '<a href="./linkedforms.php?page=nameform">Click to View Name Form</a> ';
    echo '<br>';
    echo '<a href="./linkedforms.php?page=carform">Click to View Your Car\'s Value</a>';
    echo '<br>';
   } elseif(($_REQUEST['page'] == 'nameform') && ($_SERVER['REQUEST_METHOD'] == 'GET'))   {
      
        echo ' <FORM action="linkedforms.php?page=nameform" method="post">
                <fieldset>
                  <LABEL for="firstname">First Name: </LABEL>
                    <INPUT type="text" name="firstname" id="firstname"><BR>
                  <LABEL for="lastname">Last Name: </LABEL>
                    <INPUT type="text" name="lastname" id="lastname"><BR>
                    <INPUT type="radio" name="gender" value="male"> Male<BR>
                    <INPUT type="radio" name="gender" value="female"> Female<BR>
                    <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>
              </FORM>';
     } 
 
  elseif(($_REQUEST['page'] == 'nameform') && ($_SERVER['REQUEST_METHOD'] == 'POST'))   {
     echo 'Your name is ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ' and you are a ' . $_POST['gender'] . '<br>';
  
     
    foreach($_POST as $names) {
      $_SESSION['names'][] = $names;
    }
   
    $fp = fopen('write/names.csv', 'w');
    foreach($_SESSION['names'] as $name) {
      $named = (array) $name;
      fputcsv($fp, $named);
      
    }
    fclose($fp);
  }  

  elseif($_REQUEST['page'] == 'carform' && $_SERVER['REQUEST_METHOD'] == 'GET')  {
   
         echo '<FORM action="linkedforms.php?page=carform" method="post">
                <fieldset>
                  <LABEL for="make">Make: </LABEL>
                    <INPUT type="text" name="make" id="firstname"><BR>
                  <LABEL for="model">Model: </LABEL>
                    <INPUT type="text" name="model" id="lastname"><BR>
                <LABEL for="year">Year: </LABEL>
                    <INPUT type="text" name="year" id="first_name"><BR>
		<LABEL for="make">Color: </LABEL>
                    <INPUT type="text" name="color" id="first_name"><BR>  
		  <INPUT type="submit" value="Send"> <INPUT type="reset">
                </fieldset>                                   
               </FORM>';


  }

  elseif(($_REQUEST['page'] == 'carform') && ($_SERVER['REQUEST_METHOD'] == 'POST'))  { 
    echo 'Your ' . $_POST['color'] . ', ' . $_POST['year'] . ' ' .  $_POST['make'] . ' ' . $_POST['model'] . ' is worth $' . rand(5000, 12000) . '<br>';


    foreach($_POST as $cars) {
      $_SESSION['cars'][] = $cars;

    }


    $fp = fopen('write/cars.csv', 'w');
    foreach($_SESSION['cars'] as $wheels) {
       $car = (array) $wheels;
       fputcsv($fp, $car);
    }
    fclose($fp);
  }
  
  if($_SESSION['count'] > 10) {
    session_destroy();
  }

//print_r($_SESSION);

?>





