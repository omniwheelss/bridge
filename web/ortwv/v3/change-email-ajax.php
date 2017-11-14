<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];

	$Table_Name = "USER_MASTER";
	// After submit
	if(isset($_REQUEST['Email'])){
		$Old_Email = $_REQUEST['Old_Email'];
		$Email = $_REQUEST['Email'];
		$Change_Email_Sql = "update $Table_Name set E_Mail = '$Email' where E_Mail = '$Old_Email' and Account_ID = '$Cook_Account_ID'";
		//$Change_Email_Run = mysql_query($Change_Email_Sql) or die(mysql_error());
		echo $war_msg = "
						<table border='0' cellpadding='3' cellspacing='3'>
							<tr>
								<td align='left'><img src='./images/correct.gif' width='16px' height='16px' align='bottom'></td>
								<td align='left'>Your new Email address was updated sucessfully</td>
							</tr>
						</table>";		
	}


?>