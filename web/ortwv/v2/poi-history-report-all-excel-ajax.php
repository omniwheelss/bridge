<?php
 ob_start(); error_reporting(0); 
 include("Lib/Includes.php"); 

	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];

	//if(isset($_REQUEST['ajaxquery']))
	{
	
	################################################
	#
	#	From DEVICE_DATA
	#
	###############################################

	$IMEI = base64_decode($_REQUEST['c1']);
	
	$Table_Name = "DEVICE_DATA";
	$Initial_Display = 100;
	$Show_More = 1000;
	$Order_By = "Date_Stamp"; //sorting field
	
	$Start_Datetime = $_REQUEST['Start_Date'];
	$End_Datetime = $_REQUEST['End_Date'];

	$Sel_Query = "SELECT IMEI,Vehicle_No FROM DEVICE_REGISTER where Account_ID = '".$Cook_Account_ID."'";
	$Sel_Result = mysql_query($Sel_Query);
	while($DR_Result = mysql_fetch_array($Sel_Result)){
		$Get_IMEIS[] = $DR_Result['IMEI'];
		$Get_VehicleNos[$DR_Result['IMEI']] = $DR_Result['Vehicle_No'];
	}
	if(count($Get_IMEIS) >= 1){
	
		$Get_IMEIS2 = join("','",$Get_IMEIS);
		
		$Sel_Query = "SELECT count(*) as Total_Records FROM GEO_FENCE_ALERTS where IMEI in ('".$Get_IMEIS2."') and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."'  order by $Order_By asc";
		$Sel_Result = mysql_query($Sel_Query);
		$Total_Result = mysql_fetch_array($Sel_Result);
		$Total_Record = $Total_Result['Total_Records'];
		
		// Getting GEO FENCE NAME
		$Sel_Query1 = "SELECT Name FROM GEO_FENCE where Account_ID = '".$Cook_Account_ID."'";
		$Sel_Result1 = mysql_query($Sel_Query1);
		while($Total_Result1 = mysql_fetch_array($Sel_Result1)){
			$GEOFENCE_Name_Arr[] = $Total_Result1['Name'];
		}
	}
	
		$From_Date_Db = date("d-m-Y H:i:s",strtotime($Start_Datetime));
		$To_Date_Db = date("d-m-Y H:i:s",strtotime($End_Datetime));
	?>
            <table border="0" cellpadding="0" cellspacing="0" id="table1" align="left" style="float:left; width:100%">
            <tr>
                <td style="font-size:14px; padding:10px 0 10px 5px;" align="center"><b>POI Summary Report for the Account of <?=$Cook_Username?></b><br /><br /><b>Available data from </b><?=$From_Date_Db?>&nbsp; <b>to </b><?=$To_Date_Db?><br /></td>
            </tr>
            <tr>
                <td id="comments" align="left">
                <div class="space-10"></div>
				<?php
                foreach($GEOFENCE_Name_Arr as $GEOFENCE_Name){
                // Select query
                    ?>
                
                  <table border="0" cellpadding="1" cellspacing="1" align="left" width="100%">
                    <tr>
                        <td><div class="space-10"></div><div class="space-10"></div></td>
                    </tr>                          
                    <tr>
                        <td class="report-loc-head">
                           <span style="font-weight:normal">Name of the POI :</span> <b><?=$GEOFENCE_Name?></b>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                        
                          <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="100%">
                          <?php
						  $Excel_Output='
						  
                            <tr style="background-color:#EFEFEF">
                                <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left">Sno</td>
                                <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left">Date</td>
                                <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left">Time</td>
                                <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left">Vehicle No</td>
                                <td style="font-size:14px; font-weight:bold; padding:10px 0 10px 5px;" align="left">Status</td>
                            </tr>';
							
							?>
						<?php
						$Sel_Query1 = "SELECT * FROM GEO_FENCE_ALERTS where IMEI in ('".$Get_IMEIS2."') and Name = '".$GEOFENCE_Name."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by $Order_By asc limit $Initial_Display";
						$Sel_Result1 = mysql_query($Sel_Query1);
						$Total_Record1 = mysql_num_rows($Sel_Result1);
						if($Total_Record1 == 0){
							$Err_Msg = 'POI History data Not available for your selection range';
						}
						else{
					
							$R = 1;	
							while($Sel_Record = mysql_fetch_array($Sel_Result1))
							{
							
								$Date_Stamp = date("d-m-Y",strtotime($Sel_Record['Date_Stamp']));
								$Time_Stamp = date("H:i:s",strtotime($Sel_Record['Date_Stamp']));
								$GET_IMEI = $Sel_Record['IMEI'];
								$Status = $Sel_Record['Status'];
						?>
                          <?php
						    
                           $Excel_Output.= ' <tr  style="background-color:#EFEFEF">
                                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$R.'</td>
                                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$Date_Stamp.'</td>
                                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$Time_Stamp.'</td>
                                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$Get_VehicleNos[$GET_IMEI].'</td>
                                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="left">'.$Status.'</td>
                            </tr>';
							
						?>
                            <?php
                                $R++;
                            } //while
                        ?>
								<?php
                                    echo $Excel_Output;
                                ?>
								 <?php
                                 } // GEOFENCE NAME end
                                 ?>
                          
                          </table> 
                        </td>
                     </tr>
                   </table>       
           <?php
		   }
		   ?> 

                </td>
            </tr>
            <tr>
            	<td align="center" style='color:red;padding:10px 0 10px 0; font-size:13px;'><?php if(isset($Err_Msg)) echo $Err_Msg;?></td>
            </tr>
            <tr>
                <td>
                <?php
                if($Total_Record > $Initial_Display){
                ?>
                <span id="more"><center><div id="show-more-img"><div class="show-more-txt">Show More Results</div></div></center></span>
                <div id="loading"><center><div id="show-more-img"><div class="show-more-txt">Loading..</div></div></center></div>
                <?php
                }
                ?>
                </td>
            </tr>
            <tr>
                <td style="font-size:13px; font-weight:normal; padding:3px 0 3px 5px; color:#333333; background-color:#ffffff;" align="center">-- Reports End --</td>
            </tr>
            </table>
<?php	
	}
?>

<?
		$currDate = gmdate("d_M_Y");  
	 	$fName = "POI_Summary_Report_for_the_account_".$Cook_Username."_On_".$currDate.".xls";
		$fName = urlencode($fName);
		header("Content-Type: application/vnd.ms-excel");
		header("Content-disposition: attachment;filename=$fName");
?>
