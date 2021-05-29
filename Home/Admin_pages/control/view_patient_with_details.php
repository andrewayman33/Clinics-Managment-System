<?php 
include_once '../Model/view_patients_with_details.php';


$data=new view_patient_with_details();

$Html=$data->get_data();
$total=$data->gettotal();
?>

<html>
<?php echo $Html;?>
<!-- <button type="submit" class="registerbtn">delete</button> -->
<p style="color: red; font-size: 30;margin-left:35%">Total of appointment: <?php echo $total;?></p>
<form action="view_patients_with_details.php" method="post">
</form>
</html>