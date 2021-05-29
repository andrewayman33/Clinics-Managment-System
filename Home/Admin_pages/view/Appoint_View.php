
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Department list</title>
    <link rel="stylesheet" href="departmentlistcss.css">
</head>

<form action="Appoint_View.php" method="post">
<h3>Please enter the ID of the doctor you want to search</h3>
<input type="text" name="search">
<input type="submit" name="submit" value="Search">

</form>

<?php
include_once '../Model/Appoint_Model.php';
$appoint = new appointment();
if($_POST)
{
$search_value='';
$search_value = $_POST['search'];
if($search_value !='')
{
echo("Search value is equal ".$search_value);
}
$var1=$appoint->doctor_appointments($search_value);
echo $var1;
}
?> 
</html>