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

	$Sel_Query1 = "SELECT * FROM STARTSTOP_SUMMARY_VIEW where IMEI = '".$_REQUEST['IMEI']."'  and ( Start_Date_Stamp between '".$_REQUEST['Start_Date']."' and '".$_REQUEST['End_Date']."' and Start_IGN = '0' ) or  ( End_Date_Stamp between '".$_REQUEST['Start_Date']."' and '".$_REQUEST['End_Date']."' and End_IGN = '0') and Start_IGN = '0' order by Start_Date_Stamp ";
	$Sel_Result1 = mysql_query($Sel_Query1);
	$Total_Record1 = mysql_num_rows($Sel_Result1);
	if($Total_Record1 == 0){
		echo No_Records('Current Location Data Not available');
	}
	else{
	?>
        <table border="0" cellpadding="0" cellspacing="0" width="1000" id="table1" align="left" style="float:left;">
        <tr>
            <td id="comments" align="left">
            <div class="space-10"></div>
              <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="80%">
              <?php
			  
			  $Excel_Output='
                <tr style="background-color:#EFEFEF">
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Sno</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Location</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>From Date & Time</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>To Date & Time</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Total Stoppage
Hrs</b></td>
                </tr>
				';
				
            $R = 1;	
            while($Sel_Record = mysql_fetch_array($Sel_Result1))
            {
				if($R == 1){
					$From_Date_Db = date("d-m-Y H:i:s",strtotime($Sel_Record['Date_Stamp']));
				}
				if($R == $Total_Record1){
					$To_Date_Db = date("d-m-Y H:i:s",strtotime($Sel_Record['Date_Stamp']));
				}
                $Vehicle_No = $Sel_Record['Vehicle_No'];
				$Start_Location_Summary = $Sel_Record['Start_Location_Summary'];
				$Start_Date_Stamp = date("d-m-Y",strtotime($Sel_Record['Start_Date_Stamp']));
				$Start_Time_Stamp = date("H:i:s",strtotime($Sel_Record['Start_Date_Stamp']));
				$Start_DateTime_Stamp = date("d-m-Y H:i:s",strtotime($Sel_Record['Start_Date_Stamp']));
				$End_Date_Stamp = date("d-m-Y",strtotime($Sel_Record['End_Date_Stamp']));
				$End_Time_Stamp = date("H:i:s",strtotime($Sel_Record['End_Date_Stamp']));
				$End_DateTime_Stamp = date("d-m-Y H:i:s",strtotime($Sel_Record['End_Date_Stamp']));
				$Date_Stamp_Info = get_time_difference($Start_DateTime_Stamp,$End_DateTime_Stamp);
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
				
				if($Date_Stamp_Info['days'] < 0)
						$Days_Info = $Date_Stamp_Info['days']." day(s) and";
				$Total_Time = "".$Days_Info." ".$Date_Stamp_Info_hours.":".$Date_Stamp_Info_minutes.":".$Date_Stamp_Info_seconds; 
				
				$Excel_Output.= '
				
                <tr>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$R.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Start_Location_Summary.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Start_Date_Stamp.'&nbsp;&nbsp;'.$Start_Time_Stamp.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$End_Date_Stamp.'&nbsp;&nbsp;'.$End_Time_Stamp.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Total_Time.'</td>
                </tr>';
				
                $R++;
            } //while
            ?>
            	<tr>
                	<td colspan="6" style="font-size:14px; padding:10px 0 10px 5px;" align="center"><b>Stoppage Report for - <?=$Vehicle_No?> </b><br /><br /><b>Available data from </b><?=$From_Date_Db?>&nbsp; <b>to </b><?=$To_Date_Db?><br /></td>
                </tr>
            	<?php
					echo $Excel_Output;
				?>
            	<tr>
                	<td colspan="6" style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="center">-- Reports End --</td>
                </tr>
              </table> 
            </td>
        </tr>
        </table>

<?php	
		}
	}
?>

<?
		$currDate = gmdate("d_M_Y");  
	 	$fName = "Stoppage_Report_for_".$Vehicle_No."_On_".$currDate.".xls";
		$fName = urlencode($fName);
		header("Content-Type: application/vnd.ms-excel");
		header("Content-disposition: attachment;filename=$fName");
?>
