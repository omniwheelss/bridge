<?php
	// Include header File
	include_once("header1.php");
	session_start();
?>
 <?php
	// Select logged user information
	$Setting_Sql = "select * from USER_MASTER where Account_ID = '$Cook_Account_ID'";
	$Setting_Run = mysql_query($Setting_Sql) or die(mysql_error());
	$Setting_Count = mysql_num_rows($Setting_Run); 
	if($Setting_Count == 1){
		$Setting_Result=mysql_fetch_array($Setting_Run);
		$E_Mail = $Setting_Result['E_Mail'];
	}
?>

   <!-- Content Middle -->
    <div class="con-mid">

	<div class="space-15"></div>
    <div class="login-head">Change Password Assistance</div>
	<div class="space-15"></div>
	<div class="space-15"></div>
	<div class="space-15"></div>

		<!-- Forget Password Div --> 
        	<div id="Change_Pass_Div">
 
		<p class="para1">Please enter your old password</p>
                <div class="field_col">	
                    <input type="password" name="Old_Pass" id="Old_Pass" class="forget-txtbox" /> <div class="field_desc_txt">(Old Password)</div>
                </div>
                <div class="field_col">	
                    <div id="Old_Passv" class="error_text3"></div>
                </div>
                <div class="field_col">	
                    <input type="password" name="Pass" id="Pass" class="forget-txtbox" /> <div class="field_desc_txt">(New Password)</div>
                </div>
                <div class="field_col">	
                    <div id="Passv" class="error_text3"></div>
                </div>
                <div class="field_col">	
                    <input type="button" value="Change Password" class="change-submit1" onClick="Ajax_Func_Change_Pass('Old_Pass,Pass','change-password-ajax.php','login_ajax_img','Output_Div')" /> <img src="images/ajax-loading.gif" width="20" height="20" style="float:left; padding:3px 0 0 5px;" class="dnone" id="login_ajax_img" />
                </div>
             </div>   
            
            <div id="Output_Div" class="Change_Email_txt"></div>
            <div class="space-15"></div>
            <div class="space-15"></div>
	        <div class="group"></div>
      

    
    
    </div>
    
    
	<div class="space-15"></div>
	<div class="space-15"></div>


<?php
	// Include footer File
	include_once("footer.php");
?>
