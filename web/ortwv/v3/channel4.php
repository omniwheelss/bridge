<?php
	// Include header File
	include_once("header1.php");
	session_start();
?>

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
                    <input type="submit" name="Report_IDLE_Report" value="&nbsp;&nbsp; Show Idle Report &nbsp;&nbsp;" >
       <?php
			if(isset($_REQUEST['Report_IDLE_Report'])){
						
				$IMEI = base64_decode($_REQUEST['c1']);
				
				$Start_Date = $_REQUEST['inputDate'];
				$Start_Time = $_REQUEST['inputTime'];
				
				$Start_Datetime = date("Y-m-d H:i:s",strtotime($Start_Date." ".$Start_Time));
				$End_Date = $_REQUEST['inputDate1'];
				$End_Time = $_REQUEST['inputTime1'];
				$End_Datetime = date("Y-m-d H:i:s",strtotime($End_Date." ".$End_Time));

				$Table_Name = "DEVICE_DATA";
				$Initial_Display = 100;
				$Show_More = 100;
				$Order_By = "Date_Stamp"; //sorting field

				$Sel_Query = "SELECT count(*) as Total_Records FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by $Order_By asc";
				$Sel_Result = mysql_query($Sel_Query);
				$Total_Result = mysql_fetch_array($Sel_Result);
				$Total_Record = $Total_Result['Total_Records'];
		
				if($Total_Record > 0){
		?>
                <a href="idle-report-excel-ajax.php?IMEI=<?=$IMEI?>&Start_Date=<?=$Start_Datetime?>&End_Date=<?=$End_Datetime?>"><img src="images/excel.png" height="25" width="25" class="excel-icon"  /></a>
                
       <?
	   			}
			}
       ?>
                    </p>
                 </div>
             </div>
             
             <div id="Report_Sel_Info"></div>
			</form>	

            <!-- Ajax Output Div -->        	
            <div id="Output_Div">

        <?php
		//Getting IMEI from URL
		if(isset($_REQUEST['Report_IDLE_Report'])){
			
			//Getting IMEI from URL
			if(isset($_REQUEST['c1'])){
				$IMEI = base64_decode($_REQUEST['c1']);
				
				// Select query
				$Sel_Query1 = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by $Order_By asc limit $Initial_Display";
				$Sel_Result1 = mysql_query($Sel_Query1);
				$Total_Record1 = mysql_num_rows($Sel_Result1);
				if($Total_Record1 == 0){
					echo No_Records('IDLE data not available for your selection range');
				}
				else{
		?>
                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="table1" align="left" style="float:left; width:100%">
                    <tr>
                        <td id="comments" align="left">
	      	            <div class="space-10"></div>
                          <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="100%">
                          	<tr style="background-color:#EFEFEF">
                            	<td class="report-loc-head" width="5%">Sno</td>
                            	<td class="report-loc-head" width="55%">Location</td>
                            	<td class="report-loc-head" width="10%">Date</td>
                            	<td class="report-loc-head" width="10%">Time</td>
                            	<td class="report-loc-head" width="10%">Ignition Status</td>
                            </tr>
                            
                        <?php
							$R = 1;	
							while($Sel_Record = mysql_fetch_array($Sel_Result1))
							{
								$Location_Summary = $Sel_Record['Location_Summary'];
								$Date_Stamp = date("d-m-Y",strtotime($Sel_Record['Date_Stamp']));
								$Time_Stamp = date("H:i:s",strtotime($Sel_Record['Date_Stamp']));
								if($Sel_Record['IGN'] == 0)
									$Status = 'Off';
								if($Sel_Record['IGN'] == 1)
									$Status = 'On';
								$Location_Summary = $Sel_Record['Location_Summary'];
								$Speed = $Sel_Record['Speed'];
							?>
								<tr bgcolor="#CCCCCC">
									<td class="report-loc-txt"><?=$R?></td>
									<td class="report-loc-txt"><?=$Location_Summary?></td>
									<td class="report-loc-txt"><?=$Date_Stamp?></td>
									<td class="report-loc-txt"><?=$Time_Stamp?></td>
									<td class="report-loc-txt"><?=$Status?></td>
								</tr>
							<?php
								$R++;
							} //while
                        ?>
                          </table> 
                        </td>
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
