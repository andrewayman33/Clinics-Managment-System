<?php
include_once '../Model/Database.php';
class view_patient_with_details{

function get_data()
  {
  	$this->connectToDB();

  	$sql = 'SELECT a.appointment_id, a.Name,a.Email,a.phone,a.appointment, dr.doctor_name , `d`.`name` FROM `appointment` AS `a` LEFT JOIN `doctor` AS `dr` ON `a`.`doctor_id` = `dr`.`doctor_id` LEFT JOIN `department` AS `d` ON `a`.`department_id` = `d`.`department_id`';

  	
  	$result =  $this->database->query($sql);
  	////////////////////////


  	if ($result->num_rows > 0) {
        $table= "<style>table, th, td {border: 1px solid black;}</style><table><tr><th>appointment_id</th><th>Name</th><th>Email</th><th>phone</th><th>appointment</th><th>doctor_name</th><th>department_name</th></tr>";
    	
    	while($row = $result->fetch_assoc()) {
         
          $table.= "<tr><td>". $row["appointment_id"]."</td><td>" .$row["Name"]. "<td>" .$row["Email"]. "</td><td>" .$row["phone"].  "</td><td>" .$row["appointment"]. "</td><td>" .$row["doctor_name"].  "</td><td>" .$row["name"].  "</td></tr>";
    		}
        $table.="<table>";
  	} 	else {
    	echo "0 results";
  	}
    //$this->database->close();
    return $table;
  }
  function gettotal()
  {
    $this->connectToDB();
    $sql="SELECT COUNT(appointment_id) As count FROM appointment";
    $result =  $this->database->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
         //$this->database->close();


  }
	function connectToDB() {
         global $link;
         $this->database = $link;
      }
}