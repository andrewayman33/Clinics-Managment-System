<?php 

include_once '../../../Database/singletone.php';

class users {
	private $user_id;
	private $full_name;
	private $username;
	private $password;
	private $type;
	private $is_active;
	private $utype_id;
    private $database;

	 function getuser_id() {
        return $this->user_id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getFull_name() {
        return $this->full_name;
    }
    function gettype() {
        return $this->type;
    }
    function getis_active() {
        return $this->is_active;
    }
        function getutype_id() {
        return $this->utype_id;
    }

    /////////////////////////////////////////////////////////////////////
  	function setId($user_id) {
        $this->user_id = $user_id;
    }
    function setUsername($username) {
        $this->username= $username;;
    }

    function setPassword($password) {
        $this->password= $password;
    }

    function setFull_name($full_name) {
        $this->full_name=$full_name;
    }
    function settype($type) {
        $this->type=$type;
    }
    function setis_active($is_active) {
        $this->is_active=$is_active;
    }
    function setutype_id($utype_id) {
        $this->utype_id=$utype_id;
    }
    

	function insert_info($full_name,$username,$password,$type, $is_active,$utype_id)
	{
         $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $pwd=md5($password);
		$sql="INSERT INTO `users` (`Full_name`, `username`, `password`, `type_id`, `is_active`, `s_id`) VALUES ('$full_name','$username','$pwd','$type', '$is_active','$utype_id')";
//$sql= "INSERT INTO 'users' ('Full_name', 'username', 'password', 'type_id', 'is_active') VALUES (NULL, '$full_name', '$username', '$pwd','$type', '$is_active')";
        //mysqli_query($database,$sql);

        if (mysqli_query($conn, $sql)) {
         echo "New record created successfully";
            } 
            else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            mysqli_close($conn);    


	}	


}

/*$u=new users();
$u->insert_info('asd','mina','123','1','1','1');*/