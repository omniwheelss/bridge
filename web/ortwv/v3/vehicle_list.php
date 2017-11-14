              <div class="wrapper" style="border:solid 0px red; float:left; width:180px; min-height:300px">
                <div class="ProductBox_ item_01  special" style="width:160px; border-right:solid 1px #CDCDCD">
                    <div class="new"></div>
                    <div class="lastProductImage">
                        <a href="#" title="elit sed"><img src="#" alt="Bronze"  height="178"/></a>
                    </div>
                    <div class="fright">
                       <div class="lastProductName"><b>VEHICLE LIST </b></div>
                        <!-- <div class="productPrice" style="height:20px"><em>VEHICLE LIST</em></div>-->
                        <div class="lastProductDesc">
                            <ul>
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
				                                <li><a href="home.php?c1=<?=base64_encode($IMEI)?>'"><?=$Vehicle_No?></a></li>
                                <?php
                                        $VL++;
                                        }
                                    }
									else{
			                                echo '<li><a href="#" style="color:red;">Vehicle Not Found</a></li>';
									}
                                
                                ?>	    
                                                           </ul>
                         </div>
                    </div>
                </div>
              </div>

            
