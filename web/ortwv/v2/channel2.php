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
	            <div class="space-10"></div>
                
            <link rel="stylesheet" href="./css/datepicker.css" type="text/css" />
            <script type="text/javascript" src="./js/datepicker.js"></script>
            <script type="text/javascript" src="./js/eye.js"></script>
            <script type="text/javascript" src="./js/layout.js?ver=1.0.2"></script>
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
			<form name="history_map" method="post" onSubmit="return check_dates(1)">
          	<div id="muldiv">
                <div class="pod_header"><p style="padding-top:2px">
                	<span class="report-head">Start Date</span><input class="inputDate" name="inputDate" id="inputDate" value="<?=$InputDate?>" style="width:80px; padding-left:5px" />
                    <input type="text" name="inputTime" class="inputTime" value="<?=$InputTime?>" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<span class="report-head">End Date</span><input class="inputDate1"  name="inputDate1" id="inputDate1" value="<?=$InputDate1?>" style="width:80px; padding-left:5px" />
                    <input type="text" name="inputTime1" class="inputTime" value="<?=$InputTime1?>" />
                    &nbsp;&nbsp;&nbsp;
                    <input type="submit" name="Report_History_Map" value="&nbsp;&nbsp; Show History Map &nbsp;&nbsp;" >
                    </p>
                 </div>
             </div>
             <div class="available"><span>Note :</span> Data available for <span style="color:#124191">demo</span> between <span style="color:#124191">04-05-2011</span> to <span style="color:#124191">14-06-2011</span></div>
             
             <div id="Report_Sel_Info"></div>
			</form>	
                
        <?php
		//Getting IMEI from URL
		if(isset($_REQUEST['Report_History_Map'])){
			
			//Getting IMEI from URL
			if(isset($_REQUEST['c1'])){
		
				$IMEI = base64_decode($_REQUEST['c1']);
				
				$Start_Date = $_REQUEST['inputDate'];
				$Start_Time = $_REQUEST['inputTime'];
				$Start_Datetime = date("Y-m-d H:i:s",strtotime($Start_Date." ".$Start_Time));
				$End_Date = $_REQUEST['inputDate1'];
				$End_Time = $_REQUEST['inputTime1'];
				$End_Datetime = date("Y-m-d H:i:s",strtotime($End_Date." ".$End_Time));
				
				// Select query
				$Sel_Query = "SELECT * FROM DEVICE_DATA_VIEW where IMEI = '".$IMEI."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by Epoch_Time desc";
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
				</style>
				<script type="text/javascript">
					function createMarker(point,icon,data) {
						var marker = new GMarker(point,icon); 
						GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(data);  });  
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
						$iconctr = 0;
						while($Fetch_Result = mysql_fetch_array($Sel_Result)){
							$Latitude = $Fetch_Result['Latitude'];
							$Longitude = $Fetch_Result['Longitude'];
							$IMEI = $Fetch_Result['IMEI'];
							$Vehicle_No = $Fetch_Result['Vehicle_No'];
							$Location_Summary = $Fetch_Result['Location_Summary'];
							$Date_Stamp = $Fetch_Result['Date_Stamp'];
								
							$Pos_Details = "<div><table cellpadding='5' cellspacing='5' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Current Location Info</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>".$Vehicle_No."</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>". date("d-M-Y H:i:s", strtotime($Date_Stamp))."</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>".$Location_Summary."</td></tr></table></div>";
							
					?>
						icon.image = "./images/map_icons/blue.gif";				    	
						icon.iconAnchor = new GPoint(10,10);
						icon.infoWindowAnchor = new GPoint(1, 1);
						map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
						var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);
						map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
						var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "<?echo $iconctr;?>", "historylabel",new GSize(0,0));
						map.addOverlay(label);
						
						 <? 
						 if ($i==1){	    
						?>
							icon.image = "./images/map_icons/grn.gif";
							icon.iconAnchor = new GPoint(10,10);
							icon.infoWindowAnchor = new GPoint(1, 1);
							map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
							var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);
							map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
							var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "Start", "historystart",new GSize(0,0));  
							map.addOverlay(label);										
						<?
						 } else if ($i==$Count_Lat) {    	
						?>
							icon.image = "./images/map_icons/red.gif";
							icon.iconAnchor = new GPoint(10,10);
							icon.infoWindowAnchor = new GPoint(1, 1);
							map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
							var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);  		
							map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
							var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "End", "historyend",new GSize(0,0));
							map.addOverlay(label);
					  
					<?
						}else{
						   //if( distance($Latitude,$Longitude,$latitude,$longitude) > 0.1 )
					?>
							icon.image = "./images/map_icons/blue1.gif";				    	
							icon.iconAnchor = new GPoint(10,10);
							icon.infoWindowAnchor = new GPoint(1, 1);
							map.setCenter(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>),11);
							var point = new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>);
							map.addOverlay(createMarker(point, icon,"<? echo $Pos_Details; ?>"));
							var label = new ELabel(new GLatLng(<?echo $Latitude;?>, <? echo $Longitude; ?>), "<?echo $iconctr;?>", "historylabel",new GSize(0,0));
							map.addOverlay(label);
					<?      	                
						  }
							$i++;      
							$iconctr++;
					}// while end
							
					?>					
					} // initialize function end
					</script> 
			  <body onLoad="initialize()" onUnload="GUnload()">
              <div class="space-15"></div>
              <div class="space-15"></div>
				<div id="map" class="map_div"></div> 
			  </body> 
              <div class="space-15"></div>
				<?php
				}	// else end			
				?>
			<?
			} // IMEI end
			?>
            
		<?php
        } // isset Report_History_Map
        ?>
            
            
            
            
            </div>
            
        </div>
        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
