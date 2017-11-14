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

	$Sel_Query1 = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$_REQUEST['IMEI']."' and Date_Stamp between '".$_REQUEST['Start_Date']."' and '".$_REQUEST['End_Date']."' order by Date_Stamp";
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
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Date</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Time</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Status</b></td>
                    <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left"><b>Speed</b></td>
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
                $Location_Summary = $Sel_Record['Location_Summary'];
                $Vehicle_No = $Sel_Record['Vehicle_No'];
                $Date_Stamp = date("d-m-Y",strtotime($Sel_Record['Date_Stamp']));
                $Time_Stamp = date("H:i:s",strtotime($Sel_Record['Date_Stamp']));
                if($Sel_Record['Speed'] == '0')
                    $Status = 'Stopped';
				else	
                    $Status = 'Moving';
                $Location_Summary = $Sel_Record['Location_Summary'];
                $Speed = $Sel_Record['Speed'];
				
				$Excel_Output.= '
				
                <tr>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$R.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Location_Summary.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Date_Stamp.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Time_Stamp.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Status.'</td>
                    <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;"  align="left">'.$Speed.' Kmph</td>
                </tr>';
				
                $R++;
            } //while
            ?>
            	<tr>
                	<td colspan="6" style="font-size:14px; padding:10px 0 10px 5px;" align="center"><b>History Location for - <?=$Vehicle_No?></b><br /><br /><b>Available data from </b><?=$From_Date_Db?>&nbsp; <b>to </b><?=$To_Date_Db?><br /></td>
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
	 	$fName = "History_Location_Report_for_".$Vehicle_No."_On_".$currDate.".xls";
		$fName = urlencode($fName);
		header("Content-Type: application/vnd.ms-excel");
		header("Content-disposition: attachment;filename=$fName");
?>
