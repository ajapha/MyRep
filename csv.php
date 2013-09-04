<?php

$row = 0;

if(($handle = fopen("classwork/gitexample/example.csv", "r")) !== FALSE) {
while (($data = fgetcsv($handle, 0, ",")) !==FALSE) {
if($row == 0) {
$field_names = $data; echo $data;
} else {
  $data = array_combine($field_names, $data);
  $records[] = $data;
 }
 $row++;

}
}

foreach($records as $record) { 
$number = 0; 
$number++; 
echo '<br> <br>' .' <u>' . 'Record for ' . $record['INSTNM'] . '</u>' . '<br>'; 
foreach($record as $key => $value) {
    echo $key . ': ' . $value . '<br>';
    $number++;
    
  }
/*  fo recordr($i=0; $i < sizeof($record); $i++) {
    echo $record . '<br>'; 
    echo $i;
}*/

  }


fclose($handle);
//print_r($records);
?>
