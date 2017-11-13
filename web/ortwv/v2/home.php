<?php
	// Include header File
	include_once("header1.php");
?>


    <div class="con-mid">

		<div class="con-left">
        
        	<script>
				//Show_Vehicle_List('vehicle-list-ajax.php','vehicle_ajax_img','Output_Div');
			</script>
            
            <?php
				include("vehicle_list.php");
			?>
             <div id="vehicle_ajax_img1"><img src="images/ajax-loading1.gif" width="32" height="32" /></div>
            <div id="Output_Div"></div>
        </div>

		<div class="con-right">
			
            <!-- Ajax Output Div -->        	
            <div id="Output_Div">
            

            </div>
            
        </div>
        
        
        <div class="group"></div>
    </div>
        

<?php
	// Include footer File
	include_once("footer.php");
?>
