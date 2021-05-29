<?php
include_once '../../../Database/singletone.php';
class view_tests
{
  private $database;

 function get_data()
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();

        $sql="SELECT * FROM invoicedb;";   
        $result = $conn->query($sql);;
      if ($result->num_rows > 0) 
      {
        $table= "<style> table, th, td {border: 1px solid black;}</style>
        <table><tr><th> iD</th> <th> patient Name</th> <th>Patient ID</th><th>Main packages</th><th>Test1</th><th>Test2</th><th>total cost</th><th>Time Stamp</th></tr>";
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
           $table.="<tr><td>". $ID[0]."</td><td>". $patient_name[0]."</td><td>". $pateint_id[0]."</td><td>". $main_package_id."</td><td>". $test1[0]."</td><td>". $test2[0]."</td><td>". $total_cost[0]."</td><td>". $timestamp[0]."</td></tr>";
      }
      $table.="<table>";
    }
  //  echo $table;
  }
    	
    	