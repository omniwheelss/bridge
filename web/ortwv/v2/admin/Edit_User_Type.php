<?php
	
	####################################
	#	// For Text fields
	#	$Form_Fields[]= array($Element_Type,$Field_Type,$Field_Heading,$Field_Name,$Field_Value,$Manditary,$JValid,$Extra,$Class_Name,$Calender,$Editor);
	#	// Example Data
	#	$Form_Fields[]= array(1,1,Username,User_Name,'',*,E|N,'Style="color:red;"','Txt_box','Cal','E');
	
	
	#	// For Select Event
	#	$Form_Fields[]= array($Element_Type,$Field_Type,$Field_Heading,$Field_Name,$Field_Value,$Manditary,$JValid,$Class_Name,$Extra,$Combo_Title,$Match);
	#	// For Select Example
	#	$Form_Fields[] = array('2','2','Category','cat_id',$Status_Array,'*','1','selectcls','Style="color:red;"','-----Category-----','');
	
	#	$Element_Type 1 => 'text','password','radio',checkbox','submit','button','hidden','file','textarea'
	#	$Element_Type 2 => Dropdown - Select
	
	#	$Field_Type 1 => 'text',
	#	$Field_Type 2 => 'password',
	#	$Field_Type 3 => 'radio',
	#	$Field_Type 4 => 'checkbox',
	#	$Field_Type 5 => 'submit',
	#	$Field_Type 6 => 'button',
	#	$Field_Type 7 => 'hidden',
	#	$Field_Type 8 => 'file'
	
	#	$Manditary = '*' or ''
	#	$JValid = 'E|N' or 'E' or 'N'
	#	$Empty = leave it as empty fields
	#	$Extra = anything you can add for that field ex : style='color:#33333' or onlick = jfunc()
	#	$Calender = 'Cal' or 'Cal_T' [Cal - Calender without time  ---  Cal_T - Calender with time ]
	#	$Editor = 'E' or '' [ Html text Editor  ]
	#	$Combo_Title = Dropdown Title
	#	$Match = which value we want to match and will selected too.

	# 	$Photo_Fields[] = array($Photo_Field_Name,$Target_Folder_Path,$Thumb_Img_Folder_Path,$Img_Width,$Img_Height,$Img_Name_Unique_Id,$Content_Type);
	#	$Photo_Fields[$Photo_Field_Name] = array("pho","big","thumb",100,'','Yes','I|F');
	
	#	$Img_Name_Unique_Id = 'Yes' or ''
	#	$Content_Type = I or F
	#	Yes - It will take last insert record id from table and store with that name Ex : 123_Field_Name.jpg [Actual image name winter.jpg]
	#	I - Image file
	#	F - File Content

	#
	################################################



	include("Header.php");
	$Title_Head = str_replace('.php','',basename($_SERVER['SCRIPT_NAME']));
	$Submit_Txt = $Title_Head."_Submit";
	$List_Page = str_replace('Edit','List',$Title_Head);
	$Current_Page = str_replace('Add','List',$Title_Head);
	$Edit_Record = $_REQUEST['Edit'];
	$Edit_Column = $_REQUEST['Edit_Column'];
	
	if(empty($_COOKIE[$Cook_Name]) && $Cook_Varible[2] == 3){
		header("Location: index.php");
		exit;
	}

	############################################
	#
	# variable Declaration
	#
	############################################

	$Table_Name = "USER_TYPE";
	$Duplicate_Column = "";
	
	//Text boxes
	$Form_Fields[] = array('1','1','User Type','User_Type','','*','E|N|0','','txtbox','','');
	$Form_Fields[] = array('1','1','Description','User_Type_Description','','*','E|N|0','','txtbox','','');

	//Submit Button
	$Form_Fields[] = array('1','5','',$Submit_Txt,'Update','','','','submit_but','');

	// Join query - 
	$Query_To_Mysql_Join = "";


	###############################################     End      #########################################

	
	// Javascript Validation	
	foreach($Form_Fields as $Forms){
		if($Forms[5] == '*'){
			$Jvalid_Arr[$Forms[3]].=$Forms[3].",";
			$Jvalid_Type_Arr[$Forms[6]].=$Forms[6].",";
		}
		// Editor Enabled
		if($Forms[10] == 'E'){
			$Editor = 'Yes';
		}
	}
	$Jvalid_Arr_Join = substr(join('',$Jvalid_Arr),0,-1);
	$Jvalid_Type_Arr_Join = substr(join('',$Jvalid_Type_Arr),0,-1);
	
	// Call Editor Enable Function
	if($Editor == 'Yes'){
		HTML_Editor();
	}

	// After submit
	$Submit_Pos =count($Form_Fields) - 1;
	if(isset($_REQUEST[$Form_Fields[$Submit_Pos][3]])){
		$v =  0;
		$Record_Count == 0;
		foreach($Form_Fields as $Forms){
			
			if($Forms[1] != 5 && $Forms[1] != 6 && $Forms[1] != 8){
			
				if($Forms[9] == 'Cal_T')
					$_REQUEST[$Forms[3]] =  date("Y-m-d H:i",strtotime($_REQUEST[$Forms[3]]));
				if($Forms[9] == 'Cal')
					$_REQUEST[$Forms[3]] =  date("Y-m-d",strtotime($_REQUEST[$Forms[3]]));
					
				$Forms_Field_Val[$Forms[3]] = $_REQUEST[$Forms[3]];
				$Query_For_Update.= $Forms[3]." = '".$_REQUEST[$Forms[3]]."'".",";
			}	
			$v++;	
		}
		if($Record_Count == 0){
				$Query_To_Mysql = "Update $Table_Name set ".substr($Query_For_Update,0,-1)." where ".$Edit_Column." = '".$Edit_Record."'";
				$Query_To_Mysql_Result = mysql_query($Query_To_Mysql);
				
				if(!$Query_To_Mysql_Result){
					echo $Err_Msg = Message_Display("Mysql Error :");
					echo $Err_Msg = "<div class='error_text1'>".mysql_error()."</div>";
				}
				if($Query_To_Mysql_Result){
					foreach($Photo_Fields as $Photo){
						// For Update File Content
						if($Photo[6] == 'F'){
						
							$Open_Dir = opendir($Photo[1]);
							while(false != ($File_Con = readdir($Open_Dir))){
								if(($File_Con != ".") and ($File_Con != "..")){
									$DirFiles_Array = $File_Con;
									$Check_Pos = strpos($File_Con, $Edit_Record."_".$Photo[0]."_")."I";
									
										if( ($Check_Pos == '0I') ) {
											$Img_Info = $_FILES[$Photo[0]];
											$Img_Name = $Img_Info['name'];
											if(!empty($Img_Name)){
												$Exist_Upload = ''.$Photo[1].'/'.$DirFiles_Array.'';
												$New_Upload = ''.$Photo[1].'/'.$Edit_Record.'_'.$Photo[0].'_'.$Img_Name.'';
												unlink($Exist_Upload);
												CreateThumbs($Photo[0],$Photo[1],$Photo[2],$Photo[3],$Photo[4],$Edit_Record,$Sequence = $Photo[0]);
											}	
										}
								}
							}											

						}
						// For Update Photo 
						if($Photo[6] != 'F'){
								$Edit_Img_File = "".$Photo[2]."/".$Img_Thumb_Prefix."".$Edit_Record."_".$Photo[0].".jpg";
								CreateThumbs($Photo[0],$Photo[1],$Photo[2],$Photo[3],$Photo[4],$Edit_Record,$Sequence = $Photo[0]);
						}	
					}
					$Msg = urlencode("Record has been updated successfully");
					$Title_Head1 = str_replace('_',' ',$Title_Head);
					Update_Query_Executer($Cook_Variable[1],''.$Title_Head1.' <b>'.$_REQUEST['Edit'].'</b> Updated Successfully');
					header("Location:$List_Page.php?msg=$Msg");
					exit;
				}
		}
	}
