<?php

class newer {
  public $prop1;
  public $prop2;

 function __construct() {
 echo "Saying ";
 }

 function set_props($push) {
  $this->prop1 = $push;
  echo $push;
 }
 function set_props2($pull) {
  $this->prop2 = $pull;
  echo $pull;
 }

 function get_props() {
  return $this->prop1;
 }

 function get_props2() {
  return $this->prop2;
  }

}

$obj1 = new newer;

//echo $obj1->get_props();
//echo $obj1->get_props2();
//echo $obj1->set_props('Hello ');
//echo $obj1->set_props2('World');
$time = $obj1;
//$time = $obj1->get_props();
//$time = $obj1->get_props2();
$time = $obj1->set_props('Hello ');
$time = $obj1->set_props2('World');
echo $time;  
//print $obj1;
//print_r($obj1)
?>

