<?php
	// Include header File
	include_once("header1.php");
?>


    <div class="con-mid">

		<div class="con-left">
            <?php
				include("vehicle_list.php");
			?>
        </div>

		<div class="con-right">
			
            <!-- Ajax Output Div -->        	
            <div id="Output_Div">
            <?php
				// Select query
				//$Sel_Query = "SELECT * FROM DEVICE_DATA_VIEW where Account_ID = '".$Cook_Account_ID."' group by IMEI order by Date_Stamp desc";
				$Sel_Query = "SELECT * FROM GEO_FENCE where Account_ID = '".$Cook_Account_ID."'";
				$Sel_Result = mysql_query($Sel_Query);
				$Count_Lat = mysql_num_rows($Sel_Result);
				if($Count_Lat == 0){
					echo No_Records('Current Location Data Not available');
				}
				else{
				?>
				 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axRPb1pNkEGT_9SmgAeyjzkYOGAeaxTjSlXjHN2GaW86mPemq0FZl0VM6A" type="text/javascript"></script>
 				
				<script type="text/javascript" src="./js/google-mul-map.js"></script>
                <script src="./js/google_elabel.js" type="text/javascript"></script> 
                <link rel="stylesheet" type="text/css" href="./css/default.css" /> 
				<style type="text/css">
					.mapwin{
						font-size:12px; width:300px;float:left;color:#000; font-family:Arial, Helvetica, sans-serif;
					}
					.historylabel { font-size: 11px; font-weight: bold; font-family: Arial; color: #FFFFCC; background-color: #124191; text-align: center; min-width:100px; padding:0 5px 0 5px; }

				</style>
				<script type="text/javascript">
					function createMarker(point,icon,data) {
						var marker = new GMarker(point,icon); 
						GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(data);  });  
						//marker.openInfoWindowHtml(data);
						return marker;
					}
					function initialize(){
					  var map = new GMap2(document.getElementById("map"));
					  map.addControl(new GLargeMapControl());
					  map.addControl(new GMapTypeControl());
					  map.addControl(new GScaleControl());
					  var icon = new GIcon();				
					  
                	<?php
						// Getting Latitude and Longitude for that IMEI
					$i=1;
					$iconctr = 1;
					while($Fetch_Result = mysql_fetch_array($Sel_Result)){
						$Latitude = $Fetch_Result['Latitude'];
						$Longitude = $Fetch_Result['Longitude'];
						$Date_Stamp = $Fetch_Result['Date_Stamp'];
						$Geo_Name = $Fetch_Result['Name'];
						
						// For Reports
						$R_Latitude[] = $Fetch_Result['Latitude'];
						$R_Longitude[] = $Fetch_Result['Longitude'];
						$R_Geo_Name[] = $Fetch_Result['Name'];
						$R_Radius[] = $Fetch_Result['Radius'];
						
					
						$Pos_Details = "<div><table cellpadding='5' cellspacing='5' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Current Location Info</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>".$Vehicle_No."</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>". date("d-M-Y H:i:s", strtotime($Date_Stamp))."</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>".$Location_Summary."</td></tr></table></div>";
							
					?>
						icon.image = "./images/map_icons/blue1.gif";				    	
						icon.iconAnchor = new GPoint(10,10);
						//icon.infoWindowAnchor = new GPoint(1, 1);
						map.setCenter(new GLatLng(<?echo $Latitude;?>, <?=$Longitude; ?>),5);
						var point = new GLatLng(<?echo $Latitude;?>, <?=$Longitude; ?>);
						map.addOverlay(createMarker(point, icon,"<?=$Pos_Details; ?>"));
						var label = new ELabel(new GLatLng(<?=$Latitude;?>, <?=$Longitude; ?>), "<?=$Geo_Name;?>", "historylabel",new GSize(0,0));
						map.addOverlay(label);
					<?php
						$i++;      
						$iconctr++;
					}// while end
					?>	
					} // initialize function end
					</script> 
			  <body onLoad="initialize()" onUnload="GUnload()"> 
				<div id="map" class="map_div"></div> 
			  </body> 
              <div class="space-15"></div>
				<?php
				}	// else end			
				?>
            </div>
            
            <?php
				if($Count_Lat != 0){
			?>
            
                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="table1" align="left" style="float:left; width:100%">
                    <tr>
                        <td id="comments" align="left">
	      	            <div class="space-10"></div>
                          <table border="0" cellpadding="1" cellspacing="1" class="report-tab-bg" align="left" width="100%">
                          	<tr style="background-color:#EFEFEF">
                            	<td class="report-loc-head" width="5%">Sno</td>
                            	<td class="report-loc-head" width="30%">POI Name</td>
                            	<td class="report-loc-head" width="13%">Radius (Kms)</td>
                            	<td class="report-loc-head" width="13%">Latitude</td>
                            	<td class="report-loc-head" width="13%">Longitude</td>
<!--                            	<td class="report-loc-head" width="10%">Alerts</td>
                            	<td class="report-loc-head" width="8%">Edit Radius</td>-->
                            </tr>
                            
                        <?php
							$R = 0;	
							$R1 = 1;
							foreach($R_Latitude as $R_Latitude_Val)
							{
							?>
								<tr bgcolor="#CCCCCC">
									<td class="report-loc-txt"><?=$R1?></td>
									<td class="report-loc-txt"><?=$R_Geo_Name[$R]?></td>
									<td class="report-loc-txt"><?=$R_Radius[$R]?></td>
									<td class="report-loc-txt"><?=$R_Latitude_Val?></td>
									<td class="report-loc-txt"><?=$R_Longitude[$R]?></td>
<!--									<td class="report-loc-txt"><?$R_Radius[$R]?></td>
									<td class="report-loc-txt"><?$Status?></td>-->
								</tr>
							<?php
								$R++;
								$R1++;
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
            <?php
			}
			?>
            
        </div>

        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
