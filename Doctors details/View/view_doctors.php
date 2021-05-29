<?php
class Doctor_view
{
	function veiw_html($doctors_id,$doctors_name,$dept)
	{


		$html="<html>";
		//$html.="<?php echo $Html;
		$html.="<form action=\"view_doctors.php\" method=\"POST\">;
				<style> table, th, td {border: 1px solid black;}</style>
				<table><tr><th> id</th> <th> Name</th> <th>department</th></tr>";
		        
		// print_r($dept);
		 //print_r($doctors_name);
		//echo "<br><br>";
		// echo $dept[1];
		// echo "<br><br>";
		// echo count($dept);
		// echo "<br><br>";
		// echo count($doctors_id);
		// echo "<br><br>";
		// echo count($doctors_name);
		// echo "<br><br>";
		for ($i=0;$i<count($dept);$i++)
		{
			$html.="<tr><td>". $doctors_id[$i]."</td><td>". $doctors_name[$i]."</td><td>". $dept[$i]."</td></tr>";
		}
		//<!-- <input type="number" name="get_by_Id">
		$html.="</table>";
		$html.="<input type=\"submit\" name=\"GET_BY_ID\" value=\"GET BY ID\">
		</form>
		</html>";
		return $html;
	}
}