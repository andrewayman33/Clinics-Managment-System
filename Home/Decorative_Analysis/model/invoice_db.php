<?php 

include_once '../../../Database/singletone.php';
class invoicedb {
	private $ID;
	private $patient_name;
	private $patient_id;
    private $main_package_id;
    private $test1;
    private $test2;
    private $total_cost;
    private $timestamp;


	 function getID() {
        return $this->ID;
    }

    function getpatient_name() {
        return $this->patient_name;
    }

    function getpatient_id() {
        return $this->patient_id;
    }

    function getmain_package_id() {
        return $this->main_package_id;
    }
    function gettest1() {
        return $this->test1;
    }
    function gettest2() {
        return $this->test2;
    }
        function gettotal_cost() {
        return $this->total_cost;
    }

     function gettimestamp() {
        return $this->timestamp;
    }
    


    /////////////////////////////////////////////////////////////////////
  	function setID($ID) {
        $this->ID = $ID;
    }
    function setpatient_name($patient_name) {
        $this->patient_name= $patient_name;
    }

    function setpatient_id($patient_id) {
        $this->patient_id= $patient_id;
    }

    function setmain_package_id($main_package_id) {
        $this->main_package_id=$main_package_id;
    }
    function settest1($test1) {
        $this->test1=$test1;
    }
    function settest2($test2) {
        $this->test2=$test2;
    }
    function settotal_cost($total_cost) {
        $this->total_cost=$total_cost;
    }
    function settimestamp($timestamp) {
        $this->timestamp=$timestamp;
    }
    
    function insert_info($patient_name,$patient_id,$main_package_id,$test1, $test2,$total_cost)
	{
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();

		$sql="INSERT INTO `invoicedb`(`patient_name`, `pateint_id`, `main_package_id`, `test1`, `test2`, `total_cost`) VALUES ('$patient_name','$patient_id','$main_package_id','$test1', '$test2','$total_cost')";



                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                    } 
                    else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    mysqli_close($conn);    
    }
    function Getinfo(&$patient_name,&$pateint_id,&$main_package_id,&$test1, &$test2,&$total_cost,&$ID,&$timestamp)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();

        $sql="SELECT * FROM invoicedb;";   
        $result =  $conn->query($sql);
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $patient_name[]=$row["patient_name"];//a
              $pateint_id[]=$row["pateint_id"];//b
              $main_package_id[]=$row["main_package_id"];//c
              $test1[]=$row["test1"];//d
              $test2[]=$row["test2"];//e
              $total_cost[]=$row["total_cost"];//f
              $ID[]=$row["ID"];
              $timestamp[]=$row["timestamp"];
           }
      }

    }	

    

}



//$u=new invoicedb();
//$u->Getinfo($a,$b,$c,$d,$e,$f);
//$u->insert_info('mariooo','11','22','11','11','500');
