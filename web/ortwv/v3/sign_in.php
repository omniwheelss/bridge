

	<link rel="stylesheet" href="./css/style.css" type="text/css" />
    	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./scripts/jscript.js"></script>
    <!-- Content Middle -->
    <div class="con-mid">

	<div class="space-15"></div>
    <div class="login-head">Sign in to OnroadTrack</div>
	<div class="space-15"></div>
	<div class="space-15"></div>
		
<!--        <div id="Main_Error_Div"  class="Main_Error_Div_Cls">
		<table border="0" cellpadding="0" cellpadding="0" align="left" width="100%"  class="Error_Bg">
        	<tr>
            	<td class="Login_valid_txt">There were one or more errors in your submission. Please correct the marked fields below.</td>
            </tr>
         </table>
         </div>   
-->
	<div class="space-15"></div>

		<!-- Login Div --> 
		<div id="main" class="signin"> 
 			
            <div class="space-15"></div>
            <div class="Msg_Div">
            <?php
			if(isset($war_msg)){
				echo $war_msg;
			}	
			?>
            </div>
            <div class="space-15"></div>

			<form action="" method="post" name="Login_Form"  onsubmit="return Ajax_Func_Login('Username,Pass','','login_ajax_img','Output_Div')">
			<div class="field_col">	
           		<div id="Usernamev" class="error_text1"></div>
            </div>
			<div class="field_col">	
                <div class="login-head-txt">Username:</div>            
                <input type="text" name="Username" id="Username" class="login-txtbox" tabindex="1" />
            </div>
			<div class="field_col">	
           		<div id="Passv" class="error_text1"></div>
            </div>
			<div class="field_col">	
                <div class="login-head-txt">Password:</div>            
                <input type="password" name="Pass" id="Pass" class="login-txtbox" tabindex="2" /> 
				<a href="forget_password.php" class="forget-txt">Forgot password?</a>
			</div>
			<div class="field_col_sub_but">	
            	<table border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td>
			            	<input type="submit" name="dologin" value="Login" class="login-submit" tabindex="3" />
                         </td>
                         <td>
			                <div id='login_ajax_img' class="dnone"><img src="images/ajax-loading.gif" width="20" height="20" style="padding-left:10px;" /></div>
                         </td>
                    </tr>
                 </table>         	
            </div>
            </form>
	        <div class="group"></div>
      
		</div>

    </div>
