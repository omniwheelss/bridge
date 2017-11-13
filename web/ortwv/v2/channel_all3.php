<?php
	// Include header File
	include_once("header1.php");
?>

 
                                         <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axRPb1pNkEGT_9SmgAeyjzkYOGAeaxTjSlXjHN2GaW86mPemq0FZl0VM6A" type="text/javascript"></script>

 <script type="text/javascript">
var map;
       

 function clearmap( mk )
 {
 map.clearOverlays() ;
 lastclick = "" ;
 }

// Check for a double click...

 function checkclick ( point ) {
 if ( lastclick != point ) {
 	 lastclick = point ;
 	 var zoomlvl = map.getZoom();
	 fc( point, zoomlvl) ;
 	}

 }

 
 function fc( point, zoomlvl ) {
	var html = "";
	map.setCenter(point, zoomlvl);
	html = "<center><div id='poi_creation'><table border='0' cellpadding='3' cellspacing='3'><tr><td colspan='2'><div class='poi-head'>Create Geo Fence</div></td></tr><tr><td class='poi-txt'>Name</td><td><input class='forminputtext' name='POI_Name_Geo' id='POI_Name_Geo' type='text'><input class='poi_txt' name='Point' id='Point' value='" + map.getCenter(point) +"' type='hidden'></td></tr><tr><td colspan='2'><input class='poi-sub' type='button' value='Create Your POI' onclick='Poi_Creation()'></td></tr></table></div></center><div id='poi-ajax'><br />Loading...</div><div id='poi_thankyou'><table border='0' cellpadding='3' cellspacing='3'><tr><td colspan='2'><div class='poi-head'>Thank you</div></td></tr><tr><td class='poi-txt'><div id='Output_txt'></div></td></tr></table></div>";
	var marker = new createMarker(point,html);
	map.addOverlay(marker);
 }


 function createMarker(point,html) {
	var marker = new GMarker(point); 
	GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(html);  });  
	return marker;
 }


 </script>



    <div class="con-mid">

		<div class="con-left">
            <?php
				include("vehicle_list.php");
			?>
        </div>

		<div class="con-right">

           <!-- Ajax Output Div -->        	
            <div id="Output_Div">
	            <div class="space-10"></div>
                <div id="muldiv">
                    <div class="pod_header">
                        <p style="padding-top:6px" >
                  	      <center><span class="report-head1" onclick="Create_New_POI()">Create POI</span>( I know latitude and longitude )</center>
                        </p>
                    </div>
                    <center>
                   <div id="Creat_POI_Window">
                   <table border="0" cellpadding="5" cellspacing="5" width="450px" align="center">
                        <tr>
                            <td width="80px">POI Name <?=$star?></td>
                            <td width="210px"><input type="text" name="POI_Name" id="POI_Name" class="poi-new-box" /></td>
                            <td><div id='POI_Namev' class="poi-valid-txt"></div></td>
                        </tr>
                        <tr>
                            <td>Latitude <?=$star?></td>
                            <td><input type="text" name="Latitude" id="Latitude" class="poi-new-box" /></td>
                            <td><div id='Latitudev' class="poi-valid-txt"></div></td>
                        </tr>
                        <tr>
                            <td>Longitude <?=$star?></td>
                            <td><input type="text" name="Longitude" id="Longitude" class="poi-new-box" /></td>
                            <td><div id='Longitudev' class="poi-valid-txt"></div></td>
                        </tr>
                        <tr>
                            <td>Radius (km)<?=$star?></td>
                            <td><input type="text" name="Radius" id="Radius" class="poi-new-box" /></td>
                            <td><div id='Radiusv' class="poi-valid-txt"></div></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="button" value="Create New POI" name="poi_create_sub" class="poi-new-sub" onclick="New_POI_Creation('POI_Name,Latitude,Longitude,Radius')" /></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><div class="poi-row">&nbsp;</div></td>
                            <td>&nbsp;</td>
                        </tr>
                   </table>
                   </div>
                   <div id="Creat_POI_Window1">
                   <table border="0"  cellpadding="5" cellspacing="5" width="300px" align="center">
                        <tr>
                            <td colspan="2" align="center"><div id='poi-ajax1'><br />Loading...</div><div id='New_Poi_Output_txt'></div><div class="poi-row">&nbsp;</div></td>
                        </tr>
                   </table>
                   </div>
                   </center>
             </div>
			</div>
			
			 <script language="javascript">
             document.write('<div id="map" style="width:100%; height:600px; margin-top:10px; float:left">') ;
             </script>
             <script language="javascript">
             var lastclick = "" ;				// Last Clicked Point
             var map = new GMap2(document.getElementById("map"),{googleBarOptions: {showOnLoad: true}});
             map.addControl(new GLargeMapControl());
             map.addControl(new GMapTypeControl()); 
             var icon = new GIcon();
             icon.image = "images/map_icons/cl.jpg";
             icon.iconAnchor = new GPoint(10,10);
             icon.infoWindowAnchor = new GPoint(1, 1);
              var point = new GLatLng(12.9659050,80.2054050);
             map.setCenter(point, 6);
             GEvent.addListener(map, 'click', function(overlay, point)
             {
             if (overlay) { } else if (point) { checkclick( point ) ;
             }
             });
             
             </script>	
            
            <!-- Ajax Output Div -->        	

				</div>
			</div>
        

        <div class="group"></div>
    </div>


<?php
	// Include footer File
	include_once("footer.php");
?>
