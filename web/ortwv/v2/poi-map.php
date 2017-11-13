</head>
<body>


<br>
<center>
<script src="http://maps.google.com/maps?file=api&v=2&sensor=true&key=ABQIAAAAMgjb-wqoTuqqzc8PTVZ8axS3bRtbJgZcfNsapcvaIX-2p6oahxTIqEy434JZQJHQwyfO5e0OyhgFdw" type="text/javascript"></script>
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
alert(point);
 if ( lastclick != point ) {
 	 lastclick = point ;
 	 var zoomlvl = map.getZoom();
	 fc( point, zoomlvl) ;
 	}

 }

 
 function fc( point, zoomlvl ) {
	var html = "";
	map.setCenter(point, zoomlvl);
	html = "<center><form method=POST action=app_create_geo_fence_2.php><fieldset><legend>Create Geo Fence</legend><label style='width: 85px;'>Name</label><input class=forminputtext name=Name type=text style='width: 100px;'><input class=forminputtext name=Point value='" + map.getCenter(point) +"' type=hidden><br><label style='width: 85px;'>Enable Alerts</label><input type=checkbox name=Enable_Alerts value=yes><br><input class=forminputbutton type=submit value=Create><br></fieldset></form></center>";
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

 <div id="message">
 </div>
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
  var point = new GLatLng(12.9584183, 77.5713983);
 map.setCenter(point, 5);           
 GEvent.addListener(map, 'click', function(overlay, point)
 {
 if (overlay) { } else if (point) { checkclick( point ) ;
 }
 });
 
 </script>

