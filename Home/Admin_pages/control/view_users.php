<?php 
include_once '../Model/view_users.php';
include_once '../view/view_users.php';


$data=new view_users();



if (isset($_GET['user_id']))
{
	$data->delete_record($_GET['user_id']);
}


$data->get_data($x,$y,$z,$l,$m,$n);
$data2=new users_view();
$data2->get_all_user($x,$y,$z,$l,$m,$n);


if ($_POST) {

	$index=$_POST['ID'];
	$data->delete_record($index);

	
}
if (isset($_GET['user_id2']))
{
	echo ' <script>location.href="../view/view_one_user.php";</script>';
}
//echo $Html;
//<!-- <button type="submit" class="registerbtn">delete</button> -->





//<!-- //header("Location: ../view/view_users.html?");
//$data=new view_users();
//$Html=$data->get_data();

//header("Location: ../view/view_users.html"); -->