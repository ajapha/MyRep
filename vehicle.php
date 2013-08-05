<?php

class vehicle {

  public $make;
  public $model;
  public $color;
  public $year;
 
}

class car extends vehicle { 

  public $doors;

function display() {
  $output = '';
  
  $output .= $this->year . " "; 
  $output .= $this->color . " ";
  $output .= $this->make . " ";
  $output .= $this->model . " ";
  $output .= '<br>' . "with " . $this->doors . " doors." . '<br>';

  return $output;
 }

function __construct()  {

 echo "This car is a ";
 }
}

class truck extends vehicle {
  public $cab_size;

function display() {
  $output = '';

  $output .= $this->year;
  $output .= $this->color . " ";
  $output .= $this->make . " ";
  $output .= $this->model . " ";
  $output .= '<br>' . "that seats " . $this->cab_size . "." . '<br>' ;
  return $output;
 }

function __construct()  {

 echo "This truck is a ";
 }
}


$Car1 = new car;
$Car1->year = "2006 ";
$Car1->color = "Blue, ";
$Car1->make = "Toyota ";
$Car1->model = "Camry ";
$Car1->doors = "4";
echo $Car1->display(); 

$Car2 = new car;
$Car2->year = " 2003 ";
$Car2->color = "Red, ";
$Car2->make = "Ford ";
$Car2->model = "Mustang ";
$Car2->doors = "2";
echo $Car2->display();

$Car3 = new car;
$Car3->year = "2010 ";
$Car3->color = "Gray, ";
$Car3->make = "Hyundai ";
$Car3->model = "Sonata ";
$Car3->doors = "4";
echo $Car3->display();

$Truck1 = new truck;
$Truck1->year = "2000 ";
$Truck1->color = "White ";
$Truck1->make = "Chevy ";
$Truck1->model = "DS 10 ";
$Truck1->cab_size = "3";
echo $Truck1->display();

$Truck2 = new truck;
$Truck2->year = "2002 ";
$Truck2->color = "Black ";
$Truck2->make = "Ford ";
$Truck2->model = "4x4 ";
$Truck2->cab_size = "4";
echo $Truck2->display();

?>
  

