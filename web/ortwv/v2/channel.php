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
            
            <?php
			// Current Location Map				
			
			if(base64_decode($_SERVER['QUERY_STRING']) == 'map.current'){
				include("map.current.php?action=yes");
			}
				
			?>

            </div>
            
        </div>
        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
