<?php


######################################################
#
#		Variable Declaration Start
#
#######################################################


	//$Administration_Home="http://110.234.152.165/Fasttrack";
	$Administration_Home="http://localhost/biz/FAdmin";
	$Cook_Name = "OnroadTrackCook";
	$Title = "OnroadTrack - Administration";
	$Site_Heading = "Welcome to OnroadTrack Administration";
	$Footer_Link = "http://localhost";
	$Website_Name = "OnroadTrack";
	$Tmp_Upload = "Tmp_Upload";
	$Img_Big_Prefix = "big_";
	$Img_Thumb_Prefix = "thumb_";
	$Logo_Name = "logo.jpg";


######################################################
#
#		User Type Array
#
#######################################################


		$Mysql_Query = "select * from USER_TYPE";
		$Mysql_Query_Result = mysql_query($Mysql_Query) or die(mysql_error());
		$Mysql_Record_Count = mysql_num_rows($Mysql_Query_Result);
		if($Mysql_Record_Count>=1){
			while($Fetch_Result = mysql_fetch_array($Mysql_Query_Result)){
				$User_Type_Array[$Fetch_Result['User_Type_ID']] = $Fetch_Result['User_Type'];
			}
		}

######################################################
#
#		Admin Account
#
#######################################################


		$Mysql_Query = "select * from USER_MASTER where User_Type_ID = 4 and GPSAdmin = 'Enabled'";
		$Mysql_Query_Result = mysql_query($Mysql_Query) or die(mysql_error());
		$Mysql_Record_Count = mysql_num_rows($Mysql_Query_Result);
		if($Mysql_Record_Count>=1){
			while($Fetch_Result = mysql_fetch_array($Mysql_Query_Result)){
				$Firstname_Admin_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Firstname']." ".$Fetch_Result['Lastname'];
				$Firstname_ByID_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Firstname'];
				$Lastname_Array[$Fetch_Result['Lastname']] = $Fetch_Result['Lastname'];
			}
		}

######################################################
#
#		USER MASTER Table
#
#######################################################


		$Mysql_Query = "select * from USER_MASTER";
		$Mysql_Query_Result = mysql_query($Mysql_Query) or die(mysql_error());
		$Mysql_Record_Count = mysql_num_rows($Mysql_Query_Result);
		if($Mysql_Record_Count>=1){
			while($Fetch_Result = mysql_fetch_array($Mysql_Query_Result)){
				$Firstname_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Firstname'];
				$Lastname_Array[$Fetch_Result['Lastname']] = $Fetch_Result['Lastname'];
				$Firstname_Lastname_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Firstname']." ".$Fetch_Result['Lastname'];
				$Username_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Username'];
				$Password_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Password'];
				$UserTypeID_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['User_Type_ID'];
				$ParentID_Array[$Fetch_Result['Account_ID']] = $Fetch_Result['Parent_ID'];
			}
		}


######################################################
#
#		DEVICE TYPE
#
#######################################################


		$Mysql_Query = "select * from DEVICE_TYPE";
		$Mysql_Query_Result = mysql_query($Mysql_Query) or die(mysql_error());
		$Mysql_Record_Count = mysql_num_rows($Mysql_Query_Result);
		if($Mysql_Record_Count>=1){
			while($Fetch_Result = mysql_fetch_array($Mysql_Query_Result)){
				$Device_Type_Array[$Fetch_Result['Device_Type_ID']] = $Fetch_Result['Device_Type'];
			}
		}

?>