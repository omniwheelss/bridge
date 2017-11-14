<?php
	// Include header File
	include_once("header1.php");
?>


 <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axTmDOmUjPRuy5Ugt2ZVCU_4VR8DxRQcq-APqP8RnFileM4Hz7R-JxsEZA" type="text/javascript"></script>
 				
				<script type="text/javascript" src="./js/google-mul-map.js"></script>
 				
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
						map.setCenter(new GLatLng(13.00000, 80.000000),6);
						var point = new GLatLng(13.00000, 80.000000);
						var label = new ELabel(new GLatLng(13.00000, 80.000000), "<?echo $iconctr;?>", "historylabel",new GSize(0,0));
						map.addOverlay(label);
					} // initialize function end
					</script> 
			  <body onLoad="initialize()" onUnload="GUnload()"> 
            <!-- Ajax Output Div -->        	
            <div id="Output_Div">
              
				<div id="map" class="map_div"></div> 
			  </body> 



<?php
	// Include footer File
	include_once("footer.php");
?>
