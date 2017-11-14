<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	//if(isset($_REQUEST['ajaxquery']))
	{
	
	################################################
	#
	#	From DEVICE_DATA
	#
	###############################################
	
		$History_Location_Sql = "SELECT D.*,DR.Vehicle_No AS Vehicle_No  FROM DEVICE_DATA D LEFT JOIN DEVICE_REGISTER DR ON D.IMEI = DR.IMEI where D.IMEI = '".$_REQUEST['IMEI']."' and D.Date_Stamp between '".$_REQUEST['Start_Date']."' and '".$_REQUEST['End_Date']."' order by D.Date_Stamp";
		$History_Location_Run = mysql_query($History_Location_Sql) or die(mysql_error());
		$History_Location_Count = mysql_num_rows($History_Location_Run); 
		if($History_Location_Count > 0){
			$T = 1;
			while($Sel_Record = mysql_fetch_array($History_Location_Run)){
				$Vehicle_No = $Sel_Record['Vehicle_No'];
				if($T == 1){
					$Start_Date_Stamp = $Sel_Record['Date_Stamp'];
				}
				if($T == $History_Location_Count){
					$End_Date_Stamp = $Sel_Record['Date_Stamp'];
				}
				$Date_Stamp = $Sel_Record['Date_Stamp'];
				$Date_Stamp1 = $Date_Stamp;
				
				// For Total Time
				$Date_Arr[$T] = date("Y-m-d",strtotime($Sel_Record['Date_Stamp']));
				$Time_Arr[$T] = date("H:i:s",strtotime($Sel_Record['Date_Stamp']));
				if($Sel_Record['Speed'] != 0){
				echo $Speed1[$T] = $Sel_Record['Speed'];
				echo "<br >";
				}
				if($Speed1[$T] != 0){
					//echo $Speed1[$T];
					//echo "<br />";
				}

				$Speed = $Sel_Record['Speed'];
				$T++;
			}
			sort($Speed1);
			//print_r($Speed1);
			$R = 1;
			foreach($Date_Arr as $Date){
			
				if($R != $Count_Lat){
					$Get_Diff = getMyTimeDiff($Time_Arr[$R],$Time_Arr[$R+1]);
					$Get_Diff_Arr = explode(":",$Get_Diff);
					$F_Time = (strlen($Get_Diff_Arr[0]) == 1 ? "0".$Get_Diff_Arr[0] : $Get_Diff_Arr[0]);
					$S_Time = (strlen($Get_Diff_Arr[1]) == 1 ? "0".$Get_Diff_Arr[1] : $Get_Diff_Arr[1]);
					$T_Time = (strlen($Get_Diff_Arr[2]) == 1 ? "0".$Get_Diff_Arr[2] : $Get_Diff_Arr[2]);		
					// Total Travelled Time
						$Total_Up_Time+= $F_Time + ($S_Time * 60) + $T_Time;
					//Vehicle Stopped Time
					if($Speed1[$R] == '0')
						$Stopped_Time+= $F_Time + ($S_Time * 60) + $T_Time;
					//Vehicle Moving Time
					elseif($Speed1[$R] > '0'){
						$Moving_Time+= $F_Time + ($S_Time * 60) + $T_Time;
						$Speed_All_Val_Arr[] = $F_Time + ($S_Time * 60) + $T_Time;
					}	
						
					$R++;
				}	
			}

		}
		else{
			echo $war_msg = "Current Location Data Not available";
		}
		
		### Getting Average
		$Average_Speed_Val = calculate_average($Speed_All_Val_Arr);

	################################################
	#
	#	From STARTSTOP_SUMMARY
	#
	###############################################
	
/*		$Startstop_Sql = "SELECT * FROM STARTSTOP_SUMMARY  where IMEI = '".$_REQUEST['IMEI']."' and Start_Date_Stamp between '".$_REQUEST['Start_Date']."' and '".$_REQUEST['End_Date']."' order by Start_Date_Stamp asc";
		$Startstop_Run = mysql_query($Startstop_Sql) or die(mysql_error());
		$Startstop_Count = mysql_num_rows($Startstop_Run); 
		if($Startstop_Count > 0){
			$S = 1;
			while($ST_Sel_Record = mysql_fetch_array($Startstop_Run)){
				$ST_Start_Date_Stamp = $ST_Sel_Record['Start_Date_Stamp'];
				$ST_End_Date_Stamp = $ST_Sel_Record['End_Date_Stamp'];
				if($ST_Sel_Record['Start_IGN'] == 0 && $ST_Sel_Record['End_IGN'] == 0){
					 echo $Startend_Date_Stamp = strtotime($ST_End_Date_Stamp) - strtotime($ST_Start_Date_Stamp);
					 echo "<br />";
					//$ST_Date_Stamp_Info = get_time_difference($ST_Start_Date_Stamp,$ST_End_Date_Stamp);
					print_r($ST_Date_Stamp_Info);
				}
				$S++;
			}

		}
		else{
			echo $war_msg = "Records Not Found";
		}
*/		
?>
<?php
		
/*		$Date_Stamp_Info = get_time_difference( $Start_Date_Stamp, $End_Date_Stamp);
		$Date_Stamp_Info_hours = $Date_Stamp_Info['hours'];
		$Date_Stamp_Info_minutes = $Date_Stamp_Info['minutes'];
		$Date_Stamp_Info_seconds = $Date_Stamp_Info['seconds'];

		// For hours
		if(strlen($Date_Stamp_Info_hours) == 1)
			$Date_Stamp_Info_hours = "0".$Date_Stamp_Info_hours;
		else
			$Date_Stamp_Info_hours = $Date_Stamp_Info['hours'];
			
		// For minutes
		if(strlen($Date_Stamp_Info_minutes) == 1)
			$Date_Stamp_Info_minutes = "0".$Date_Stamp_Info_minutes;
		else
			$Date_Stamp_Info_minutes = $Date_Stamp_Info['minutes'];
			
		// For seconds
		if(strlen($Date_Stamp_Info_seconds) == 1)
			$Date_Stamp_Info_seconds = "0".$Date_Stamp_Info_seconds;
		else
			$Date_Stamp_Info_seconds = $Date_Stamp_Info['seconds'];
			
		$Total_Time = $Date_Stamp_Info['days']." day(s) and ".$Date_Stamp_Info_hours.":".$Date_Stamp_Info_minutes.":".$Date_Stamp_Info_seconds; */
		
		

?>
            
            <div class="space-10"></div>
              <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="100%">
                <tr style="background-color:#EFEFEF">
                    <td class="summary-loc-head" width="25%">Vehicle No<br /><div class='Summary_Top'><?=$Vehicle_No?></div></td>
                    <td class="summary-loc-head" width="25%">Total Time<br /><div class='Summary_Top'><?=Sec2Time($Total_Up_Time)?></div></td>
                    <td class="summary-loc-head" width="25%">Total Movement Time<br /><div class='Summary_Top'><?=Sec2Time($Moving_Time)?></div></td>
                    <td class="summary-loc-head" width="25%">Total Stoppage Time<br /><div class='Summary_Top'><?=Sec2Time($Stopped_Time)?></div></td>
                </tr>
                <tr style="background-color:#EFEFEF">    
                    <td class="summary-loc-head" width="25%">Total Distance<br /><div class='Summary_Top'><??></div></td>
                    <td class="summary-loc-head" width="25%">Average Speed<br /><div class='Summary_Top'><?=round($Average_Speed_Val)?> km</div></td>
                    <td class="summary-loc-head" width="25%">Maximum Speed<br /><div class='Summary_Top'><?=min($Speed1)?> km</div></td>
                    <td class="summary-loc-head" width="25%"></td>
                </tr>
              </table>
<?php                 
	}
?>