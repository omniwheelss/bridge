<?php
if($_REQUEST['action'] == 'yes'){echo "seeni";
?>

<?
	echo $_REQUEST['IMEI'] = '359231030219941';
    //Getting IMEI from URL
    if(isset($_REQUEST['IMEI'])){

		$IMEI = $_REQUEST['IMEI'];
		
		// Select query
		echo $Sel_Query = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' order by Epoch_Time desc limit 1";
		$Sel_Result = mysql_query($Sel_Query);
		$Count_Lat = mysql_num_rows($Sel_Result);
		if($Count_Lat == 0){
			echo $Err_Msg =  "There is no records corresponding date and time you given";
		}
		else{
		?>
        
		<script type="text/javascript" src="js/google-mul-map.js"></script>
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
					
			?>
				var icon = new GIcon();				
				icon.image = "./images/map_icons/blue.gif";				    	
				icon.iconAnchor = new GPoint(10,10);
				icon.infoWindowAnchor = new GPoint(1, 1);
				map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
				var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);
				map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
				var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "<?echo $iconctr;?>", "historylabel",new GSize(0,0));
				map.addOverlay(label);
			<?      	                
					$i++;      
					$iconctr++;
				}
					
			?>					
            } // initialize function end
            </script> 
		<?php
        }	// else end			
        ?>
      <body onLoad="initialize()" onUnload="GUnload()"> 
        <div id="map" style="width: 100%; height: 600px"></div> 
      </body> 
    <?
    } // IMEI end
    ?>
<?
}
?>	
    