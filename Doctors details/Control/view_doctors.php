<?php 
include_once '../Model/view_doctors.php';
include_once '../View/view_doctors.php';

$view=new Doctor_view();
$data=new doctor();
$doctors_id;
$doctors_name;
$dept;

$data->select_all_doctors($doctors_id,$doctors_name,$dept);

echo $view->veiw_html($doctors_id,$doctors_name,$dept);

	//$data->showname();
    if ($_POST) {
	//$index=$_POST['get_by_Id'];
	//echo $index;
//	$data->appointment_num($index);
	}
//$Html[]="";
// $z[]="";
// $z[]=$data->showname($Html);
// //echo $z;
// print_r($z);
// echo "<br>";
// print_r($Html);
