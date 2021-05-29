<?php 

include_once '../../../Database/singletone.php';

class Appointment 
{
   private $database;
   private $appointment_id;
   private $Name;
   private $Email;
   private $phone;
   private $doctor_id;


 //Set functions  
function setappointment_id($appointment_id) {
    $this->appointment_id = $appointment_id;
}
function setName($Name) {
    $this->Name = $Name;
}
function setEmail($Email) {
    $this->Email = $Email;
}
function setphone($phone) {
    $this->phone = $phone;
}
function setdoctor_id($doctor_id) {
    $this->doctor_id = $doctor_id;
}

//-----------------------------------------------
//get functions
   function getappointment_id() {
    return $this->appointment_id;
}

function getName() {
    return $this->Name;
}
function getEmail() {
    return $this->Email;
}
function getphone() {
    return $this->phone;
}
function getdoctor_id() {
    return $this->doctor_id;
}
//-----------------------------------------------
function connectToDB() {
    global $link;
    $this->database = $link;
}
function doctor_appointments($search_value)
{
    $this->DB=DbConnection::getInstance();
    $conn =$this->DB ->getconnection();
   // echo"SELECT * FROM `appointment` WHERE doctor_id=$search_value";
    $sql2="SELECT `doctor_name` FROM `doctor` WHERE doctor_id= $search_value";
    $result2 =  $conn->query($sql2);
    while($row = $result2->fetch_assoc())
         {
          $doctor=$row["doctor_name"];
         }
    $sql= "SELECT * FROM `appointment` WHERE doctor_id=$search_value";
    $result =  $conn->query($sql);
//    $result->num_rows > 0
$row_cnt = $result->num_rows;
$table= "<style> table, th, td {border: 1px solid black;}</style><h3>Name doctor $doctor</h3><table>
<tr> <th> Name</th> <th> Phone</th> <th> time</th></tr>"; 
    if($row_cnt > 0)
    {
        while($row = $result->fetch_assoc())
         {
        $table.= "<tr><td>".$row["Name"]."</td><td>". $row["phone"]."</td><td>" .$row["appointment"]."</td></tr>";
        }
    }
    else
    {
        $table='<br> There is no appointments for this doctor';
        
    }

    return $table;  
}

}