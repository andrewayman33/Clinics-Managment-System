<?php
include_once '../../Database/singletone.php';
include_once '../Model/MakeReport.php';
$report = new Report();
//$report->browseReports();
if(isset($_POST['submit']))
{
    $patientName=$_POST['patientName'];
    $reportSubject=$_POST['reportSubject'];
    $age=$_POST['age'];
    $doctor_id=$_POST['doctor_id'];
    $report_info=$_POST['report_info'];
    $report_time=$_POST['report_time'];
    $report->addReport($reportSubject, $patientName,$doctor_id,$report_info,$report_time,$age);
    $report->browseReports();

}
else
{
  $report->browseReports();
}
?>
<!--<html>
<div class="text-center">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
  </div>
</html>-->
