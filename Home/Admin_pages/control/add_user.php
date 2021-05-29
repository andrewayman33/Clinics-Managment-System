<?php

include_once '../Model/add_user.php';
	
			 
if ($_POST) {

	 //if (isset($_POST['user']) && $_POST['user'] == "u1") {
			 $name=    $_POST['name'];
			 $username=$_POST['username'];
			 $Password=$_POST['Password'];
			 $usertype=$_POST['usertype'];
			 $ctr = 0;
            if (strpos($name, "'") !== FALSE) {
                $ctr = 1;
            }
            if (strpos($username, "'") !== FALSE) {
                $ctr = 1;
            }
            if (strpos($Password, "'") !== FALSE) {
                $ctr = 1;
            }
            if (strpos($usertype, "'") !== FALSE) {
                $ctr = 1;
            }
            if ($ctr==0)
            {
			$u=new users();
			$u->insert_info($name,$username,$Password,$usertype,'1','1');
				//insert_info
			header("Location: ../view/Adduser.html?signup=success");
			//echo '<script>location.href="../view/succ.html";</script>';
			}
			else
			{
				header("Location: ../view/Adduser.html?signup=failed");
				echo '<script>alert("please do not write \' ")</script>';
				
			}
	//}
   }