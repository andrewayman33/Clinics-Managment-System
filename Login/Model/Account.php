<?php

include_once 'AccountType.php';
include_once 'AccountStatus.php';
include_once '../../Database/singletone.php';

interface IAccount {
    public function login($username,$password);
    public function link_page(&$links_id);
}
class Factory
{
    function login($type)
    {
        $user_typeobj;
        //echo strcmp('Administrators',$type);
        if($type==1)
        {
            $user_typeobj=new admin();
            return $user_typeobj;
        }
        if($type==2)
        {
            $user_typeobj=new doctor();
            return $user_typeobj;
        }
        if($type==6)
        {
            $user_typeobj=new Analysis();
            return $user_typeobj;
        }

        return null;
    }
}
class Account {

    private $database;
    private $user_id;
    private $Full_name;
    private $username;
    private $password;
    private $createTime;
    private $accountTypeobj;
    private $accountStatus;
    private $factory;

    function Type()
    {

    }
    function getId() {
        return $this->user_id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getFull_name() {
        return $this->Full_name;
    }

    function getCreateTime() {
        return $this->createTime;
    }

    function getAccountType() {
        return $this->accountType;
    }

    function getAccountStatus() {
        return $this->accountStatus;
    }

    function setId($user_id) {
        $this->user_id = $user_id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setFull_name($Full_name) {
        $this->Full_name = $Full_name;
    }

    function setCreateTime($createTime) {
        $this->createTime = $createTime;
    }

    function setAccountType($accountType) {
        $this->accountType = $accountType;
    }

    function setAccountStatus($accountStatus) {
        $this->accountStatus = $accountStatus;
    }

    public function login($username, $password) {
        //$this->connectToDB();
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $pwd=md5($password);
        $sql = "Select u.* , s.status_name , acct.type_name  from users u"
                . " join status s ON u.s_id = s.s_id  "
                . " JOIN user_type acct on u.type_id= acct.type_id "
                . " where username= ? and password= ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ss", $username, $pwd);
            $stmt->execute();
            //$ct= $stmt->rowCount();
            //echo $ct;
            $result = mysqli_stmt_get_result($stmt);
            //$stmt->store_result();

            while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                foreach ($row as $cname => $cvalue) {
                    //print "$cname: $cvalue\t";

                    $this->setId($row[0]); 
                    $this->setFull_name($row[1]);
                     $this->setUsername($row[2]);
                    $this->setCreateTime($row[7]);
                    $tempaccountType = new usersType($row[5], $row[9]);
                    $this->setAccountType($tempaccountType);
                    $tempaccountStatus = new status($row[6], $row[8]);
                    $this->setAccountStatus($tempaccountStatus);
                    $_SESSION['user'] = $this;
                    $stmt->close();
                    return $this;
                }
                //print "\r\n";
            }

            $stmt->close();
            echo '<script>alert("nOT fOUND")</script>';

            //change return value to different results
            return null;
        } else {
            die("Error : Couldn't prepare sqli statement");
        }
        return null;
    }

    public function chechLogin() {
        if (isset($_SESSION['LOGGED IN'])) {
            echo "yes";
            return true;
        } else {
            echo "no";
            return false;
        }
    }

    function logout() {
        session_destroy();
        session_start();
    }

    function forgotPassword() {
        
    }

    function changePassword() {
        
    }

    function searchOrder() {
        
    }

    function listOrders() {
        
    }

    function viewOrder() {
        
    }

    function viewStatus() {
        
    }

    function changeStatus() {
        
    }
}
class Admin implements IAccount{

    private $database;
    private $user_id;
    private $Full_name;
    private $username;
    private $password;
    private $createTime;
    private $accountTypeobj;
    private $accountStatus;
    private $factory;

    public function login($username,$password)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $pwd=md5($password);
        $sql="SELECT `u`.*, `t`.*, `s`.`status_name` FROM `users` AS `u` LEFT JOIN `user_type` AS `t` ON `u`.`type_id` = `t`.`type_id` 
    LEFT JOIN `status` AS `s` ON `u`.`is_active` = `s`.`s_id` WHERE t.type_id=1;";
    $result =  mysqli_query($conn,$sql);
    $f=0;
    if ($result->num_rows > 0) 
    {

        while($row = $result->fetch_assoc()) 
        {
            if ($row["is_deleted"] == 0)
            {
                $usernamef=$row["username"];
                $passwordf=$row["password"];
                if($usernamef==$username && $passwordf == $pwd)
                {
                        $this->user_id=$row["user_id"];
                        $this->Full_name=$row["Full_name"];
                        $this->username=$row["username"];
                        $this->password=$row["password"];
                        $this->createTime=$row["createTime"];
                        $this->accountTypeobj=new usersType($row["type_id"], $row["type_name"]);
                        $this->accountStatus= new status($row["is_active"], $row["status_name"]);
                        //echo "string";
                        return $this;
                       // f=1;

                }
            }

        }
        
      }
      return null;
    }
    public function link_page(&$page_name)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();  
        $sql="SELECT `links`.`page_name`, `links`.`UID` FROM `links` where UID=1;";
        $result =  mysqli_query($conn,$sql) or die(mysqli_error());
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $page_name[]=$row["page_name"];
           }
      }
      return $page_name;
    }
}
class doctor implements IAccount{

