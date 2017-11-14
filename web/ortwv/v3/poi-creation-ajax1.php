<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];
?>
	
<?php
	if(isset($_REQUEST["Latitude"])){

		$Latitude = $_REQUEST["Latitude"];
		$Longitude = $_REQUEST["Longitude"];
		$Radius = $_REQUEST["Radius"];

		$sql="select * from GEO_FENCE where Name='".$_REQUEST['POI_Name']."' and Account_ID='$Cook_Account_ID'";
		$result = mysql_query($sql);
		$recordcount = mysql_num_rows($result);
		if ($recordcount==1){
			echo "Same POI created by you already<br />";
		}
		else {					
			$POI_Sql ="insert into GEO_FENCE (Account_ID,Name,Latitude,Longitude,Radius) values ('$Cook_Account_ID','".$_REQUEST['POI_Name']."','$Latitude','$Longitude','$Radius')";
			$POI_Result = mysql_query($POI_Sql);
			if ($POI_Result){
				echo "Thanks for submitting the Point of Interest values<br />";
			}
			
/*			if ($Enable_Alerts=="yes"){
				$sql="insert into GEO_FENCE_USER_ALERTS values ('$Username','$Name','$Account_ID')";
				$result = mysql_query($sql);
				log_activity($Account_ID,$Username,"Alerts for Geo fence $Name have been enabled");
			}
*/		}

	}
?>
