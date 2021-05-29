<?php 
include_once '../view/analysis_view.php';
//include_once '../View/analysis_view.php';

$view=new tests_view();
$data=new view_tests();
$ID;
$patient_name;
$pateint_id;
$main_package_id;
$test1;
$test2;
$total_cost;
$timestamp;

/*$data-selectalltests($ID,$patient_name,$pateint_id,$main_package_id,$test1,$test2,$total_cost,$timestamp);

echo $view->tests_view($ID,$patient_name,$pateint_id,$main_package_id,$test1,$test2,$total_cost,$timestamp);*/

$Html=$data->get_data();
?>
<html>
<?php echo $Html;?>
<!-- <button type="submit" class="registerbtn">delete</button> -->
<form action="view_users.php" method="post">
 	<input type="text"  class="registerbtn" placeholder="Enter ID" name="ID" required>
 	<input type="submit" value="delete">
 	</form>
</html>
	