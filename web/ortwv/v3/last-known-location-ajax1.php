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

							var icon = new GIcon();				

				icon.image = "./images/map_icons/blue.gif";				    	

				icon.iconAnchor = new GPoint(10,10);

				icon.infoWindowAnchor = new GPoint(1, 1);

				map.setCenter(new GLatLng(13.061818, 80.229493),11);

				var point = new GLatLng(13.061818, 80.229493);

				map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Current Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-01-AJ-6030</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>07-May-2011 20:10:09</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>Ramanaju St  Athreya Puram  Choolaimedu  Chennai  Tamil Nadu  India</td></tr></table></div>"));

				var label = new ELabel(new GLatLng(13.061818, 80.229493), "0", "historylabel",new GSize(0,0));

				map.addOverlay(label);

								

            } // initialize function end

            </script> 

		      <body onLoad="initialize()" onUnload="GUnload()"> 

        <div id="map" style="width: 100%; height: 600px"></div> 

      </body> 

    