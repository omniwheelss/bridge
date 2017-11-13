<?php
	ob_start(); error_reporting(0); 
	include("Lib/Includes.php"); 

	$Table_Name = "USER_MASTER";
	if(empty($_COOKIE[$Cook_Name])){
		header("Location: index.php");
		exit;
	}
?>

<?
	$_REQUEST['IMEI'] = '359231030219941';
    //Getting IMEI from URL
    if(isset($_REQUEST['IMEI'])){

		$IMEI = $_REQUEST['IMEI'];
		
		// Select query
		$Sel_Query = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' order by Epoch_Time desc limit 1";
		$Sel_Result = mysql_query($Sel_Query);
		$Count_Lat = mysql_num_rows($Sel_Result);
		if($Count_Lat == 0){
			echo $Err_Msg =  "There is no records corresponding date and time you given";
		}
		else{
		?>
        
			<?php
				// Getting Latitude and Longitude for that IMEI
				$i=1;
				$iconctr = 0;
				while($Fetch_Result = mysql_fetch_array($Sel_Result)){
					$Latitude = $Fetch_Result['Latitude'];
					$Longitude = $Fetch_Result['Longitude'];
					$IMEI = $Fetch_Result['IMEI'];
					$Vehicle_No = $Fetch_Result['Vehicle_No'];
					$Location_Summary = $Fetch_Result['Location_Summary'];
					$Date_Stamp = $Fetch_Result['Date_Stamp'];
				        
					$Pos_Details = "<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Current Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>".$Vehicle_No."</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>". date("d-M-Y H:i:s", strtotime($Date_Stamp))."</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>".$Location_Summary."</td></tr></table></div>";
					
					echo $Current_Location_Info = $Latitude."|".$Longitude."|".$Pos_Details;
			?>
			<?      	                
					$i++;      
					$iconctr++;
				}
			?>					
		<?php
        }	// else end			
        ?>
    <?
    } // IMEI end
    ?>