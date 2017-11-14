<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 
 $IMEI = $_REQUEST['c1']; 
?>
<?php
	if(empty($_COOKIE[$Cook_Name])){
		header("Location: index.php");
		exit;
	}
?>

<?php 
	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];
?>

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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Welcome to the Onroadtrack</title>
  <link rel="stylesheet" href="./css/modal.css" type="text/css" />
  <script type="text/javascript" src="./js/mootools.js"></script>
  <script type="text/javascript" src="./js/caption.js"></script>
  <script type="text/javascript" src="./js/modal.js"></script>

    <script type="text/javascript" src="js/jscript.js"></script>
    <script type="text/javascript" src="js/domtab.js"></script>
  
  <script type="text/javascript">

		window.addEvent('domready', function() {

			SqueezeBox.initialize({});

			$$('a.login').each(function(el) {
				el.addEvent('click', function(e) {
					new Event(e).stop();
					SqueezeBox.fromElement(el);
				});
			});
		});
  </script>
    <link rel="stylesheet" href="./css/prettyPhoto.css" type="text/css" media="screen,projection" />
	<link rel="stylesheet" href="./css/constant.css" type="text/css" />
	<link rel="stylesheet" href="./css/template.css" type="text/css" />
	<link rel="stylesheet" href="./css/products.css" type="text/css" />    
	<link rel="stylesheet" href="./css/style.css" type="text/css" />    
	<link rel="stylesheet" type="text/css" href="css/domtab.css" />
    
    <script type="text/javascript" src="./js/jquery.equalheights.js"></script>
	<script type="text/javascript" src="./js/jquery.autocolumnlist.js"></script>
	<script type="text/javascript" src="./js/jqtransform.js"></script>
	<script type="text/javascript" src="./js/jquery.js"></script>

</head>
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

