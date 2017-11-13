<?php
	ob_start(); error_reporting(0); 
	include("Lib/Includes.php"); 

?>

<?php
	if(empty($_COOKIE[$Cook_Name])){
		header("Location: index.php");
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Onroadtrack</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jq1.js"></script>
    <script type="text/javascript" src="js/jscript.js"></script>
</head>

<body id="home">

<center>
<div class="layout">

    	<!-- Logged Box -->
	<div class="logo"></div>
    <?php 
		$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
		$Cook_Username = $Cook_Variable[0];
		$Cook_Account_ID = $Cook_Variable[1];
		$Cook_User_Type_ID = $Cook_Variable[2];
		if(!empty($_COOKIE[$Cook_Name])){
	?>
    <div class="flor"><img src="images/down-link.jpg" width="12" height="10" class="logged-name-img" /><span class="logged-name-txt" onmouseover="logged_box_func_show()">Welcome <?=ucfirst($Cook_Username)?></span>


	<!-- Logged box -->
    
    <div id="shareit-box">

        <div id="shareit-header"></div>
            <div id="shareit-body">
                <div class="logged-tab-div">
                    <table border="0" cellpadding="0" cellspacing="0" width="115px;" height="30px;" class="logged_tab">
                        <tr>
                            <td align="left" valign="top"><a href="settings.php" class="logged-name-txt1">Settings</a><img src="images/cross.jpg" width="15" height="15" title="close"  align="right" onclick="logged_box_func_hide()" /></td>
                        </tr>
	                    <tr>
                            <td valign="top"><a href="logout.php?action=do" class="logged-name-txt1">Sign out</a></td>
                        </tr>
                    </table>
                </div>	
            </div>
        </div>
    </div>
	<?php
	}
    ?>
	<div class="space-10"></div>
    <div class="group"></div>
    <!--  Top menu   -->
    <div class="menu-top">
        <div class="menu-left">&nbsp;</div>
        <div class="menu-mid">
        
        	<div><a href="home.php" class="top-menu-txt">Home</a></div>
            <?php
				switch($_SERVER['SCRIPT_NAME']){
					case '/demo/channel1.php':
					$Top_head = "Last Known Location";
					break;
					case '/demo/channel2.php':
					$Top_head = "History Map";
					break;
					case '/demo/channel3.php':
					$Top_head = "History Location Report";
					break;
					case '/demo/channel4.php':
					$Top_head = "IDLE History Report";
					break;
					case '/demo/channel5.php':
					$Top_head = "Stoppage History Report";
					break;
					case '/demo/channel6.php':
					$Top_head = "POI History Report";
					break;
					
					case '/demo/channel_all1.php':
					$Top_head = "Last Known Location for all Vehicles";
					break;
					case '/demo/channel_all2.php':
					$Top_head = "User Marked POI";
					break;
					case '/demo/channel_all3.php':
					$Top_head = "Create POI";
					break;
					case '/demo/channel_all4.php':
					$Top_head = "POI Summary for All Vehicles";
					break;
				}
			?>
        	<div class="topmenu-right"><span class="top-menu-txt1"><?=$Top_head?></span></div>
        </div>
        <div class="menu-right">&nbsp;</div>
        <div class="group"></div>
    </div>
