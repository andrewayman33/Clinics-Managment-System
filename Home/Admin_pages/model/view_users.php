<?php
include_once '../Model/add_user.php';
include_once '../../../Database/singletone.php';

class view_users{

	private $database;
function get_data(&$user_id,&$Full_name,&$username,&$type_id,&$is_active,&$createTime)
{
	 $this->DB=DbConnection::getInstance();
   $conn =$this->DB ->getconnection();

	$sql = 'SELECT user_id , Full_name,	username,type_id,is_active,createTime,is_deleted FROM  users';
	$result =  $conn->query($sql);
	if ($result->num_rows > 0) {
     
  // output data of each row
  	while($row = $result->fetch_assoc()) {
      if ($row["is_deleted"]=='0')
      {
        if ($row["type_id"]=='1')
        {
          $row["type_id"]='Admin';
        }
        if ($row["type_id"]=='2')
        {
          $row["type_id"]='Doctor';
        }
        if ($row["type_id"]=='6')
        {
          $row["type_id"]='Laboratory';
        }
        $user_id[]=$row["user_id"];
        $Full_name[]=$row["Full_name"];
        $username[]=$row["username"];
        $type_id[]= $row["type_id"];
        $is_active[]=$row["is_active"];
        $createTime[]=$row["createTime"];
      }
       

  		}
     
	} 	else {
  	echo "0 results";
	}
}
function delete_record($index)
{
     $this->DB=DbConnection::getInstance();
   $conn =$this->DB ->getconnection(); 
   //$x=md5($index);
   $sql="UPDATE `users` SET `is_deleted` = '1' WHERE `users`.`user_id` =".$index.";";
   if (mysqli_query($conn, $sql)) {
          //echo "record deleted successfully"; 
        } 
            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

}

}
/*$data=new view_users();
$Html=$data->get_data();
echo $Html;*/


//header("Location: ../view/view_users.php");