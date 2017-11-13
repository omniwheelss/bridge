<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];
?>
	
<?php
	if(isset($_REQUEST["Point"])){
	
		$Point=$_REQUEST["Point"];
		if (strlen($Point)<=0){
			$Latitude=$_REQUEST["Latitude"];if (strlen($Latitude)<=0){$error=3;}
			$Longitude=$_REQUEST["Longitude"];if (strlen($Longitude)<=0){$error=4;}
			//Valid values for Latitude range from -90 to 90
			//Valid values for Longitude range from -180to 180
			if ($Latitude<0){$check_lat=substr($Latitude,1);}else{$check_lat=$Latitude;}
			if ($Longitude<0){$check_long=substr($Longitude,1);}else{$check_long=$Longitude;}
			
			if ($check_lat>90 || $check_long>180){$error=5;}	
		}
		if (strlen($Point)>0){
			$Latitude=substr($Point,1,strpos($Point,",")-1);
			$Longitude=substr($Point,strpos($Point,",")+1);
			$Longitude=substr($Longitude,1,strlen($Longitude)-2);
		}

?>

<?
		$sql="select * from GEO_FENCE where Name='".$_REQUEST['POI_Name']."' and Account_ID='$Cook_Account_ID'";
		$result = mysql_query($sql);
		$recordcount = mysql_num_rows($result);
		if ($recordcount==1){
			echo "Same POI created by you already";
		}
		else {					
			$POI_Sql ="insert into GEO_FENCE (Account_ID,Name,Latitude,Longitude) values ('$Cook_Account_ID','".$_REQUEST['POI_Name']."','$Latitude','$Longitude')";
			$POI_Result = mysql_query($POI_Sql);
			if ($POI_Result){
				echo "Thanks for submitting the Point of Interest values";
			}
			
/*			if ($Enable_Alerts=="yes"){
				$sql="insert into GEO_FENCE_USER_ALERTS values ('$Username','$Name','$Account_ID')";
				$result = mysql_query($sql);
				log_activity($Account_ID,$Username,"Alerts for Geo fence $Name have been enabled");
			}
*/		}

	}
?>