?>

<?php
		if(isset($Edit_Record)){
		
		$Select_Query = "select * from $Table_Name where $Edit_Column = $Edit_Record";
		$Select_Result = mysql_query($Select_Query);
		$Select_Count = mysql_num_rows($Select_Result);
		if($Select_Count == 0){
			$Err_Msg =  "There is no records corresponding date and time you given";
		}
		else{	
				$Get_Record = mysql_fetch_array($Select_Result);
			echo "<form action=\"\" method=\"post\" name=\"".$Title_Head."\" onsubmit=\"return FormValid('$Jvalid_Arr_Join','$Jvalid_Type_Arr_Join')\" enctype=\"multipart/form-data\" >";
			
				echo '<div id="admin_left" style="width:990px; border:solid 0px red;">
							<p class="headings" style="padding-left:10px;">'.$Title_Head.'</p>
							<p>&nbsp;</p>';
				$F = 1;			
				foreach($Form_Fields as $Forms){
				// For select Box
					if($Forms[0] == 2 && $Forms[1] == 2){
						 ?>						
					<div id="admin_left_inner">
							<div id="admin_fields"><?=($Forms[2] != ''?$Forms[2] : $Forms[3])?><?=($Forms[5] == '*'?$star : '')?></div>
						<?=Func_Select_Element($Forms[0],$Forms[1],$Forms[3],$Forms[4],$Forms[7],$Forms[8],$Forms[9],$Get_Record[$Forms[3]]);?>
						<?=J_Mes($Forms[3]);?>
					</div>

	               <? }elseif($Forms[1] == 5 || $Forms[1] == 6){
						// For Submit boxes
					?>
                       <table border="0" cellpadding="3" cellspacing="3"><tr><td><div id="admin_left_inner">
                            <div class="submbg" style="margin-left:220px;"><?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Forms[4],$Forms[8],$Forms[7]);?><div class="submbg1"></div><div style="clear:both"></div></div></td></tr></table>
                    			
	               <? }else{
						// For Text boxes
					?>
                    
                    
					<div id="admin_left_inner">
		                    <?
                    		if($Forms[1] != 7){ // Hidden Field Checking
							?>
							<div id="admin_fields"><?=($Forms[2] != ''?$Forms[2] : $Forms[3])?><?=($Forms[5] == '*'?$star : '')?></div>
                            <?
							}
							?>
                            
							<?
								// For Calendar Enabled Field
                            if($Forms[9] == 'Cal'){
    	                    ?>
                             <script language="JavaScript" src="js/calendar_us.js"></script>
                            <link rel="stylesheet" href="css/calendar.css">
                            <?
								//Change Calender format
								$Get_Record[$Forms[3]] = date("m/d/Y",strtotime($Get_Record[$Forms[3]]));
                            ?>
                            <?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Get_Record[$Forms[3]],$Forms[8],$Forms[7]);?>
								<script language="JavaScript">
                                new tcal ({
                                    // form name
                                    'formname': '<?=$Title_Head?>',
                                    // input name
                                    'controlname': '<?=$Forms[3]?>'
                                });
                                </script><span class="date_format">( Format : mm/dd/yyyy )</span>
                            <br /><br />
                           <?
                            }
								// For Calendar Enabled Field
                            elseif($Forms[9] == 'Cal_T'){
    	                    ?>
                            <script language="JavaScript" src="js/dcal.js"></script>
                            <link rel="stylesheet" href="css/dcal.css">
                            <?
								//Change Calender format
								$Get_Record[$Forms[3]] = date("d-m-Y H:i",strtotime($Get_Record[$Forms[3]]));
                            ?>

                            <?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Get_Record[$Forms[3]],$Forms[8],$Forms[7]);?>
							<input type="button"  class="cal_st" onClick="displayCalendar(document.forms[0].<?=$Forms[3]?>,'dd-mm-yyyy hh:ii',this,true)">                             
							<span class="date_format">( Format : dd-mm-yyyy hh:mm )</span>
                            <br /><br />
                           <?
                            }
                            else{
									// For Radio Button
									if($Forms[1] == 3){
										$Radio_Fileds = explode('|',$Forms[4]);
										$Ra = 0;
										foreach($Radio_Fileds as $Radio_Name){

										?>
											<?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Radio_Name,$Forms[8],$Forms[7],$Get_Record[$Forms[3]]);?><?=$Radio_Name?>
                                        <?    
										}
                                            echo "<br /><br />";
									}
									// For Checkbox
									elseif($Forms[1] == 4){
										?>
											<?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Get_Record[$Forms[3]],$Forms[8],$Forms[7],$Get_Record[$Forms[3]]);?> <?=$Forms[4]?>
                                        <?    
									}
									else{	
                            			// For normal form fields 
                            ?>
										<?=Func_Forms_Element($Forms[0],$Forms[1],$Forms[3],$Get_Record[$Forms[3]],$Forms[8],$Forms[7]);?>
                                        <?=J_Mes($Forms[3]);?>

									<?php
                                        if($Forms[1] == 8){
											// For File Display
											if($Photo_Fields[$Forms[3]][6] == 'F'){
												$Open_Dir = opendir($Photo_Fields[$Forms[3]][1]);
												while(false != ($File_Con = readdir($Open_Dir))){
													if(($File_Con != ".") and ($File_Con != "..")){
														$DirFiles_Array = $File_Con;
														$Check_Pos = strpos($File_Con, $Edit_Record."_".$Photo_Fields[$Forms[3]][0]."_")."I";
														
															if( ($Check_Pos == '0I') ) {
																echo $File_View = '<div class="File_Edit"><a href="'.$Photo_Fields[$Forms[3]][1].'/'.$DirFiles_Array.'" target="_New" class="File_Con">'.$DirFiles_Array.'</a></div>';															}
													}
												}
											}	
											
											// For Photo Display
											if($Photo_Fields[$Forms[3]][6] == 'I'){
											
												$Photo_Path = "./".$Photo_Fields[$Forms[3]][2]."/".$Img_Thumb_Prefix."".$Edit_Record."_".$Forms[3].".jpg";
												if(file_exists($Photo_Path)){
													echo $Photo_View = '<a href="'.$Photo_Fields[$Forms[3]][1].'/'.$Img_Big_Prefix.''.$Edit_Record.'_'.$Forms[3].'.jpg" target="_New"><img src="'.$Photo_Path.'" /></a>';
												}

											
												if(file_exists("".$Photo_Fields[$Forms[3]][1]."/".$Img_Thumb_Prefix."".$Edit_Record."_".$Forms[3].".jpg")){
												
													echo '<br /><a href="'.$Photo_Fields[$Forms[3]][1].'/'.$Img_Big_Prefix.''.$Edit_Record.'_'.$Forms[3].'.jpg" target="_New"><img src="'.$Photo_Fields[0][1].'/'.$Img_Thumb_Prefix.''.$Edit_Record.'_'.$Forms[3].'.jpg" /></a><br /><br />';
												}
											}	
                                        }
                                    ?>

                                
                                	<?
									}
									?>
									
                                    
                            <?
                            }
                            ?>
					</div>
                    
                    
	               <? } ?>
                    
               <? } ?> 
	<? } ?>					
	
				</div></div><br />
		</form>
	  </div> 
				 <div style="clear:both"></div>
</div>	  
					<p>&nbsp;</p>
				
<?php  } ?>				

<?php include_once("Footer.php"); ?>

