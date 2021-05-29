<?php
include_once '../../Database/singletone.php';
class view_patient_with_details{

function get_data()
  {
  	$this->DB=DbConnection::getInstance();
    $conn =$this->DB ->getconnection();

  	$sql = 'SELECT a.appointment_id, a.Name,a.Email,a.phone,a.appointment, dr.doctor_name , `d`.`name` FROM `appointment` AS `a` LEFT JOIN `doctor` AS `dr` ON `a`.`doctor_id` = `dr`.`doctor_id` LEFT JOIN `department` AS `d` ON `a`.`department_id` = `d`.`department_id`';

  	
  	$result =  $conn->query($sql);
  	////////////////////////


  	if ($result->num_rows > 0) {
        $table= " <link rel=\"stylesheet\" type=\"text/css\" href=\"../../assets/css/table.css\">
          <div class=\"wrapper\"><table><tr><th>appointment_id</th><th>Name</th><th>Email</th><th>phone</th><th>appointment</th><th>doctor_name</th><th>department_name</th></tr>";
    	
    	while($row = $result->fetch_assoc()) {
         
          $table.= "<tr><td>". $row["appointment_id"]."</td><td>" .$row["Name"]. "<td>" .$row["Email"]. "</td><td>" .$row["phone"].  "</td><td>" .$row["appointment"]. "</td><td>" .$row["doctor_name"].  "</td><td>" .$row["name"].  "</td></tr>";
    		}
        $table.="<table></dev>";
  	} 	else {
    	echo "0 results";
  	}
    //$this->database->close();
    return $table;
  }
  function gettotal()
  {
        $this->DB=DbConnection::getInstance();
    $conn =$this->DB ->getconnection();
    $sql="SELECT COUNT(appointment_id) As count FROM appointment";
    $result =  $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['count'];
         //$this->database->close();


  }

}