<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];

	$Table_Name = "USER_MASTER";
	// After submit
	if(isset($_REQUEST['Pass'])){
	
		$Old_Pass = $_REQUEST['Old_Pass'];
		$Pass = $_REQUEST['Pass'];
		
		$Change_Password_Sql = "select * from $Table_Name where Password = '$Old_Pass' and  Account_ID = '$Cook_Account_ID'";
		$Change_Password_Run = mysql_query($Change_Password_Sql) or die(mysql_error());
		$Change_Password_Count = mysql_num_rows($Change_Password_Run); 
		if($Change_Password_Count == 1){
		if($Old_Pass != 'demo'){
			$Change_Pass_Sql = "update $Table_Name set Password = '$Pass' where Account_ID = '$Cook_Account_ID'";
			$Change_Pass_Run = mysql_query($Change_Pass_Sql) or die(mysql_error());
		}	
		echo $war_msg = "
						<table border='0' cellpadding='3' cellspacing='3'>
							<tr>
								<td align='left'><img src='./images/correct.gif' width='16px' height='16px' align='bottom'></td>
								<td align='left'>Your new Password was updated successfully</td>
							</tr>
						</table>";		

		}
		else{
		echo $war_msg = "
						<table border='0' cellpadding='3' cellspacing='3'>
							<tr>
								<td align='left'><img src='./images/wrong1.jpg' width='16px' height='16px' align='bottom'></td>
								<td align='left'>Your old password was wrong, Please try again</td>
							</tr>
						</table>";		
		}


		
	}


?>