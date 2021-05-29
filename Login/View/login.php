<?php ;
include_once '../Model/Account.php';

class login_view{

private $loginviewobj;

	function login()
	{
		$Html="<!DOCTYPE html>";
		$Html.="<html>";
		$Html.="<head>";
		$Html.="    <link rel=\"stylesheet\" type=\"text/css\" href=\"../../CSS/logincss.css\">";
		$Html.="</head>";
		$Html.="<body>";
		$Html.="    <font face=\"Arial Black\">";
		$Html.="        <img src=\"../../Images/Logo.png\" alt=\"logo\" style=\"width=110px;height:110px; position:absolute; right:20px; top:7px;\" />";
		$Html.="        <div class=\"header\">";
		$Html.="            <a href=\"#default\" class=\"logo\"><font color=\"black\">ST GEORGE</font><br><font color=\"grey\"> CLINICS PLUS</a>";
		$Html.="        </div>";
		$Html.="    </font>";
		$Html.="    <div>";
		$Html.="        <div style=\"padding-left:20px\">";
		$Html.="        </div>";

		$Html.="        <br><br><br><br><br><br><br>";

		$Html.="        <form action=\"../Controller/LoginController.php\" method=\"post\">";
		$Html.="            <div class=\"container\">";
		$Html.="                <h1 style=\"color:white\">LOGIN</h1>";
		$Html.="                <hr>";
		$Html.="                <label for=\"ID\" style=\"color:white\"><b>user ID</b></label>";
		$Html.="                <input type=\"text\" placeholder=\"Enter ID\" name=\"username\" required>";
		$Html.="                <label for=\"psw\" style=\"color:white\"><b>Password</b></label>";
		$Html.="                <input type=\"password\" placeholder=\"Enter Password\" name=\"password\" required >";
		$this->loginviewobj = new login_view_data();
		$row=$this->loginviewobj->Get_all_user_type();
		$Html.="				<select name=\"Svalue\"><option>";
		               			 for ($i=0;$i<count($row);$i++)
                				{
                					$m=$i+1;

		$Html.= "<option value=\" $m\">". $row[$i];"</option>";

								}
		$Html.="			</select>";

		$Html.="                <input type=\"submit\" value=\"Login\" class=\"registerbtn\" name=\"login\">";
		// $Html.="                <!-- <input type="submit" value="Login" name="login" class="registerbtn">LOGIN</button> -->";



		$Html.="            </div>";

		$Html.="            <div class=\"container signin\">";
		$Html.="                <p><font color=\"#fff\">Dont't have user ID? <a href=\"signup.php\">Add user ID</a>.</p>";
		$Html.="            </div>";
		$Html.="        </form>";

		;$Html.="        <br><br><br><br><br><br><br><br><br>";
		$Html.="        <footer>";
		$Html.="            <p>© 2020 ST GEORGE CHURCH , ALL RIGHTS RESERVED.</p>";
		$Html.="        </footer>";
		$Html.="    </div>";
		$Html.="</body>";
		$Html.="</html>";
		return $Html;
	}
}