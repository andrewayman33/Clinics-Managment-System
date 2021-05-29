<?php 
include_once '../../Database/singletone.php';
class doctor
{
  function select_all_doctors(&$dr_id,&$dr_name,&$dept_name)
  {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $sql="SELECT 'doctor.doctor_id',`doctor`.`doctor_name`, `department`.`name` FROM `doctor`  LEFT JOIN `department` ON `doctor`.`department_id` = `department`.`department_id` ORDER by `department`.`name`;";

      $result =  mysqli_query($conn,"SELECT doctor.doctor_id,`doctor`.`doctor_name`, `department`.`name` FROM `doctor`  LEFT JOIN `department` ON `doctor`.`department_id` = `department`.`department_id` ORDER by `department`.`name`;") or die(mysqli_error());
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $dr_id[]=$row["doctor_id"];
              $dr_name[]=$row["doctor_name"];
              $dept_name[]=$row["name"];
           }
      }

      //return $array;
  } 

  
}