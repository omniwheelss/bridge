<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Table_Name = "USER_MASTER";
	// After submit
	$Submit_Pos =count($Form_Fields) - 1;
	if(isset($_REQUEST['uname'])){
		$Username = $_REQUEST['uname'];
		$Password = $_REQUEST['upass'];
		$Login_Sql = "select * from $Table_Name where Username = '$Username' and Password = '$Password'";
		$Login_Run = mysql_query($Login_Sql) or die(mysql_error());
		$Login_Count = mysql_num_rows($Login_Run); 
		if($Login_Count == 1){
		
			$Login_Result=mysql_fetch_array($Login_Run);
			if($Login_Result['User_Type_ID'] == '3' ||  $Login_Result['User_Type_ID'] == '4'){
				$Random = rand(0,99999);
				$Cook_Variable = $Login_Result['Username']."|".$Login_Result['Account_ID']."|".$Login_Result['User_Type_ID'];
				setcookie("$Cook_Name", "$Cook_Variable", time()+86400);
				echo $war_msg = "Login-Success";	
			}
			else{
				echo $war_msg = "Oops! This login window 	only for Customers";	
			}	
		}
		else{
			echo $war_msg = "Oops! Username or Password wrong";
		}
	}


?>