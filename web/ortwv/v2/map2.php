
 
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
	<title>OnroadTrack</title> 
		 <link rel="stylesheet" type="text/css" href="css/Style.css"> 
	 <script language="javascript" type="text/javascript" src="http://localhost/onroadtrack/js/Jscript.js"></script> 
	 <script language="javascript" type="text/javascript" src="http://localhost/onroadtrack/js/jq1.js"></script> 
</head> 
<center> 
 
 
<div id="wrap"> 
   <table border="0" width="1000px" class="innerbg"> 
        <tr> 
            <td valign="top"> 
               <table border="0" width="1000px" class="bodybg1"> 
                    <tr> 
                        <td width="50%"><img src="images/logo.jpg" height="63" width="213" title="OnroadTrack" alt="OnroadTrack" /></td> 
                        <td>&nbsp;</td> 
					</tr> 
                </table>                            
			</td> 
        </tr> 
        <tr> 
            <td valign="top"> 
               <table border="0" width="1000px" height="20px" class="bodybg2"> 
                    <tr> 
                    	<td><a href='Home.php' class='home_link'>[ Home ]</a></td> 
                        <td> 
							<div class="logged_txt">Welcome&nbsp;mani</span>&nbsp;<span style='font-weight:normal'>[</span> <a href='Logout.php?cmd=logout' class="logout">logout</a> <span style='font-weight:normal'>]</span></div>                        </td> 
					</tr> 
                </table>        
			</td> 
        </tr> 
        <tr> 
            <td valign="top"><hr style="margin-top:-5px;"></td> 
        </tr> 
        <tr>   
            <td valign="top"> 
                <table border="0" cellpadding="0" cellspacing="5" width="100%" height="600px;"> 
                    <tr> 
                        <td width="20%" valign="top" class="accountbg"> 
                        
                            <table border="0" cellpadding="3" cellspacing="4" width="100%"> 
                            	<tr> 
                                	<td valign="top" colspan="2"><h3 class="account_txt">Vehicle Details</h3></td> 
                                </tr> 
							                                <tr> 
                                    <td> 
										<a href='Vehicle_Options.php?level=1' class='accountlist_bg1' ><div class='accountlist_td1'>TN-09-BE-3296</div></a>									</td> 
                                    <td><a href='Current_Location.php?level=1'><img src="images/icons/clll.png" height="15" width="15" title="Current Location for TN-09-BE-3296" /></a></td> 
                                </tr> 
                                                             <tr> 
                                    <td> 
										<a href='Vehicle_Options.php?level=2' class='accountlist_bg' ><div class='accountlist_td'>TN-09-BE-3000</div></a>									</td> 
                                    <td><a href='Current_Location.php?level=2'><img src="images/icons/clll.png" height="15" width="15" title="Current Location for TN-09-BE-3000" /></a></td> 
                                </tr> 
                                                             <tr> 
                                    <td> 
										<a href='Vehicle_Options.php?level=3' class='accountlist_bg' ><div class='accountlist_td'>Suresh-Testing</div></a>									</td> 
                                    <td><a href='Current_Location.php?level=3'><img src="images/icons/clll.png" height="15" width="15" title="Current Location for Suresh-Testing" /></a></td> 
                                </tr> 
                                                             <tr> 
                                    <td> 
										a href='Vehicle_Options.php?level=5' class='accountlist_bg' ><div class='accountlist_td'>kalidass-Testing</div></a>									</td> 
                                    <td><a href='Current_Location.php?level=5'><img src="images/icons/clll.png" height="15" width="15" title="Current Location for kalidass-Testing" /></a></td> 
                                </tr> 
                                                         </table>        
                        </td> 
                        <td valign="top" class="bodybg1"> 
 
  
    <link rel="stylesheet" type="text/css" href="default.css" /> 
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axRPb1pNkEGT_9SmgAeyjzkYOGAeaxTjSlXjHN2GaW86mPemq0FZl0VM6A" type="text/javascript"></script> 
<script src="google_elabel.js" type="text/javascript"></script> 
 
	<div id="admin_div"> 
		<div id="admin_left"> 
		<p class="headings">History_Map</p> 
			<table border="0" cellpadding="0" cellspacing="0" width="100%" height="70" align="left" class="List_Tab"> 
				<tr> 
					<td width="990" valign="top"> 
					<form action="" name="History_Map" onsubmit="return FormValid('','')">							<table border="0" cellpadding="0" cellspacing="0" width="100%" height="40px" align="left"> 
								<tr><br /> 
									<td width="10"></td> 
                                    <td valign="middle"> 
                                    	<table border="0" cellpadding="0" cellspacing="0"> 
										                                        	<tr> 
												<td align="left" width="300px"><div style="float:left "> 
														<div id="admin_fields1">Filter</div> 
                                                    
																									<input type="text" name="search" id="search" value="" class ="Filter_box"   />												                                                                                                        <div class="Search_Hint_txt">( Searches: Date_Stamp,Latitude,Longitude,Location_Summary)</div> 
                                                    	
													<div id="searchv" class="admin_valid_txt" ></div><div>&nbsp;</div>												</div></td> 
                                                
                                                												
										   												<td align="left" valign="top"> 
													<div class="submbg_top"><input type="submit" name="History_Map_Submit" id="History_Map_Submit" value="Search" class ="submit_but"   /><div class="submbg1"></div><div style="clear:both"></div> 
												</td></tr> 
															
											   												
										                                           	<tr> 
												<td align="left" width="300px"><div style="float:left "> 
														<div id="admin_fields1">From Date</div> 
                                                    
												                                                <script language="JavaScript" src="js/dcal.js"></script> 
                                                <link rel="stylesheet" href="css/dcal.css"> 
                                                <input type="text" name="From" id="From" value="10-05-2011 00:00" class ="Filter_box"   />                                                <div class="Top_Cal"><input type="button"  class="cal_st" onClick="displayCalendar(document.forms[0].From,'dd-mm-yyyy hh:ii',this,true)"></div> 
                                                <div class="date_format_top">( Format : dd/mm/yyyy hh:mm)</div> 
                                                                                                   	
													<div id="Fromv" class="admin_valid_txt" ></div><div>&nbsp;</div>												</div></td> 
                                                
                                                												
										                                           	<tr> 
												<td align="left" width="300px"><div style="float:left "> 
														<div id="admin_fields1">To Date</div> 
                                                    
												                                                <script language="JavaScript" src="js/dcal.js"></script> 
                                                <link rel="stylesheet" href="css/dcal.css"> 
                                                <input type="text" name="To" id="To" value="22-06-2011 23:59" class ="Filter_box"   />                                                <div class="Top_Cal"><input type="button"  class="cal_st" onClick="displayCalendar(document.forms[0].To,'dd-mm-yyyy hh:ii',this,true)"></div> 
                                                <div class="date_format_top">( Format : dd/mm/yyyy hh:mm)</div> 
                                                                                                   	
													<div id="Tov" class="admin_valid_txt" ></div><div>&nbsp;</div>												</div></td> 
                                                
                                                												
										    
                                           <input type="hidden" name="level" id="level" value="1" /> 
                                           </td> 
                                           </tr> 
                                           </table> 
                                        </td>   
									</form>	
                                                                        
						            <form name="List_Form"> 
                                        <td> 
                                        		<table border="0" cellpadding="0" cellspacing="0" width="260px" height="50px" align="right"> 
                                                	<tr>	
                                                    	                                                                                                            	<td class="icon-bor" align="center" width="60px"><a name="OptionExcel" href="http://113.193.238.176/onroadtrack/History_Map.php?XLS=1&search=&History_Map_Submit=Search&From=10-05-2011+00%3A00&To=22-06-2011+23%3A59&level=1" class="excel-icon" title="Excel" /><div class="icon-txt"><img src="./images/icon-48-article-add.png" height="32" width="32" /><div style="margin:2px 0 0 0;">Excel</div></div></a></td> 
														                                                    	<td class="icon-bor" align="center" width="60px"><a name="OptionExcel" href="javascript:window.print()" class="excel-icon" title="Print" /><div class="icon-txt"><img src="./images/icon-48-print.png" height="32" width="32" /><div style="margin:2px 0 0 0;">Print</div></div></a></td> 
													                                                    	
                                                    </tr> 
                                                </table> 
                                        </td> 
								</tr> 
							</table> 
					</td> 
				</tr> 
			</table> 
		</div> 
		<div style="clear:both"></div> 
