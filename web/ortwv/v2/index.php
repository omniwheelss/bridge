<?php
	// Include header File
	include_once("header.php");
?>

	<div class="space-10"></div>

        
		<link rel="stylesheet" type="text/css" href="css/slicebox.css" />
	<script type="text/javascript" src="js/modernizr.custom.13303.js"></script>

		<div class="container">
			<div id="sb-slider" class="sb-slider">
				<img src="images/2.jpg" title="Truck Tracking" />
				<img src="images/3.jpg" title=""/>
				<img src="images/1.jpg" title="Car Tracking" />
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.slicebox.min.js"></script>
		<script type="text/javascript">
		
			$(function() {
				
				$('#sb-slider').slicebox({
					slicesCount			: 5,
					disperseFactor		: 30,
					sequentialRotation	: true,
					sequentialFactor	: 100,
					slideshow           : true

				});
				
				if( !Modernizr.csstransforms3d ) {
					$('#sb-note').show();
					
					$('#sb-examples > li:gt(2)').remove();
					
					$('body').append(
						$('script').attr( 'type', 'text/javascript' ).attr( 'src', 'js/jquery.easing.1.3.js' )
					);
				}	
			});
		</script>
        

	<div class="space-15"></div>
	<div class="space-15"></div>
    <!-- Content Middle -->
    <div class="con-mid">
    <!-- Content Left -->
	    <div class="con-left-home">
			<div class="space-15"></div>
        	<p class="home-content"><h2 class="home-head-txt">Gps Connect provides with a GPS location tracking or simply GPS tracking service for personal, business or professional use</h2></p>
        	<p class="home-head-txt1">Cellular phone emergency location services</p>
        	<p class="home-head-txt1">Find the people & knowledge you need to achieve your goalss</p>
        	<p class="home-head-txt1">Control your professional identity online</p>
        </div>
        
        <div class="group"></div>
    </div>
    

	<!-- For bottom Link -->

<?php
	// Include footer File
	include_once("footer.php");
?>
