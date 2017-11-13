<?php
	// Include header File
	include_once("header1.php");
?>
<?php
	// Select logged user information
	$Setting_Sql = "select * from USER_MASTER where Account_ID = '$Cook_Account_ID'";
	$Setting_Run = mysql_query($Setting_Sql) or die(mysql_error());
	$Setting_Count = mysql_num_rows($Setting_Run); 
	if($Setting_Count == 1){
		$Setting_Result=mysql_fetch_array($Setting_Run);
		$First_Name = $Setting_Result['Firstname'];
		$Last_Name = $Setting_Result['Lastname'];
		$Date_Stamp = $Setting_Result['Date_Stamp'];
		$E_Mail = $Setting_Result['E_Mail'];
	}
	
	$Vehicle_Sql = "select count(*) from DEVICE_REGISTER where Account_ID = '$Cook_Account_ID'";
	$Vehicle_Run = mysql_query($Vehicle_Sql) or die(mysql_error());
	$Vehicle_Count = mysql_num_rows($Vehicle_Run); 	
?>
    <!-- Content Middle -->
    <div class="con-mid">
    <!-- Content Left -->

	<div class="space-15"></div>

	<!-- Settings Box -->
	<div id="main" class="signin" style="width:700px; height:200px; float:left; margin:0 0 0 10px;">
    
    	<table border="0" cellpadding="0" cellspacing="0" align="left" class="setting-tab" width="700px">
        	<tr>
            	<td width="50%">
                    <table border="0" cellpadding="3" cellspacing="3" align="left">
                        <tr>
                            <td width="100%">
                            	
                                <table border="0" cellpadding="3" cellspacing="3" align="left" class="setting-tab" width="350px">
                                    <tr>
                                        <td width="50px"><img src="images/avatar.jpg" height="40" width="40" title="Edit Picture" /></td>
                                           
                                        <td align="left">
                                            <span class="setting_txt1"><?=ucfirst($First_Name)?> <?=$Last_Name?></span><br />
                                            <span class="setting_txt2">Member since:</span> <span class="setting_txt4"><?=date("F d, Y",strtotime($Date_Stamp))?></span>
                                        </td>
                                    </tr>
                                 </table>           
			                </td>
            			</tr>
                        <tr>
                            <td align="left" width="50%">
                                <table border="0" cellpadding="0" cellspacing="0" align="left" class="setting-tab1" width="350px">
                                    <tr>
                                        <td align="left">
                                            <span class="setting_txt2">PRIMARY EMAIL</span>&nbsp;<a href="change_email_address.php" class="setting_txt3">Change</a><br />
                                            <?=$E_Mail?>
                                        </td>
                                        <td valign="top" align="left">
                                            <span class="setting_txt2">PASSWORD </span>&nbsp;<a href="change_password.php" class="setting_txt3">Change</a><br />
                                        </td>
                                    </tr>
                                </table>                
                            </td>
                        </tr>
                        <tr>
                            <td class="setting_hr">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <table border="0" cellpadding="0" cellspacing="0" align="left" class="setting-tab1" width="350px">
                                    <tr>
                                        <td align="left">
                                            <span class="setting_txt2">Account Type</span>&nbsp;<span class="setting_txt3"><?=$User_Type_Array[$Cook_User_Type_ID]?></span><br />
                                        </td>
                                        <td valign="top" align="left">&nbsp;
                                            
                                        </td>
                                    </tr>
                                </table>                
                            </td> 
                        </tr>
                      </table>
                  </td>
                  <td width="5%" class="setting-mid" align="right">&nbsp;</td>           
                  <td width="45%" valign="top">
                  
                    <table border="0" cellpadding="3" cellspacing="3" align="left">
                        <tr>
                            <td width="100%">
                            	
                                <table border="0" cellpadding="3" cellspacing="3" align="left" class="setting-tab" width="350px">
                                    <tr>
                                        <td align="left">
                                            <span class="setting_txt1">Total Installed Vehicles : <b><?=$Vehicle_Count?></b></span><br />
                                        </td>
                                    </tr>
                                 </table>           
			                </td>
            			</tr>
                        <tr>
                            <td class="setting_hr1">&nbsp;</td>
                        </tr>
                      </table>
                  
                  </td>           
              </tr>        
        </table>
    	
    </div>

    <div id="faq">
        <h3>Frequently asked questions</h3>
        <table border="0" width="190">
        	<tr height="30px;">
            	<td width="7"><img src="images/arrow.jpg" height="7" width="7" class="faq-list" /></td>
                <td align="left"><a href="#" class="setting_txt3">Not Yet Posted</a></td>
            </tr>
        </table>
    </div>
        
    <!-- Content Right -->
        <div class="group"></div>
    </div>
    
    
	<div class="space-15"></div>
	<div class="space-15"></div>

<?php
	// Include footer File
	include_once("footer.php");
?>
