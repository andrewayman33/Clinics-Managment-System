<?php
class view
{

    function  __construct($first,$second,$three,& $html) {

        $this->view_header();
   if ($first==1)
   {

         $this->patients_list();
    }
    if ($second==1)
    {
     $this->User_list();
    }
 if ($three==1)
    {
   // $x.=$obj->User();

    $this->laboratory_view();

    }
  //  return $html;
}
public function view_header()
{

$html='<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="adminpagecss.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <font face="Arial Black">
        <img src="kisspng-church-of-god-inc-west-minot-church-of-god-christi-church-5acf5ae9c28af8.5303976815235386657969.png" alt="logo"
             style="width=110px;height:110px; position:absolute; right:20px; top:7px;" />
        <div class="header">
            <a href="#default" class="logo"><font color="black">ST GEORGE</font><br><font color="grey"> CLINICS SYSTEM.</a>
        </div>
        <div class="btn"style="position:absolute;right:130px; top:20px;"><a href="../../Login/Controller/logoutController.php">logout</a></div>
    </font>
</head>



<body>
    <nav>
        <label for="btn" class="button">
            List
            <span class="fas fa-caret-down"></span>
        </label>
        <input type="checkbox" id="btn">
        <ul class="menu">';

        return $html;
}
public function patients_list()
{
    $html='<li>
        <label for="btn-2" class="first">
            patients
            <span class="fas fa-caret-down"></span>
        </label>
        <input type="checkbox" id="btn-2">
        <ul>


            <li><a href="Addpatient.html">register new patients</a></li>
            <li><a href="../control/view_users.php">search for patient</a></li>
            <li><a href="#">list all patients</a></li>
            <li><a href="../control/view_patient_with_details.php">patient view with appointment details</a></li>
        </ul>
    </li>';
    
    echo $html;
}

public function User_list()
{
        $html='<li>
        <label for="btn-3" class="second">
            Users
            <span class="fas fa-caret-down"></span>
        </label>
        <input type="checkbox" id="btn-3">
        <ul>
            <li><a href="Adduser.html">Add user</a></li>
            <li><a href="../control/view_users.php">List user</a></li>
            <li><a href="../../Doctors details/Control/view_doctors.php">doctor list</a></li>
            <li><a href="Appoint_View.php">search appointments</a></li>
            <li><a href="departmentlist.html">Departmentss list</a></li>
            <li><a href="Adddepartment.html">Add new Department</a></li>


        </ul>
        </li>';
echo $html;
}
public function laboratory_view()
{
           $html='<li>
                <label for="btn-4" class="second">
                    laboratory
                    <span class="fas fa-caret-down"></span>
                </label>
                <input type="checkbox" id="btn-4">
                <ul>
                    <li><a href="#">Add new test</a></li>
                    <li><a href="#">List all tests</a></li>
                </ul>
            </li>

        </ul>
        </nav>';
    echo $html;
}
    


//     <!-- This code used to rotate drop icon(180deg).. -->
//     <script>
//         $('nav .button').click(function () {
//             $('nav .button span').toggleClass("rotate");
//         });
//         $('nav ul li .first').click(function () {
//             $('nav ul li .first span').toggleClass("rotate");
//         });
//         $('nav ul li .second').click(function () {
//             $('nav ul li .second span').toggleClass("rotate");
//         });
//     </script>

// </body>
// </html>
}
//$x="";
//$obj=new view(1,1,1,$x);
//echo $x;
//var_dump($obj);
// $x=$obj->view_header();
// // $x.=$obj->patients_list();
// $x.=$obj->User_list();
// $x.=$obj->laboratory_view();