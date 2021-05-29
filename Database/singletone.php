<?php
class DbConnection
{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $db_name="clinics plus";
    private $database_connection;
    private static $instance; //single datbase object
    //public static $Counter=0;

 private function __construct()
{
    $this->database_connection = $this->database_connect($this->host,$this->username,$this->password,$this->db_name);
}


//This function is to check that only one object is created for the datatbase
public static function getInstance()
{
    if(!isset(self::$instance))
    {
        self::$instance = new DbConnection();
        //echo "<br>new instance is their<br>";
    }
    else{
        //echo "<br> the instance is their<br>";
    }
    return self::$instance;

}
public function getconnection()
{
    return $this->database_connection;
}

private function database_connect($database_host,$database_username,$database_password,$db_name)
{
    if($connection = mysqli_connect($database_host,$database_username,$database_password,$db_name))
    {
        return $connection;
    }
    else
    {
     die("Database connection error");
    }
}
}
/*for($i=0;$i<100;$i++)
{
    //$con =mysqli_connect("localhost","root","");
    $data=DbConnection::getInstance();
    $con=$data->getconnection();
    if(!$con)
    {
      die('Could not connect:'.mysql_error());
    }
    mysqli_select_db($con,"clinics plus");

}*/
//  $data=new DbConnection();
//  $data2=new DbConnection();
//  for ($i=0;$i<1000;$i++)
//  {
//  	echo "hi ".$i."<br>";
//  $data->getInstance();
//  $data2->getInstance();
// }