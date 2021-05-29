<?php

class users_view
{
    public $user_id;
    public $username;
    public $Full_name;
	function get_all_user(&$user_id,&$Full_name,&$username,&$type_id,&$is_active,&$createTime)
	{
		 $table= "
         <link rel=\"stylesheet\" type=\"text/css\" href=\"../../../assets/css/table.css\">
          <div class=\"wrapper\">

         <h1>List for All Users in the System</h1>
         <table>
    	<th> id</th> <th> Name</th> <th> username</th> <th> type_id</th><th> is_active</th><th> createTime</th><th>Delete</th><th> Edit</th>"; 
    	for ($i=0;$i<count($user_id);$i++)
    	{
    		//$x=md5($user_id[$i]);
    	   $table.= "<tr>
    			 <td>"
    			 .$user_id[$i]."</td>
    			 <td>"
    			 . $Full_name[$i].
    			 "</td>
    			 <td>"
    			  .$username[$i].
    			  "<td>"
    			   .$type_id[$i].
    			    "</td>
    			    <td>" 
    			    .$is_active[$i]. 
    			     "</td>
    			     <td>" .$createTime[$i].
    			     "</td>
    			      </td>
    			     <td>  <a href=\"../control/view_users.php?user_id=".$user_id[$i]."\"> <img src=\"../../../assets/img/bin.png\"/></a>
    			     </td>
                     <td>
                     <a href=\"../view/view_one_user.php?user_id2=".$user_id[$i]."\">edit</a>
                     </td>
    			     </tr>
                     </div>"
                     ;
       }
    	 $table.="<table>";
    	 echo $table;
	}
    function get_one_user(&$user_id,&$Full_name,&$username,&$type_id,&$is_active,&$createTime)
    {
        $html="";

    }


}