<?php

  $count = 0;
  $even = array();
  $odd = array();

  while ($count <= 20) {
    if($count % 2 == 0){
     $even[] = $count;
    } else {
     $odd[] = $count;
   }
    $count++;
   }
print_r($even);
print_r($odd);

?>
