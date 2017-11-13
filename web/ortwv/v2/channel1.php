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
        	
            <div class="top_icons">
            	<div class="channel_icons"><img src="images/current_location.png" class="top_icon_img" title="Last Known Location" /></div>
            	<div class="channel_icons"><img src="images/history_map2.png" class="top_icon_img" title="History Map" /></div>
            	<div class="channel_icons"><img src="images/poi_report.png" class="top_icon_img" title="POI Report" /></div>
            	<div class="channel_icons"><img src="images/idle_report.png" class="top_icon_img" title="IDLE Report" /></div>
                <div class="group"></div>
            </div>
            	
			
            <!-- Ajax Output Div -->        	
            <div id="Output_Div">

            <?php
			//Getting IMEI from URL
			if(isset($_REQUEST['c1'])){
		
				$IMEI = base64_decode($_REQUEST['c1']);
				
				// Select query
				$Sel_Query = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' order by Date_Stamp desc limit 1";
				$Sel_Result = mysql_query($Sel_Query);
				$Count_Lat = mysql_num_rows($Sel_Result);
				if($Count_Lat == 0){
					echo No_Records('Current Location Data Not available');
				}
				else{
				?>
                	<?php
						// Getting Latitude and Longitude for that IMEI
						$Fetch_Result = mysql_fetch_array($Sel_Result);
						$Latitude = $Fetch_Result['Latitude'];
						$Longitude = $Fetch_Result['Longitude'];
						$IMEI = $Fetch_Result['IMEI'];
						$Vehicle_No = $Fetch_Result['Vehicle_No'];
						$Location_Summary = $Fetch_Result['Location_Summary'];
						$Date_Stamp = $Fetch_Result['Date_Stamp'];
					
					?>
 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axRPb1pNkEGT_9SmgAeyjzkYOGAeaxTjSlXjHN2GaW86mPemq0FZl0VM6A" type="text/javascript"></script>
 				
				<script type="text/javascript" src="./js/google-mul-map.js"></script>
				<style type="text/css">
					.mapwin{
						font-size:12px; width:300px;float:left;color:#000; font-family:Arial, Helvetica, sans-serif;
					}
				</style>
				<script type="text/javascript">
					function createMarker(point,icon,data) {
						var marker = new GMarker(point,icon); 
						//GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(data);  });  
						marker.openInfoWindowHtml(data);
						return marker;
					}
					function initialize(){
					  var map = new GMap2(document.getElementById("map"));
					  map.addControl(new GLargeMapControl());
					  map.addControl(new GMapTypeControl());
					  map.addControl(new GScaleControl());
					<?php
						$Pos_Details = "<div><table cellpadding='5' cellspacing='5' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Current Location Info</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>".$Vehicle_No."</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>". date("d-M-Y H:i:s", strtotime($Date_Stamp))."</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>".$Location_Summary."</td></tr></table></div>";
							
					?>
						var icon = new GIcon();				
						icon.image = "./images/map_icons/blue1.gif";				    	
						icon.iconAnchor = new GPoint(10,10);
						icon.infoWindowAnchor = new GPoint(1, 1);
						map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
						var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);
						map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
						var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "<?echo $iconctr;?>", "historylabel",new GSize(0,0));
						map.addOverlay(label);
					} // initialize function end
					</script> 
			  <body onLoad="initialize()" onUnload="GUnload()"> 
				<div id="map" class="map_div"></div> 
			  </body> 
              <div class="space-15"></div>
				<?php
				}	// else end			
				?>
			<?
			} // IMEI end
			?>
            </div>
            
        </div>
        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
