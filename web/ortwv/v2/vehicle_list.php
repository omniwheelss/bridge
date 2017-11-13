
<link rel="stylesheet" type="text/css" href="css/menu1.css" /> 
<link rel="stylesheet" type="text/css" href="css/menu2.css" /> 
 
<input type="hidden" id="cdn-path" value="images/download.gif" /> 

 
<div class="content"> 

    <div id="left"> 
        <div id="navigation"> 
            <div class="pod_header"><p>VEHICLE LIST</p></div> 
            <ul class="main"> 
            
            
	<?php
    
        $DevReg_Query = "select * from DEVICE_REGISTER where Account_ID = '".$Cook_Account_ID."'";
        $DevReg_Query_Result = mysql_query($DevReg_Query) or die(mysql_error());
        $DevReg_Record_Count = mysql_num_rows($DevReg_Query_Result);
        if($DevReg_Record_Count>=1){
			$VL = 1;
            while($DevReg_Fetch_Result = mysql_fetch_array($DevReg_Query_Result)){
                $Vehicle_No = $DevReg_Fetch_Result['Vehicle_No'];
                $IMEI = $DevReg_Fetch_Result['IMEI'];

    
    ?>
            	<!-- Vehicle Details with submenu start -->

                <li id="nav_link_<?=$VL?>" class="main"> 
                <p id="vehicle-head"><?=$Vehicle_No?></p> 
         
                <div class="overlay" onmouseover="hide_allvehiclediv('allv_div')" onmouseout="show_allvehiclediv('allv_div')"> 
                    <a href="javascript:void()"><?=$Vehicle_No?></a></div> 
                    <div id="_<?=$VL?>" class="expansion_container"> 
                    <div class="expansion_body" onmouseover="hide_allvehiclediv('allv_div')" onmouseout="show_allvehiclediv('allv_div')"> 
                        <ul> 

                            <li class="main start" style="text-align:center; padding-right:20px;"> 
                            <strong>MAP</strong></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href='channel1.php?c1=<?=base64_encode($IMEI)?>'>Last Known Location</a></li> 

                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href="channel2.php?c1=<?=base64_encode($IMEI)?>">History Map</a></li> 
                            
                            <li class="main second-level" style="text-align:center; padding-right:20px;"> 
                            <strong>REPORTS</strong></li> 

                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href="channel3.php?c1=<?=base64_encode($IMEI)?>">History Location</a></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href="channel4.php?c1=<?=base64_encode($IMEI)?>">IDLE Report</a></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href="channel5.php?c1=<?=base64_encode($IMEI)?>">Stoppage History</a></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href="channel6.php?c1=<?=base64_encode($IMEI)?>">POI History</a></li> 
                        </ul> 
                    </div> 
                    <div class="expansion_bottom"> </div> 
                </div> 
                <span class="control arrow"> </span>
                </li> 
            	<!-- Vehicle Details with submenu end -->
    
	<?php
			$VL++;
			}
		}
	
	?>	    
             </ul>
         </div>    
		<div class="space-15"></div>         
    </div>


	<!-- For all vehicles -->	

	<div id="allv_div">
    <div id="left"> 
        <div id="navigation"> 
            <div class="pod_header"><p>INFO FOR All VEHICLE</p></div> 
            <ul class="main"> 
            
            

                <li id="nav_link_All" class="main"> 
                <p id="vehicle-head">REPORTS & MAP</p> 
         
                <div class="overlay"> 
                    <a href="javascript:void()">REPORTS & MAP</a></div> 
                    <div id="_All" class="expansion_container"> 
                    <div class="expansion_body"> 
                        <ul> 

                            <li class="main start" style="text-align:center; padding-right:20px;"> 
                            <strong>MAP</strong></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href='channel_all1.php'>Last Known Location</a></li> 

                            <li class="main start" style="text-align:center; padding-right:20px;"> 
                            <strong>POI</strong></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href='channel_all3.php'>Create POI</a></li> 

                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href='channel_all2.php'>User Marked POI</a></li> 

                            <li class="main start" style="text-align:center; padding-right:20px;"> 
                            <strong>Reports</strong></li> 
                            
                            <li class="main start"> 
                            <span class="control arrow"> </span> 
                            <a href='channel_all4.php'>POI Summary</a></li> 

                        </ul> 
                    </div> 
                    <div class="expansion_bottom"> </div> 
                </div> 
                <span class="control arrow"> </span>
                </li> 
            	<!-- Vehicle Details with submenu end -->
    
             </ul>
         </div>    
		<div class="space-15"></div>         
    </div>
	</div>


</div>
 

<script type="text/javascript" src="js/home1.js"> </script> 
<script type="text/javascript" src="js/home.js"> </script> 