    private $database;
    private $user_id;
    private $Full_name;
    private $username;
    private $password;
    private $createTime;
    private $accountTypeobj;
    private $accountStatus;
    private $factory;

     public function login($username,$password)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $pwd=md5($password);
        $sql="SELECT `u`.*, `t`.*, `s`.`status_name` FROM `users` AS `u` LEFT JOIN `user_type` AS `t` ON `u`.`type_id` = `t`.`type_id` 
    LEFT JOIN `status` AS `s` ON `u`.`is_active` = `s`.`s_id` WHERE t.type_id=2;";
    $result =  mysqli_query($conn,$sql);
    $f=0;
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            if ($row["is_deleted"] == 0)
            {
                $usernamef=$row["username"];
                $passwordf=$row["password"];
                if($usernamef==$username && $passwordf == $pwd)
                {
                        $this->user_id=$row["user_id"];
                        $this->Full_name=$row["Full_name"];
                        $this->username=$row["username"];
                        $this->password=$row["password"];
                        $this->createTime=$row["createTime"];
                        $this->accountTypeobj=new usersType($row["type_id"], $row["type_name"]);
                        $this->accountStatus= new status($row["is_active"], $row["status_name"]);
                       
                        return $this;
                   // f=1;
                }
            }
        }
      }
      return null;
    }
    public function link_page(&$page_name)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();  
        $sql="SELECT `links`.`page_name`, `links`.`UID` FROM `links` where UID=2;";
        $result =  mysqli_query($conn,$sql) or die(mysqli_error());
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $page_name[]=$row["page_name"];
           }
      }
      return $page_name;
    }
}
class Analysis implements IAccount{

    private $database;
    private $user_id;
    private $Full_name;
    private $username;
    private $password;
    private $createTime;
    private $accountTypeobj;
    private $accountStatus;
    private $factory;

     public function login($username,$password)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $pwd=md5($password);
        $sql="SELECT `u`.*, `t`.*, `s`.`status_name` FROM `users` AS `u` LEFT JOIN `user_type` AS `t` ON `u`.`type_id` = `t`.`type_id` 
    LEFT JOIN `status` AS `s` ON `u`.`is_active` = `s`.`s_id` WHERE t.type_id=6;";
    $result =  mysqli_query($conn,$sql);
    $f=0;
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            if ($row["is_deleted"] == 0)
            {
                $usernamef=$row["username"];
                $passwordf=$row["password"];
                if($usernamef==$username && $passwordf == $pwd)
                {
                    $this->user_id=$row["user_id"];
                    $this->Full_name=$row["Full_name"];
                    $this->username=$row["username"];
                    $this->password=$row["password"];
                    $this->createTime=$row["createTime"];
                    $this->accountTypeobj=new usersType($row["type_id"], $row["type_name"]);
                    $this->accountStatus= new status($row["is_active"], $row["status_name"]);
                   
                    return $this;
                   // f=1;

                }
            }
        }
      }
      return null;
    }
    public function link_page(&$page_name)
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();  
        $sql="SELECT `links`.`page_name`, `links`.`UID` FROM `links` where UID=2;";
        $result =  mysqli_query($conn,$sql) or die(mysqli_error());
      if ($result->num_rows > 0) 
      {
           while($row = $result->fetch_assoc()) 
           {
              $page_name[]=$row["page_name"];
           }
      }
      return $page_name;
    }
}

class login_view_data
{
    

    //$user_Typeobj;
    function Get_all_user_type()
    {
        $this->DB=DbConnection::getInstance();
        $conn =$this->DB ->getconnection();
        $sql="SELECT * FROM user_type;";
        $result= mysqli_query($conn,$sql);
        $storeArray = Array();
        while ($row = mysqli_fetch_array($result)) {
         $storeArray[] =  $row['type_name'];  
        }
        return $storeArray;

    }
}

/*$obj=new login_view_data();
$r=$obj->Get_all_user_type();*/
//echo $r[0];
/*print_r ($r);*/
/*$adobj=new doctor();
$adobj->login("Andrew","123");
print_r ($adobj);*/
/*$account =new Account();
$account->login('mario11','123456');
$account->chechLogin();*/