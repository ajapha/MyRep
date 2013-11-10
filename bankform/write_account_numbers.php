<?php
  include 'file.php';
  class an extends file_manage { 
    public function __construct() {   
      for($n = 13241111; $n <= 14122131; $n= $n + 13) {
echo $n;      
 $numbers = array();
   $numbers[] = $n;
   $this->writeFile("account_numbers.csv", $numbers, "a");
     }
 //  print_r($numbers);
 // $this->writeFile("account_numbers.csv", $numbers, "w"); 
    }
  }
$obj = new an();



?>
