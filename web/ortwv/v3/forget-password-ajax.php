<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Table_Name = "USER_MASTER";
	// After submit
	$Submit_Pos =count($Form_Fields) - 1;
	if(isset($_REQUEST['Email'])){
		$Email = $_REQUEST['Email'];
		$Forget_Password_Sql = "select * from $Table_Name where Email = '$Email'";
		$Forget_Password_Run = mysql_query($Forget_Password_Sql) or die(mysql_error());
		$Forget_Password_Count = mysql_num_rows($Forget_Password_Run); 
		if($Forget_Password_Count == 1){
		
			$Forget_Password_Result=mysql_fetch_array($Forget_Password_Run);
			if($Forget_Password_Result['User_Type_ID'] == '3' ||  $Forget_Password_Result['User_Type_ID'] == '4'){
				echo $war_msg = "Login-Success";	
			}
			else{
				echo $war_msg = "Oops! This login window only for Customers";	
			}	
		}
		else{
			echo $war_msg = "Oops! Username or Password wrong";
		}
	}


?>