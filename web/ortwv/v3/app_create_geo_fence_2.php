<?include("auth.php"); ?>
<?include("default.css"); ?>
<?include("include.php"); ?>
<?include_once("bg.php"); ?>
<?include("text.php");?>
<?
$Name=$_REQUEST["Name"]; if (strlen($Name)<=0){$error=1;}
$Name=preg_replace("/[^a-zA-Z0-9\s]/", "", $Name);
// Set the Radius to Account Default
$Radius=$GEOFENCE_RADIUS;
$Enable_Alerts=$_REQUEST["Enable_Alerts"];

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
<h1><? echo $header11;?></h1>

<?
	if ($error==0) {
		$sql="select * from GEO_FENCE where Name='$Name' and Account_ID='$Account_ID'";
		$result = mysql_query($sql);
		$recordcount = mysql_num_rows($result);
		if ($recordcount==1){
			echo "<br><br><h2>$text15</h2><br><br>";
		} else {					
			$sql="insert into GEO_FENCE (Account_ID,Name,Latitude,Longitude,Radius) values ('$Account_ID','$Name','$Latitude','$Longitude','$Radius')";
			mysql_query($sql);
			
			echo "<br><br><h2>$text16</h2><br><br>";
			log_activity($Account_ID,$Username,"Geo fence created as $Name for Lat:$Latitude Long:$Longitude with Radius:$Radius");
			
			if ($Enable_Alerts=="yes"){
				$sql="insert into GEO_FENCE_USER_ALERTS values ('$Username','$Name','$Account_ID')";
				$result = mysql_query($sql);
				log_activity($Account_ID,$Username,"Alerts for Geo fence $Name have been enabled");
			}
		}
	} 
	if ($error>0) {
		echo "<br><br><h2>$text17</h2><br><br>";
	}

if ($_REQUEST["Close"]=="1"){
	?>
	<h2><? echo $text12;?></h2>
	<script lanuguage="javascript">
		setTimeout('window.close()',5000);
	</script>
	<?
}else{	
	$url1="google_create_geo_fence_1.php";
	$url2="google_geo_fence_location_map.php";
	echo "<a href=$url1><h4><b>$text18</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=$url2>$manage_button_2</a></h4>";
}
?>
