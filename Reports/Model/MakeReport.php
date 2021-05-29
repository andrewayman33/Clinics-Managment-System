<?php
include_once '../../Database/singletone.php';
class Report 
{
    public  $Report_Subject;
	public  $Report_date;
	public  $doctorID;
	public  $patient_name;
    public  $Report_info;
    public  $patient_Age;
    public  $DB;

 //Set functions  
 function setReport_Subject($Report_Subject) {
    $this->Report_Subject = $Report_Subject;
}
function setReport_date($Report_datee) {
    $this->Report_date = $Report_date;
}
function setdoctorID($doctorID) {
    $this->doctorID = $doctorID;
}
function setpatient_name($patient_name) {
    $this->patient_name = $patient_name;
}
function setReport_info($Report_info) {
    $this->Report_info = $Report_info;
}
function setpatient_Age($patient_Age) {
    $this->patient_Age = $patient_Age;
}
//-----------------------------------------------
//get functions
   function Report_Subject() {
    return $this->Report_Subject;
}

function Report_date() {
    return $this->Report_date;
}
function getdoctorID() {
    return $this->doctorID;
}
function getpatient_name() {
    return $this->patient_name;
}
function getReport_info() {
    return $this->Report_info;
}
function getpatient_Age() {
    return $this->patient_Age;
}
//----------------------------------------------
    function browseReports()
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();

        $sql="SELECT * FROM `reports` WHERE `report_isdeleted` = 0";
        $result = $conn->query($sql);
        $row_cnt = $result->num_rows;
        $table= "
          <link rel=\"stylesheet\" type=\"text/css\" href=\"../../assets/css/table.css\">
          <div class=\"wrapper\">
        <style> </style><table>
        <tr> <th> Report Type</th> <th> patientName</th> <th> report_info</th><th> report_time</th><th>View</th><th>Edit</th><th>Delete</th></tr>"; 
      if($row_cnt > 0)
      {
        /*while($row = $result->fetch_assoc())
         {
        $table.= "<tr><td>".$row["reportSubject"]."</td><td>". $row["patientName"]."</td><td>" .$row["report_info"]."</td><td>" .$row["report_time"]."</td> 
        <td> <button href='reportView.php'.$reportID>View</button> </td> <td> <button href=#>Edit</button> <td> <button href=#>Delete</button> </td> </td></tr>";
        }*/
        for ($i=0 ; $i<$row_cnt ;$i++)
        {
            $row = $result->fetch_assoc();
            $table.= "<tr><td>".$row['reportSubject']."</td><td>". $row['patientName']."</td><td>" .$row['report_info']."</td><td>" .$row['report_time']."</td> 
            <td> <a href=\"uu.php?reportID=".$row['reportID']."\"><button >View</button> </a></td> <td> <button href=#>Edit</button> <td> <button href=#>Delete</button> </td> </td></tr>";
        }

      }
      $table.="</div>";
       echo $table;
    }
    //---------------------------------------------------------------------------------------------------
    function addReport($Report_Subject,$patient_name,$doctorID,$Report_info,$Report_date,$patient_Age)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        // $sql="INSERT INTO `reports`(`reportSubject`, `patientName`, `doctor_id`, `report_info`,  `report_isdeleted`) VALUES ($Report_Subject,$patient_name,5,$Report_info,'0')";
        $sql="INSERT INTO reports( reportSubject, patientName, doctor_id, report_info, report_isdeleted) VALUES ('$Report_Subject','$patient_name','$doctorID','$Report_info','0')";
        //echo $sql;
        if (mysqli_query($conn,$sql)) {

            echo "New record created successfully";
       } else
       {
           echo "error";
       }
       

    }
    //------------------------------------------------------------------------------------------------------
    function editReport($Report_Subject,$patient_name,$doctorID,$Report_info,$Report_date,$patient_Age)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $sql="UPDATE `reports` SET `report_info` = 'test' WHERE `reports`.`reportID` = 1"; 
    }
 

}

