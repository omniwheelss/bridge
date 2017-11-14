<?include_once("auth.php"); ?>
<?include_once("default.css"); ?>
<?include_once("include.php"); ?>
<?include_once("bg.php"); ?>
<?include_once("text.php");?>

<table border=0 cellspacing="0" cellpadding="0" align="center" width=100% height="20">
<tr>
<td bgcolor=#656160 width=100% height="30">
	<h1><? echo "$header10";?></h1>
</td>
</tr>
</table>
<br>
<center>
<?php
	$sql="select Map_API_Key from ACCOUNT_MAP where Account_ID='$Account_ID' and Map_API='google'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$MAP_API_KEY_GOOGLE = $row[0];	
?>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=true&amp;key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axS3bRtbJgZcfNsapcvaIX-2p6oahxTIqEy434JZQJHQwyfO5e0OyhgFdw" type="text/javascript"></script>
 <script type="text/javascript">
var map;
       

 function clearmap( mk )
 {
 document.getElementById("message").innerHTML = "" ;
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
	html = "<center><form method=POST action=app_create_geo_fence_2.php><fieldset><legend>Create Geo Fence</legend><label style='width: 85px;'><? echo $text118;?></label><input class=forminputtext name=Name type=text style='width: 100px;'><input class=forminputtext name=Point value='" + map.getCenter(point) +"' type=hidden><br><label style='width: 85px;'><? echo $text120;?></label><input type=checkbox name=Enable_Alerts value=yes><br><input class=forminputbutton type=submit value=Create><br></fieldset></form></center>";
	var marker = new createMarker(point,html);
	map.addOverlay(marker);
 }


 function createMarker(point,html) {
	var marker = new GMarker(point); 
	GEvent.addListener(marker, "click", function() {    marker.openInfoWindowHtml(html);  });  
	return marker;
 }


 </script>

 </head>
 <body>
 <body bgcolor="#eeeeee" text="black">
 <center>
 <table border=0 cellPadding=0 cellSpacing=0 width="100%" style="border: solid 3px #656160;">
 <tr>
 <td align=center>

 <table border=0 cellPadding=0 cellSpacing=0 bgcolor=#CECEFF>
 <tr>
 <td bgcolor="#000000">
 <script language="javascript">
 
 if( window.innerHeight ) {
	 var width = window.innerWidth - 290 ;
	 var height = window.innerHeight - 130 ; 
 } else {
	 var width = document.documentElement.offsetWidth - 300 ;
	 var height = document.documentElement.offsetHeight - 100 ; 
 }
 document.write('<div id="map" style="width: ' + width + 'px; height:' + height + 'px">') ;
 
 </script>
 </div>
 </td>
 <form name=cf onSubmit="javascript:return false;">
 <td align=left valign=top>
 <div id="form">
 <center>
 <h2><? echo $text13;?></h2>
 <h4><? echo $text14;?></h4>
 <input type=BUTTON value="Clear" onClick="clearmap(cf)" name="CLEARBUTTON" class="forminputbutton" >
 </form>
 </center>
 <br> 
<center>
<form method=POST action=app_create_geo_fence_2.php>
 <fieldset width: 210px;>
 	<legend>&nbsp;Mark Location&nbsp;</legend>
 	<label style="width: 85px;"><? echo $text118;?></label>
 	<input class=forminputtext name=Name type=text style="width: 100px;">
 	<br>
 	<label style="width: 85px;"><? echo $text121;?></label>
 	<input class=forminputtext name=Latitude type=text style="width: 100px;">
 	<br>
 	<label style="width: 85px;"><? echo $text122;?></label>
 	<input class=forminputtext name=Longitude type=text style="width: 100px;">
 	<br>
 	<label style="width: 85px;"><? echo $text120;?></label>
 	<input style="width: 100px;" type="checkbox" name="Enable_Alerts" value="yes">
 	<br>
 	<input class=forminputbutton type=submit value=Mark>
 </fieldset>
 </form>
 </center>
 </div>
 </td>

 <div id="message">
 </div>
 </tr>
 </table>
 </td>
 </tr>
 </table>
 </center> 
 

 
 <script language="javascript">
 var lastclick = "" ;				// Last Clicked Point
 var map = new GMap2(document.getElementById("map"),{googleBarOptions: {showOnLoad: true}});
 map.enableGoogleBar();
 map.addControl(new GLargeMapControl());
 map.addControl(new GMapTypeControl()); 
 var icon = new GIcon();
 icon.image = "images/map_icons/1/grn.gif";
 icon.iconAnchor = new GPoint(10,10);
 icon.infoWindowAnchor = new GPoint(1, 1);
 <?
 // Query last known position of any device in the account to center map
$sql="select Latitude,Longitude from GEO_FENCE where Account_ID='$Account_ID' limit 1";	
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
if (strlen($row[1])==0 && strlen($row[0])==0){
	$row[0]=13.45;
	$row[1]=77.56;
}
?>
 var point = new GLatLng(<? echo $row[0];?>, <? echo $row[1];?>);
 map.setCenter(point, 5);           
 GEvent.addListener(map, 'click', function(overlay, point)
 {
 if (overlay) { } else if (point) { checkclick( point ) ;
 }
 });
 
 </script>

