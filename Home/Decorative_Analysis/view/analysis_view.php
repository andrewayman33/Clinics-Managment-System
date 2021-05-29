<?php
class tests_view
{
	function veiw_html(&$patient_name,&$pateint_id,&$main_package_id,&$test1, &$test2,&$total_cost,&$ID,&$timestamp)
	{


		$html="<html>";
		//$html.="<?php echo $Html;
		$html.="<form action=\"view_doctors.php\" method=\"POST\">;
				<style> table, th, td {border: 1px solid black;}</style>
				<table><tr><th> iD</th> <th> patient Name</th> <th>Patient ID</th><th>Main packages</th><th>Test1</th><th>Test2</th><th>total cost</th><th>Time Stamp</th></tr>";
		        
		
		for ($i=0;$i<count($ID);$i++)
		{
			$html.="<tr><td>". $ID[0]."</td><td>". $patient_name[0]."</td><td>". $pateint_id[0]."</td><td>". $main_package_id."</td><td>". $test1[0]."</td><td>". $test2[0]."</td><td>". $total_cost[0]."</td><td>". $timestamp[0]."</td></tr>";
		}
		//<!-- <input type="number" name="get_by_Id">
		$html.="</table>";
		$html.="<input type=\"submit\" name=\"GET_BY_ID\" value=\"GET BY ID\">
		</form>
		</html>";
		return $html;
	}
}