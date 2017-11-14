<?php
	// Include header File
	include_once("header1.php");
	session_start();
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />


    <div class="con-mid">

		<div class="con-right">
			
            <link rel="stylesheet" href="css/datepicker.css" type="text/css" />
            <script type="text/javascript" src="js/datepicker.js"></script>
            <script type="text/javascript" src="js/eye.js"></script>
            <script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>

            <?php
				if($_REQUEST['inputDate']){
					$InputDate = $_REQUEST['inputDate'];
					$InputTime = $_REQUEST['inputTime'];
				}	
				else{
					$InputDate = date("d-m-Y");	
					$InputTime = "00:00";	
				}
					
				if($_REQUEST['inputDate1']){
					$InputDate1 = $_REQUEST['inputDate1'];
					$InputTime1 = $_REQUEST['inputTime1'];
				}	
				else{
					$InputDate1 = date("d-m-Y");
					$InputTime1 = "23:59";	
				}	
			?>
            
			<form name="history_map" method="post" onsubmit="return check_dates(7)">
          	<div id="muldiv">
                <div class="pod_header"><p style="padding-top:2px">
                	<span class="report-head">Start Date</span><input class="inputDate" name="inputDate" id="inputDate" value="<?=$InputDate?>" style="width:80px; padding-left:5px" />
                    <input type="text" name="inputTime" class="inputTime" value="<?=$InputTime?>" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<span class="report-head">End Date</span><input class="inputDate1"  name="inputDate1" id="inputDate1" value="<?=$InputDate1?>" style="width:80px; padding-left:5px" />
                    <input type="text" name="inputTime1" class="inputTime" value="<?=$InputTime1?>" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="Report_POI" value="&nbsp;&nbsp; Show POI History &nbsp;&nbsp;" >
       <?php
			if(isset($_REQUEST['Report_POI'])){
						
				$IMEI = base64_decode($_REQUEST['c1']);
				
				$Start_Date = $_REQUEST['inputDate'];
				$Start_Time = $_REQUEST['inputTime'];
				
				$Start_Datetime = date("Y-m-d H:i:s",strtotime($Start_Date." ".$Start_Time));
				$End_Date = $_REQUEST['inputDate1'];
				$End_Time = $_REQUEST['inputTime1'];
				$End_Datetime = date("Y-m-d H:i:s",strtotime($End_Date." ".$End_Time));

				$Table_Name = "DEVICE_DATA";
				$Initial_Display = 100;
				$Show_More = 1000;
				$Order_By = "Date_Stamp"; //sorting field
				
				$IMEI = base64_decode($_REQUEST['c1']);	
				$Sel_Query = "SELECT IMEI,Vehicle_No FROM DEVICE_REGISTER where IMEI = '".$IMEI."'";
				$Sel_Result = mysql_query($Sel_Query);
				while($DR_Result = mysql_fetch_array($Sel_Result)){
					$Get_IMEIS[] = $DR_Result['IMEI'];
					$Get_VehicleNos[$DR_Result['IMEI']] = $DR_Result['Vehicle_No'];
				}
				
				$Sel_Query = "SELECT count(*) as Total_Records FROM GEO_FENCE_ALERTS where IMEI = '".$IMEI."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."'  order by $Order_By asc";
				$Sel_Result = mysql_query($Sel_Query);
				$Total_Result = mysql_fetch_array($Sel_Result);
				$Total_Record = $Total_Result['Total_Records'];
				
				// Getting GEO FENCE NAME
				$Sel_Query1 = "SELECT Name FROM GEO_FENCE where Account_ID = '".$Cook_Account_ID."'";
				$Sel_Result1 = mysql_query($Sel_Query1);
				while($Total_Result1 = mysql_fetch_array($Sel_Result1)){
					$GEOFENCE_Name_Arr[] = $Total_Result1['Name'];
				}
				
					if($Total_Record > 0){
			?>
					<a href="poi-history-report-excel-ajax.php?IMEI=<?=$IMEI?>&Start_Date=<?=$Start_Datetime?>&End_Date=<?=$End_Datetime?>"><img src="images/excel.png" height="25" width="25" class="excel-icon"  /></a>
					
		   <?
					}
			}
       ?>
                    </p>
                 </div>
             </div>
             <div class="available"><span>Note :</span> Data available for <span style="color:#124191">demo</span> between <span style="color:#124191">04-05-2011</span> to <span style="color:#124191">14-06-2011</span></div>
             <div id="Report_Sel_Info"></div>
			</form>	

            <!-- Ajax Output Div -->        	
            <div id="Output_Div">
	            <div class="space-10"></div>

        <?php
		//Getting IMEI from URL
		if(isset($_REQUEST['Report_POI'])){
			
			//Getting IMEI from URL
			if(isset($_REQUEST['c1'])){
				$IMEI = base64_decode($_REQUEST['c1']);
				
		?>
            <table border="0" cellpadding="0" cellspacing="0" width="600" id="table1" align="left" style="float:left; width:100%">
            <tr>
                <td align="left">
                <div id="History_Location_Info"></div>  
                </td>
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
                           <span style="font-weight:normal">Name of the POI :</span> <?=$GEOFENCE_Name?>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                        
                          <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="100%">
                            <tr style="background-color:#EFEFEF">
                                <td class="report-loc-head" width="5%">Sno</td>
                                <td class="report-loc-head" width="10%">Date</td>
                                <td class="report-loc-head" width="10%">Time</td>
                                <td class="report-loc-head" width="50%">Vehicle No</td>
                                <td class="report-loc-head" width="15%">Status</td>
                            </tr>
						<?php
						
						$Sel_Query1 = "SELECT * FROM GEO_FENCE_ALERTS where IMEI = '".$IMEI."' and Name = '".$GEOFENCE_Name."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by $Order_By asc limit $Initial_Display";
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
                            
                            <tr bgcolor="#CCCCCC">
                                <td class="report-loc-txt"><?=$R?></td>
                                <td class="report-loc-txt"><?=$Date_Stamp?></td>
                                <td class="report-loc-txt"><?=$Time_Stamp?></td>
                                <td class="report-loc-txt"><?=$Get_VehicleNos[$GET_IMEI]?></td>
                                <td class="report-loc-txt"><?=$Status?></td>
                            </tr>
                            <?php
                                $R++;
                            } //while
                        ?>
                          </table> 
                        </td>
                     </tr>
                     <?php
                     } // GEOFENCE NAME end
                     ?>
                   </table>       
                </td>
            </tr>
            <tr>
            	<td align="center" class="Err_Msg_POI"><?php if(isset($Err_Msg)) echo $Err_Msg;?></td>
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
            </table>
                    <form id="myForm">
                        <input type="hidden" name="Show_More" id="Show_More" value="<?=$Show_More?>" />
                        <input type="hidden" name="Table_Name" id="Table_Name" value="<?=$Table_Name?>" />
                        <input type="hidden" name="Initial_Display" id="Initial_Display" value="<?=$Initial_Display?>" />
                        <input type="hidden" name="Order_By" id="Order_By" value="<?=$Order_By?>" />
                        <input type="hidden" name="IMEI" id="IMEI" value="<?=$IMEI?>" />
                        <input type="hidden" name="Start_Datetime" id="Start_Datetime" value="<?=$Start_Datetime?>" />
                        <input type="hidden" name="End_Datetime" id="End_Datetime" value="<?=$End_Datetime?>" />
                        <input type="hidden" name="Total_Record" id="Total_Record" value="<?=$Total_Record?>" />
                    </form>
                        <script type="text/javascript" src="show_more.js"></script>
		<?php
					}
				}	// url c1 get end
			}	// submit end
		?>	

	            </div>
            
        </div>
        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
