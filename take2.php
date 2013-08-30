<?php
echo '<a href="./take2.php?page=nameform">Click to View Name Form</a> ';
    echo '<br>';
    echo '<a href="./take2.php?page=carform">Click to View Your Car\'s Value</a>';
    echo '<br>';

$page = $_GET['page'];
$obj = new $page;
$obj->show_form;
$obj->writeForm;

class carform {
  public show_form() {
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
  
  public function writeForm() {
    session_start();
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

}

class nameform {
  public function show_form() {
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

  public function writeForm() {
    session_start();
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

}

?>
