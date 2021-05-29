<?php
include 'view_doctors.php';
echo "<br>";
$c=new view_doctors();
echo "<pre>";
$r=$c->view_all_doctor();
print_r($r);
echo "<pre>";

echo $r['type'];
  $z = ['me','you', 'he'];
  array_push($z, 'she', 'it');
  print_r($z);
?>