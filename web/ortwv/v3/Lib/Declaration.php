<?php


######################################################
#
#		Variable Declaration Start
#
#######################################################


	$Administration_Home="http://localhost/P";
	$Cook_Name = "OnroadCook";
	$Title = "OnroadTrack";
	$Site_Heading = "Welcome to OnroadTrack";
	$Footer_Link = "http://localhost/GPS/OnroadAdmin";
	$Website_Name = "OnroadTrack";
	$Tmp_Upload = "Tmp_Upload";
	$Img_Big_Prefix = "big_";
	$Img_Thumb_Prefix = "thumb_";
	$Logo_Name = "logo.jpg";
	//$Base_Path = "";
	$Base_Path = "";
	$DIST_CORRECTION =  "0.11";
	$DEFAULT_DISTANCE_UNIT = "Miles";

######################################################
#
#		User Type
#
#######################################################


	$Mysql_Query = "select * from USER_TYPE";
	$Mysql_Query_Result = mysql_query($Mysql_Query) or die(mysql_error());
	$Mysql_Record_Count = mysql_num_rows($Mysql_Query_Result);
	if($Mysql_Record_Count>=1){
		while($Fetch_Result = mysql_fetch_array($Mysql_Query_Result)){
			$User_Type_ID_Array[$Fetch_Result['User_Type_ID']] = $Fetch_Result['User_Type_ID'];
			$User_Type_Array[$Fetch_Result['User_Type_ID']] = $Fetch_Result['User_Type'];
		}
	}



?>
