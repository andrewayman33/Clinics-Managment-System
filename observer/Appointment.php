<?php
include_once '../Database/singletone.php';

class Appointment 
{
	public  $appointment_date;
	public  $appointment_time;
	public  $doctorID;
	public  $name;
	public  $email;
	public  $phone;
	public  $department;
	public  $doctor;
	private $database;
   
	private $observers = array();
	function __construct() {
		
    }
	function attach(AbstractObserver $observer_in) {
		//could also use array_push($this->observers, $observer_in);
		//$this->observers[] = $observer_in;
		array_push($this->observers, $observer_in);
	  }
	  function detach(AbstractObserver $observer_in) {
		//$key = array_search($observer_in, $this->observers);
		foreach($this->observers as $okey => $oval) {
		  if ($oval == $observer_in) { 
			unset($this->observers[$okey]);
		  }
		}
	  }
	  function notify() {
		foreach($this->observers as $obs) {
		  $obs->update($this);
		}
	  }
	
	function Make_appointment($name,$email,$phone,$appointment,$department_id,$doctor_id)
	{
			 $this->name=$name;
      $this->email=$email;
      $this->phone = $phone;
      $this->appointment = $appointment;
      $this->department = $department_id;
      $this->doctorID =$doctor_id; 
     //Make_appointment();

        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
		    $sql="SELECT department_id FROM `department` WHERE name= '$department_id'";
			//$sql ="SELECT * FROM `sqlstatements` WHERE statementID = 4 ";
			 $result =  $conn->query($sql);
			 while($row = $result->fetch_assoc())
            {
                $department=$row['department_id'];
   			}
   			//echo "SELECT doctor_id FROM `doctor` where doctor_name=$doctor_id && department_id=$deptid";
   			$sql2="SELECT doctor_id FROM `doctor` where doctor_name='$this->doctorID' && department_id=$this->department";
   			$result2 =  $conn->query($sql2);
   			//echo "string";
   			//echo $result2->num_rows;
   			while($row2 = $result2->fetch_assoc())
            {
               $doctorID=$row2['doctor_id'];
   			}
   			
			$sql="INSERT INTO `appointment`(`Name`, `Email`, `phone`,`doctor_id`, `department_id`) VALUES ('$this->name','$this->email','$this->phone',$this->doctorID,$this->department)";

			 if (mysqli_query( $conn,$sql)) {
         		echo "New record created successfully";
            } else
            {
            	echo "error";
            } 
			
	}
	/*function Update_appointment($name,$email,$phone,$appointment,$patient_id,$department_id,$doctor_id)
	{

	}*/
	function delete_appointment($index)
	{
        $sql4 = "SELECT * FROM `appointmentd`WHERE `appointmentD_id` = $index";
	}

}

//$A= new Appointment();
//$A->Make_appointment('andrew','hanyhany@gmail.com','0564848964','2020-12-17 22:31:00.000000','2','2');
//echo "done";


