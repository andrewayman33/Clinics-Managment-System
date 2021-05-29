<?php

include_once ('../View/login.php');
include_once('../Model/Account.php');
include_once '../../Home/Linkspage.php';



$view_login=new login_view();
$veiw=$view_login->login();
echo $veiw;


if ($_POST) {
    //echo("inside controller");
    if (isset($_POST['login']) && $_POST['login'] == "Login") {
       
       $factory_obj=new Factory();
        //echo '"inside login==login")';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Type_ID = $_POST['Svalue'];
        //printf($Type_ID) ;
        $Iuserobj=$factory_obj->login($Type_ID);
        //echo gettype($Iuserobj) . "<br>";
        //print_r($Iuserobj);
        // printf($Iuserobj);
        //echo $username;
        //echo $password;
        $veiw2= $Iuserobj->login($username,$password);
       // echo gettype($veiw2) . "<br>";
       //print_r($veiw2);
        //print_r($Iuserobj);
        if (isset($veiw2))
        {
             $Iuserobj->link_page($p);
             $enter;
            if ($Type_ID ==1)
            {

                echo ' <script>location.href="../../Home/AdminHomePage.php";</script>';
                // header("Location: start.php",$x); 
               //  echo '<script>location.href="start.php"; $x</script>';
                //echo ;
            }
            if ($Type_ID ==2)
            {

                echo ' <script>location.href="../../Home/DoctorHomePage.php";</script>';
                // header("Location: start.php",$x); 
               //  echo '<script>location.href="start.php"; $x</script>';
                //echo ;
            }
            if ($Type_ID ==6)
            {

                echo ' <script>location.href="../../Home/AnalysisHomePage.php";</script>';
                // header("Location: start.php",$x); 
               //  echo '<script>location.href="start.php"; $x</script>';
                //echo ;
            }

        }
        else
        {

        }

        //print_r($p);

       // echo "<script>location.href=\"$p[0]\";</script>";
       

        //echo $veiw;
        //echo "hi";
        //echo '<script>location.href="../../admin/Add_user/view/adminpage.html";</script>';
    }
    //     try {
    //         session_start();
            
    //         $data = new Account();
    //         $ctr = 0;
    //         if (strpos($password, "'") !== FALSE) {
    //             $ctr = 1;
    //         }
    //         if ($ctr == 0) {

    //             $userData = $data->login($username, $password);
    //             if ($userData != null) 
    //             {

    //                 if ($userData->getAccountType()->getType() == "Administrator") 
    //                 {
    //                     if ($userData->getAccountStatus()->getType() == "Active")
    //                      {
    //                         $_SESSION['LOGGED IN'] = $userData;
    //                         echo '<script>location.href="../../admin/Add_user/view/adminpage.html";</script>';
    //                     }
    //                     else if ($userData->getAccountStatus()->getType() == "Banned") 
    //                     {
    //                         echo '<script>alert("Your Account is Banned ,Please Contact Website Admiin")</script>';
	// 	 	                echo '<script>location.href="../../login.php";</script>';
    //                     } 
    //                     else if ($userData->getAccountStatus()->getType() == "Disabled") 
    //                     {
    //                         echo '<script>alert("Your Account is Disabled ,Please Contact Website Admiin")</script>';
    //                         echo '<script>location.href="../../login.php";</script>';
    //                     }
    //                 } 
    //                 else if ($userData->getAccountType()->getType() == "User") 
    //                 {
    //                     if ($userData->getAccountStatus()->getType() == "Active")
    //                      {
    //                         echo '<script>alert("Account Active")</script>';
    //                         $_SESSION['LOGGED IN'] = $userData;
    //                         echo '<script>location.href="../View/user.php";</script>';
    //                     }
    //                     else if ($userData->getAccountStatus()->getType() == "Banned")
    //                      {
    //                         echo '<script>alert("Your Account is Banned ,Please Contact Website Admiin")</script>';
	// 		                echo '<script>location.href="../../login.php";</script>';
    //                     } 
    //                     else if ($userData->getAccountStatus()->getType() == "Disabled") 
    //                     {
    //                         echo '<script>alert("Your Account is Disabled ,Please Contact Website Admiin")</script>';
	// 		                echo '<script>location.href="../../login.php";</script>';
    //                     }
    //                 }
    //             } else {
    //                 echo '<script>alert("Invalid Login ,Please Try Again")</script>';
    //                 echo '<script>location.href="../../login.php";</script>';
    //             }
    //         } else {
    //             echo '<script>alert("Please DoNot Enter \' ")</script>';
    //             echo '<script>location.href="../../login.php";</script>';
    //         }
    //     } catch (Exception $ex) {
    //         $ms = $ex->getMessage();
    //         echo "<script>alert('$ms')</script>";
    //     }
    // }
}

// if ($_POST) {
//     //echo("inside controller");
//     if (isset($_POST['login']) && $_POST['login'] == "Login") {
       
//         //echo '"inside login==login")';
//         $username = $_POST['username'];
//         $password = $_POST['password'];
//         try {
//             session_start();
            
//             $data = new Account();
//             $ctr = 0;
//             if (strpos($password, "'") !== FALSE) {
//                 $ctr = 1;
//             }
//             if ($ctr == 0) {

//                 $userData = $data->login($username, $password);
//                 if ($userData != null) 
//                 {

//                     if ($userData->getAccountType()->getType() == "Administrator") 
//                     {
//                         if ($userData->getAccountStatus()->getType() == "Active")
//                          {
//                             $_SESSION['LOGGED IN'] = $userData;
//                             echo '<script>location.href="../../admin/Add_user/view/adminpage.html";</script>';
//                         }
//                         else if ($userData->getAccountStatus()->getType() == "Banned") 
//                         {
//                             echo '<script>alert("Your Account is Banned ,Please Contact Website Admiin")</script>';
// 		 	                echo '<script>location.href="../../login.php";</script>';
//                         } 
//                         else if ($userData->getAccountStatus()->getType() == "Disabled") 
//                         {
//                             echo '<script>alert("Your Account is Disabled ,Please Contact Website Admiin")</script>';
//                             echo '<script>location.href="../../login.php";</script>';
//                         }
//                     } 
//                     else if ($userData->getAccountType()->getType() == "User") 
//                     {
//                         if ($userData->getAccountStatus()->getType() == "Active")
//                          {
//                             echo '<script>alert("Account Active")</script>';
//                             $_SESSION['LOGGED IN'] = $userData;
//                             echo '<script>location.href="../View/user.php";</script>';
//                         }
//                         else if ($userData->getAccountStatus()->getType() == "Banned")
//                          {
//                             echo '<script>alert("Your Account is Banned ,Please Contact Website Admiin")</script>';
// 			                echo '<script>location.href="../../login.php";</script>';
//                         } 
//                         else if ($userData->getAccountStatus()->getType() == "Disabled") 
//                         {
//                             echo '<script>alert("Your Account is Disabled ,Please Contact Website Admiin")</script>';
// 			                echo '<script>location.href="../../login.php";</script>';
//                         }
//                     }
//                 } else {
//                     echo '<script>alert("Invalid Login ,Please Try Again")</script>';
//                     echo '<script>location.href="../../login.php";</script>';
//                 }
//             } else {
//                 echo '<script>alert("Please DoNot Enter \' ")</script>';
//                 echo '<script>location.href="../../login.php";</script>';
//             }
//         } catch (Exception $ex) {
//             $ms = $ex->getMessage();
//             echo "<script>alert('$ms')</script>";
//         }
//     }
// }