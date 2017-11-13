<?

//-------------------------------------------------------------------------------------------------------------
// Function to fetch summary of a trip given start and end record indexes for a given IMEI
// Input Parameters:
// $START 			-	Start Record Index
// $END 			-	END Record Index
// $IMEI			-	IMEI for which to fetch summary
//
// Return Values:
// Array of the following information
// $distance		-	Distance
// $maxspeed		-	Maximum Speed
// $avgspeed		-	Average Speed
// $fuel			-	Fuel Consumption
// $stoptime		-	Stoppage Time
// $runtime			-	Run Time
// $triptime		-	Total duration of trip

function get_trip_summary($START_LATITUDE,$START_LONGITUDE,$END_LATITUDE,$END_LONGITUDE,$IMEI){
	
	global $DIST_CORRECTION;
	global $DEFAULT_DISTANCE_UNIT;
	
	$avgspeed=0;
	$data_distance=0;
	$device_distance=0;
	$zerospeedctr=0;
	$totalspeed=0;
	$maxspeed=0;
	$avgspeed=0;

	$delta = distance($START_LATITUDE,$START_LONGITUDE,$END_LATITUDE,$END_LONGITUDE);


	if ($delta > 0.1){
		// Add up computed distance
		$data_distance=$data_distance+$delta;
	
		// Add up device reported distance
		$device_distance=$device_distance+$distance;
	}				
	
	$totalspeed=$totalspeed+$speed;
	if ($speed==0){$zerospeedctr++;}
	if ($speed>$maxspeed){$maxspeed=$speed;}
	
	$last_latitude=$latitude;
	$last_longitude=$longitude;
	$last_date=$date;
	$last_time=$time;
	$End_Date_Stamp=$last_date;
	$End_Time_Stamp=$last_time;	       
	
	
	// Verify if the device has reported the distance
	// If yes, use the device reported distance, else use the calculated distance along with an error correction value
			
	$distance=$device_distance;
	if ($device_distance<=0){
		$distance=$data_distance;			
		$distance=$distance+($distance*$DIST_CORRECTION);
	}
	if ($DEFAULT_DISTANCE_UNIT=="Miles"){$distance=$distance*0.6214;}
		$distance=round($distance,1);
	
	// Calculate Average Speed	
	$avgspeed=round($totalspeed/($ctr-$zerospeedctr),1);
	if ($avgspeed>0){if ($DEFAULT_DISTANCE_UNIT=="Miles"){$avgspeed=round(($avgspeed*0.6214),1);}}
	
	if ($distance<=0.5){$maxspeed=0;$avgspeed=0;}

	return array($distance,$maxspeed,$avgspeed);
}





?>