</div> 
 
	
<div id="admin_div"  style="border:0px solid red;"> 
			<div style="padding-left:0px;"><span class="msg"></span> 
				<p class="headings" style="padding-left:10px;"></p> 
			
                <table border="0" cellpadding="1" cellspacing="1" width="100%" align="center"> 
				
 
				                
				<tr> 
					<td align="right" colspan="9"><div class="total_admin">Total Records : 17<br /></div></td>	
				</tr> 
				<!--    --------------------------------------------------------------------------------------------------------- --> 
 
 
		<tr> 
        	<td> 
            
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
                <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"> 
                  <head> 
                    <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
                    <title>Google Maps JavaScript API Example: Custom Icon</title> 
						<script type="text/javascript"> 
                        function createMarker(point,icon,data) {
                            var marker = new GMarker(point,icon); 
                            GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(data);  });  
                            return marker;
                        }
                        function initialize() 
                        {
                                      
                          var map = new GMap2(document.getElementById("map"));
                          map.addControl(new GLargeMapControl());
                          map.addControl(new GMapTypeControl());
                          map.addControl(new GScaleControl());
 				                
	var icon = new GIcon();			
 		  	icon.image = "./images/map_icons/grn.gif";
		  	icon.iconAnchor = new GPoint(10,10);
		  	icon.infoWindowAnchor = new GPoint(1, 1);
		  	map.setCenter(new GLatLng(12.700200, 79.973580),11);
		  	var point = new GLatLng(12.700200, 79.973580);
		  	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:49:30</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
		  	var label = new ELabel(new GLatLng(12.700200, 79.973580), "Start", "historylabel",new GSize(0,0));  
		  	map.addOverlay(label);										
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700203, 79.973558),11);
    	   	var point = new GLatLng(12.700203, 79.973558);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:50:30</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700203, 79.973558), "1", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700193, 79.973570),11);
    	   	var point = new GLatLng(12.700193, 79.973570);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:51:30</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700193, 79.973570), "2", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700217, 79.973540),11);
    	   	var point = new GLatLng(12.700217, 79.973540);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:52:37</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700217, 79.973540), "3", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700172, 79.973463),11);
    	   	var point = new GLatLng(12.700172, 79.973463);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:53:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700172, 79.973463), "4", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700232, 79.973530),11);
    	   	var point = new GLatLng(12.700232, 79.973530);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:54:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700232, 79.973530), "5", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700227, 79.973542),11);
    	   	var point = new GLatLng(12.700227, 79.973542);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:55:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700227, 79.973542), "6", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700218, 79.973553),11);
    	   	var point = new GLatLng(12.700218, 79.973553);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:56:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700218, 79.973553), "7", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700187, 79.973582),11);
    	   	var point = new GLatLng(12.700187, 79.973582);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:57:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700187, 79.973582), "8", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700138, 79.973632),11);
    	   	var point = new GLatLng(12.700138, 79.973632);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:58:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700138, 79.973632), "9", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700142, 79.973618),11);
    	   	var point = new GLatLng(12.700142, 79.973618);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 17:59:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700142, 79.973618), "10", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700145, 79.973607),11);
    	   	var point = new GLatLng(12.700145, 79.973607);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:00:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700145, 79.973607), "11", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700132, 79.973625),11);
    	   	var point = new GLatLng(12.700132, 79.973625);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:01:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700132, 79.973625), "12", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700120, 79.973647),11);
    	   	var point = new GLatLng(12.700120, 79.973647);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:02:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700120, 79.973647), "13", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700115, 79.973650),11);
    	   	var point = new GLatLng(12.700115, 79.973650);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:03:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700115, 79.973650), "14", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
        		icon.image = "./images/map_icons/blue.gif";				    	
           	icon.iconAnchor = new GPoint(10,10);
           	icon.infoWindowAnchor = new GPoint(1, 1);
    	   	map.setCenter(new GLatLng(12.700113, 79.973645),11);
    	   	var point = new GLatLng(12.700113, 79.973645);
    	   	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:04:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
    	   	var label = new ELabel(new GLatLng(12.700113, 79.973645), "15", "historylabel",new GSize(0,0));
    	   	map.addOverlay(label);
                
			
 		    icon.image = "./images/map_icons/red.gif";
		    icon.iconAnchor = new GPoint(10,10);
		    icon.infoWindowAnchor = new GPoint(1, 1);
		  	map.setCenter(new GLatLng(12.700110, 79.973648),11);
		  	var point = new GLatLng(12.700110, 79.973648);  		
		  	map.addOverlay(createMarker(point, icon,"<div><table cellpadding='3' cellspacing='3' class='mapwin' border='0'><tr><td align='left' valign='top' width='50px' colspan='2' style='color:red;'><b>Location Details</b></td></tr><tr><td align='left' valign='top' width='50px'><b>Vehicle</b></td><td>TN-09-BE-3296</td></tr><tr><td align='left' valign='top' width='50px'><b>Date</b></td><td align='left' valign='top'>17-May-2011 18:05:55</td></tr><tr><td align='left' valign='top'><b>Location</b></td><td align='left' valign='top'>State Highway 58  Chengalpattu  Tamil Nadu  India</td></tr></table></div>"));
		  	var label = new ELabel(new GLatLng(12.700110, 79.973648), "End", "historyend",new GSize(0,0));
		  	map.addOverlay(label);
  
					
                    }
                    </script> 
							</table> 
            </form> 
			<br /> 
</div> 
		</div>		
				<div style="clear:both"></div> 
		</div> 
                  </head> 
                  <body onLoad="initialize()" onUnload="GUnload()"> 
                    <div id="map" style="width: 100%; height: 600px"></div> 
                  </body> 
                </html> 
 
			</td> 
           </tr> 
			
  
                    </tr> 
                </table> 
        </td> 
     </tr> 
        <tr> 
            <td valign="top"> 
               <table border="0" width="1000px" height="20px" class="bodybg2"> 
                    <tr> 
                        <td> 
                            <div id="footer_home"> 
                            <p class="copyright1"> 
                                Copyright &copy; 2011 <a href="http://localhost/GPS/OnroadAdmin" target="_blank" class="home1">OnroadTrack.</a> All Rights Reserved. 
                            </p>	
                            </div> 
                        </td> 
					</tr> 
                </table>                            
			</td> 
        </tr> 
 </table>       
           
	
</div> 
</body> 
</html> 
	