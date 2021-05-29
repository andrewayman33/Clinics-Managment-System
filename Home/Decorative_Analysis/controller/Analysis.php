<?php

include_once '../model/main_analysis_packages.php';
include_once 'add_new_analysis_html.php';
include_once '../model/invoice_db.php';

$view_MA = new Analysis_view();
$html=$view_MA->Html_view();
echo $html;
$z=[];
$z=$view_MA->resiving();

$a=0;
$b=0;
$c=0;
$d=0;


if (isset($_POST['submit']))
      {
//echo $x;
if( isset($z))
{

 foreach ($z as $package) {
        if ($package==1)
        {
            $obj = new package1();  
            $a=1;  
        }
        if ($package==2)
        {
        $obj = new package2();
        $a=2;            
        }
        if($obj!=null)
        {
        if ($package==3)
        {
            $obj = new type1($obj);
            $c=1;
        }
        if ($package==4)
        {
            $obj = new type2($obj);
            $d=1;
        }
        }
      }

      $x=$obj->cost();
      //echo $x;
     
  
        $name=$_POST['name'];
        $id=$_POST['idd'];

        $u=new invoicedb();
        $u->insert_info($name,$id,$a,$c,$d,$x);
       
      }
     
echo ' <script>location.href="invoice.php";</script>';
}