<body id="body" class="first">
<center>
<div id="all">
	<div class="main">
		<div id="header">
			<div class="moduletable_LoginForm">
				<p><a href="logout.php?action=do" style="padding-left:10px; color:#ffffff; text-decoration:none; font-weight:bold">Sign out</a></p>
			</div>
			<div class="moduletable_support" style="width:350px"><p><!--<span>24/7 Sales & Support</span>(044) 456-78901</p>--></div>
				<!-- <div id="cart">
					<div class="moduletable">
                    	<h3>Shopping Cart</h3>
							<div class="vmCartModule">Now in your cart <a href="http://livedemo00.template-help.com/virtuemart_37786/index.php?page=shop.cart&amp;option=com_virtuemart">0 items</a></div>
					</div>
				</div>-->

				<div id="search">
					<div class="moduletable">
					<form action="index.php" method="post">
						<div class="search">
                            <input name="searchword" id="mod_search_searchword" maxlength="80" alt="Search" class="inputbox" type="text" size="80" value=""  onblur="if(this.value=='') this.value='';" onfocus="if(this.value=='') this.value='';" /><input type="submit" value="Search" class="button" onclick="this.form.searchword.focus();"/>
						</div>
                            <input type="hidden" name="task"   value="search" />
                            <input type="hidden" name="option" value="com_search" />
                            <input type="hidden" name="Itemid" value="1" />
                            </form>
					</div>
				</div>
				<div id="topmenu">
					<div class="moduletable-nav">
						<ul class="menu">
                        	<li class="item29"><a href="#"><span>Home</span></a></li>
                            <li class="item18"><a href="#"><span>About Us</span></a></li>
                            <li class="item30"><a href="#"><span>Services</span></a></li>
                            <li class="item53"><a href="#"><span>FeedBack</span></a></li>
                            <li class="item54"><a href="#"><span>Contacts</span></a></li>
                        </ul>
					</div>
				</div>
				
                <div id="logo">
					<img src="images/onroadtrack.png" style="border:solid 0px red; margin:-30px 0 0 -30px"  height="100px;" />
				</div>
		</div>	
        
        
        <div class="moduletable-categories">
        <script type="text/javascript" src="./js/ddsmoothmenu.js"></script>
		<script type="text/javascript" src="./js/jquery.js"></script>
	        <div class='ddsmoothmenu' id='smoothmenu1'>
    		    <div id="relative_div" style="position:relative;z-index:0"></div>
			        <ul class="level1">
				        <li class="level1 item1 parent">
                        	<a class="level1 item1  parent" href="#" target="_self" title="MAP">
                            	<span>INFO FOR All VEHICLE</span>
						        <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                            </a>
                            <ul class="level2">
                                <li class="level2 item1 parent">
                                    <a class="level2 item1  parent" href="#" target="_self" title="MAP">
                                        <span>MAP</span>
                                        <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                                    </a>
                                    <ul class="level3">
                                        <li class="level3 item1">
                                            <a class="level3 item1 " href="channel_all1.php" target="_self" title="Last Known Location" >
                                                <span>Last Known Location</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="Last Known Location" title="Last Known Location" src="images/last-known-location.png" width="128" height="128" /></span>
                                            </a>
                                        </li>
                                    </ul>    
                                    <ul class="level3">
											<br />	                                        
                                            <a class="level2 item1  parent" href="#" target="_self" title="MAP">
                                                <span>POI</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                                            </a>
                                            <ul class="level3">
                                                <li class="level3 item1">
                                                    <a class="level3 item1 " href="channel_all3.php" target="_self" title="Last Known Location" >
                                                        <span>Create POI</span>
                                                        <span class="menu_img_span"><img class="menu_img" alt="Last Known Location" title="Last Known Location" src="images/last-known-location.png" width="128" height="128" /></span>
                                                    </a>
                                                </li>
                                            </ul>    
                                            <ul class="level3">
                                                <li class="level3 item1">
                                                    <a class="level3 item1 " href="channel_all2.php" target="_self" title="Last Known Location" >
                                                        <span>User Marked POI</span>
                                                        <span class="menu_img_span"><img class="menu_img" alt="Last Known Location" title="Last Known Location" src="images/last-known-location.png" width="128" height="128" /></span>
                                                    </a>
                                                </li>
                                            </ul>    
                                        </li>
                                        
											<br />	                                        
                                            <a class="level2 item1  parent" href="#" target="_self" title="MAP">
                                                <span>REPORTS</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                                            </a>
                                            <ul class="level3">
                                                <li class="level3 item1">
                                                    <a class="level3 item1 " href="channel_all4.php" target="_self" title="Last Known Location" >
                                                        <span>POI Summary</span>
                                                        <span class="menu_img_span"><img class="menu_img" alt="Last Known Location" title="Last Known Location" src="images/last-known-location.png" width="128" height="128" /></span>
                                                    </a>
                                                </li>
                                            </ul>    
                                        </li>


                                    </ul>    
						        </li>
		                    </ul>    
				        </li>

				        <li class="level1 item1 parent">
                        	<a class="level1 item1  parent" href="#" target="_self" title="MAP">
                            	<span>MAP</span>
						        <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                            </a>
                            <ul class="level2" style="border:solid 1px red;">
                                <li class="level2 item1 parent">
                                    <a class="level2 item1  parent" href="#" target="_self" title="MAP">
                                        <span>MAP</span>
                                        <span class="menu_img_span"><img class="menu_img" alt="MAP" title="MAP" src="#" /></span>
                                    </a>
                                    <ul class="level3">
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel1.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="Last Known Location" >
                                                <span>Last Known Location</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="Last Known Location" title="Last Known Location" src="images/last-known-location.png" width="128" height="128" /></span>
                                            </a>
                                        </li>
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel2.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="History Map" >
                                                <span>History Map</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="History Map" title="History Map" src="h#" /></span>
                                            </a>
                                        </li>
                                    </ul>    
						        </li>
		                    </ul>    
				        </li>
				        <li class="level1 item1 parent">
                        	<a class="level1 item1  parent" href="#" target="_self" title="Domains" >
                            	<span>REPORTS</span>
						        <span class="menu_img_span"><img class="menu_img" alt="REPORTS" title="REPORTS" src="#" /></span>
                            </a>
                            <ul class="level2">
                                <li class="level2 item1 parent">
                                    <a class="level2 item1  parent" href="#" target="_self" title="REPORTS" >
                                        <span>REPORTS</span>
                                        <span class="menu_img_span"><img class="menu_img" alt="Reports" title="Reports" src="#" /></span>
                                    </a>
                                    <ul class="level3">
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel3.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="History Location" >
                                                <span>History Location</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="History Location" title="History Location" src="#" /></span>
                                            </a>
                                        </li>
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel4.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="IDLE Report" >
                                                <span>IDLE Report</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="IDLE Report" title="IDLE Report" src="#" /></span>
                                            </a>
                                        </li>
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel5.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="Stoppage History" >
                                                <span>Stoppage History</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="Stoppage History" title="Stoppage History" src="#" /></span>
                                            </a>
                                        </li>
                                        <li class="level3 item1">
                                        	<?php
												if(!empty($_SERVER['QUERY_STRING'])){
													$Url = "channel6.php?c1=".$IMEI."";
												}
												else{
													$Url = "javascript:alert('Please select Vehicle')";
												}
											?>
                                            <a class="level3 item1 " href="<?=$Url?>" target="_self" title="POI History" >
                                                <span>POI History</span>
                                                <span class="menu_img_span"><img class="menu_img" alt="POI History" title="POI History" src="#" /></span>
                                            </a>
                                        </li>
                                    </ul>    
						        </li>
		                    </ul>    
				        </li>
                    </ul>    <li><span style="float:right; margin:7px 100px 0 0; color:#FFFFFF">Welcome <?=ucfirst($Cook_Username)?></span></li>
				</div>		
			</div>
            
            
            <div id="content">
            
           <!-- ------------------------------------- --> 
           <?php
			// Include header File
			include_once("vehicle_list.php");
			?>

                <div class"wrapper" style="border:solid 0px red; float:left; width:760px">
