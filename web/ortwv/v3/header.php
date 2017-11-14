<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 
?>

<?php

// User Login Submit

	if(isset($_REQUEST['dologin'])){
		$Username = $_REQUEST['Username'];
		$Password = $_REQUEST['Pass'];
		$Login_Sql = "select * from USER_MASTER where Username = '$Username' and Password = '$Password' and User_Type_ID = '3'";
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
	<script type="text/javascript" src="./scripts/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="./scripts/jscript.js"></script>
	<script type="text/javascript" src="./scripts/jquery.equalheights.js"></script>
	<script type="text/javascript" src="./scripts/jquery.autocolumnlist.js"></script>
	<script type="text/javascript" src="./scripts/jqtransform.js"></script>

	<script type="text/javascript">
	var $j=jQuery.noConflict();
	 $j(document).ready(function() {
        $j(function() {
            $j('ul.level2').autocolumnlist({
                columns: 3
            });
        });
		if($j(".column").length){
		$j(".column").equalHeights()}
		$j(function(){
			 $j('#select-form').jqTransform({imgPath:'./images/'}).css('display', 'block');
		});
	});
	 $j(window).load(function() {
			$j('.tab_container , .Fly-tabs').css('visibility', 'visible');
		});			
	</script>
</head>

<body id="body" class="first">
<center>
<div id="all">
	<div class="main">
		<div id="header">
<!--			<div class="moduletable_LoginForm">
				<p><a href="http://livedemo00.template-help.com/virtuemart_37786/index.php?option=com_user&amp;view=login" class="login" title="Login">Login</a></p>
			</div>-->
			<div class="moduletable_support"><p><!--<span>24/7 Sales & Support</span>(044) 456-78901</p>--></div>
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
                            <li class="item54"><a href="#"><span><a href="sign_in.php" class="login" title="Login" style="color:#000; font-weight:bold">Login</a></span></a></li>
                        </ul>
					</div>
				</div>
				
                <div id="logo">
					<img src="images/onroadtrack.png" style="border:solid 0px red; margin:-30px 0 0 -30px"  height="100px;" />
				</div>
		</div>	
