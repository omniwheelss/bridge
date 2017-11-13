<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 
?>
<?php
/*	if(!empty($_COOKIE[$Cook_Name])){
		header("Location: home.php");
		exit;
	}
*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Onroadtrack</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jq1.js"></script>
    <script type="text/javascript" src="js/jscript.js"></script>
</head>

<body>
<?php

// User Login Submit

	if(isset($_REQUEST['dologin'])){
		$Username = $_REQUEST['Username'];
		$Password = $_REQUEST['Pass'];
		$Login_Sql = "select * from USER_MASTER where Username = '$Username' and Password = '$Password'";
		$Login_Run = mysql_query($Login_Sql) or die(mysql_error());
		$Login_Count = mysql_num_rows($Login_Run); 
		if($Login_Count == 1){
		
			$Login_Result=mysql_fetch_array($Login_Run);
			if($Login_Result['User_Type_ID'] == '3' ||  $Login_Result['User_Type_ID'] == '4'){
				$Random = rand(0,99999);
				$Cook_Variable = $Login_Result['Username']."|".$Login_Result['Account_ID']."|".$Login_Result['User_Type_ID'];
				setcookie("$Cook_Name", "$Cook_Variable", time()+86400);
				header("Location: home.php");
				exit;	
			}
			else{
				$war_msg = "Oops! This login window only for Customers";	
			}	
		}
		else{
			$war_msg = "Oops! Username or Password wrong";
		}
	}


?>
<center>
<div class="layout">

    	<!-- Logged Box -->
	<div class="logo"></div>

	<div class="space-10"></div>
    <div class="group"></div>
    <!--  Top menu   -->
    <div class="menu-top">
        <div class="menu-left">&nbsp;</div>
        <div class="menu-mid">
        
        	<div><a href="index.php" class="top-menu-txt">Home</a></div>
        	<div><a href="#" class="top-menu-txt">What is Onroadtrack</a></div>
        	<div><a href="#" class="top-menu-txt">About</a></div>
        	<div><a href="sign_in.php" class="top-menu-txt">Sign In</a></div>
        
        </div>
        <div class="menu-right">&nbsp;</div>
        <div class="group"></div>
    </div>
