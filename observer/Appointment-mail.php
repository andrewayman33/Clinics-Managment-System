<?php
include_once 'Appointment.php';
include_once 'observer.php';

if (isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$dept=$_POST['department'];
	$doctor=$_POST['doctor'];
	$appointment=1;
	$dept=1;
	$doctor=1;
	$date=$_POST['date'];
	/*echo $name;
	echo $email;
	echo $dept;
	echo $doctor;*/
	/*echo $date;*/
$appobj=new Appointment();
$appobj->Make_appointment($name,$email,$phone,$appointment,$dept,$doctor);
$consubobj=new PatternSubject();
$concobser =new PatternObserver($consubobj,$name,$email,$date);
//$consubobj->attach($concobser);
$consubobj->notify();
/*echo"yes";*/
}

