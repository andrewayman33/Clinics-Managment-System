<?php
include_once 'Appointment.php';
include_once '../Database/singletone.php';
//---------Start of abstract classes----------
abstract class AbstractObserver {
    abstract function update($name,$email,$data);
}

abstract class AbstractSubject {
    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}
//---------End of abstract classes----------

/*function writeln($line_in) {
    echo $line_in."<br/>";
}*/

//---------Start of observer classes---------------
class PatternObserver extends AbstractObserver {
    //private $name;
   // private $observerState;
    private $Subjectobj;
    public  $appointment;
  	public  $doctorID;
  	public  $name;
  	public  $email;
  	public  $phone;
  	public  $department;
  	public  $doctor;
    private $date;
    public function get_name()
    {
        return $this->name;
    }
    public function get_email()
    {
        return $this->email;
    }
    public function get_date()
    {
        return $this->date;
    }
   public function __construct($Subjectobj,$name,$email,$date) {
       $this->Subjectobj= $Subjectobj;
       $this->name=$name;
       $this->email=$email;
       $this->date=$date;
       $Subjectobj->attach($this);

    }

public function update($name,$email,$date) {

$to_email = $email;
$subject =  "Confirmation Mail From Sant George Clinic";
$body = "Thanks  ".$name."  For making an appointment Waiting you  ".$date." ";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
    echo '<script>alert("Email sent successfully !")</script>';
     echo '<script>window.location.href="../index.html";</script>';
} else {
    echo "Email sending failed...";
}
      
      //writeln('*IN PATTERN OBSERVER - NEW PATTERN GOSSIP ALERT*');
      //writeln(' new favorite patterns: '.$subject->getFavorites());
      //writeln('*IN PATTERN OBSERVER - PATTERN GOSSIP ALERT OVER*');   
      //Make_appointment($name,$email,$phone,$appointment,$department_id,$doctor_id)   
     
			

    }
    function Make_appointment()
	{
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
			 //$sql="SELECT * FROM `department` WHERE name= $department_id";
			// echo $department_id;echo "SELECT department_id FROM `department` WHERE name= '$department_id'";

			// $sql="SELECT department_id FROM `department` WHERE name= '$department_id'";
			$sql ="SELECT * FROM `sqlstatements` WHERE statementID = 4 ";
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
   			//echo $deptid;
   			//echo $dr_id;
			$sql="INSERT INTO `appointment`(`Name`, `Email`, `phone`, `appointment`,`doctor_id`, `department_id`) VALUES ('$this->name','$this->email','$this->phone','$this->appointment',$this->doctorID,$this->department)";
			 if (mysqli_query( $conn,$sql)) {
         		echo "New record created successfully";
            } else
            {
            	echo "error";
            } 
			
			
	}
}

class PatternSubject extends AbstractSubject {
    private $favoritePatterns = NULL;
    private $observers ;
    function __construct() {
        $this->observers= array();
    }
    function attach(AbstractObserver $observer_in) {
      //could also use array_push($this->observers, $observer_in);
      //$this->observers[] = $observer_in;
     // $this->array[] = $observer_in;
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
     /* foreach($this->observers as $obs) {
        $obs->update($this);
      }*/
      //foreach ($this->observers as $package) {
       // $this->observers->update();
      //print_r($package);
      
    //}

   // print_r($this->observers);
   // printer_list($this->observers);
      //echo $this->observers->$name;
    echo $this->observers[0]->update($this->observers[0]->get_name(),$this->observers[0]->get_email(),$this->observers[0]->get_date());
    }
}
    /*function updateFavorites($newFavorites) {
      $this->favorites = $newFavorites;
      $this->notify();
    }
    function getFavorites() {
      return $this->favorites;
    }*/

//---------End of concrete classes--------------

  #writeln('BEGIN TESTING OBSERVER PATTERN');
  #writeln('');


/*$consubobj=new PatternSubject();
$concobser =new PatternObserver($consubobj,"hi","andrewzaky20@gmail.com","hello");
$concobser2 =new PatternObserver($consubobj);
$concobser3 =new PatternObserver($consubobj);
$consubobj->attach($concobser);
$consubobj->notify();
*/
/*  $patternGossiper = new PatternSubject();
  $pattern2 = new Appointment();
  $patternGossipFan = new PatternObserver($pattern2);*/
  //$patternGossipFan->update("Yumna","yomna.ahmed10@msa.edu.eg","019878296975","2020-11-30 23:42:00.000000","2","1");
  //$pattern2->attach($patternGossipFan);
  #$patternGossiper->updateFavorites('abstract factory, decorator, visitor');
  #$patternGossiper->updateFavorites('abstract factory, observer, decorator');
  //$patternGossiper->detach($patternGossipFan);
  #$patternGossiper->updateFavorites('abstract factory, observer, paisley');

  #writeln('END TESTING OBSERVER PATTERN');

