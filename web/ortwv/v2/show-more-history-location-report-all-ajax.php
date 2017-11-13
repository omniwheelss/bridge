<?php
	session_start();
	extract($_REQUEST);
	ob_start(); error_reporting(0); 
	 include("Lib/Includes.php"); 
?>

<?php
	if(empty($_COOKIE[$Cook_Name])){
		header("Location: index.php");
		exit;
	}
?>
<?php 
	$Cook_Variable = explode("|",$_COOKIE[$Cook_Name]);
	$Cook_Username = $Cook_Variable[0];
	$Cook_Account_ID = $Cook_Variable[1];
	$Cook_User_Type_ID = $Cook_Variable[2];
?>

	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jq1.js"></script>
    <script type="text/javascript" src="js/jscript.js"></script>

<?php

	//get table contents
	$start = $Initial_Display+1;
	$Ajax_Sql = "select * from DEVICE_DATA_VIEW where Account_ID = '".$Cook_Account_ID."' and Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' order by $Order_By asc limit $start,$Show_More";
	$Ajax_Result = mysql_query($Ajax_Sql) or die (mysql_error());
	$Ajax_Count = mysql_num_rows($Ajax_Result);
	if($Ajax_Count < $Show_More){
	?>
		<script>$('#show-more-img').hide()</script>
     <?php   
	}
?>

<div id="content">
    <table border="0" cellpadding="1" cellspacing="1"  class="report-tab-bg" style="border-top:0px; border-top-color:#FFFFFF" align="left" width="100%">

	<?php
	$sno = $start;
    while($Ajax_Record = mysql_fetch_array($Ajax_Result)){
		$Location_Summary = $Ajax_Record['Location_Summary'];
		$Date_Stamp = date("d-m-Y",strtotime($Ajax_Record['Date_Stamp']));
		$Time_Stamp = date("H:i:s",strtotime($Ajax_Record['Date_Stamp']));
		if($Ajax_Record['Speed'] == 0)
			$Status = 'Stopped';
		if($Ajax_Record['Speed'] > 0)
			$Status = 'Moving';
		$Location_Summary = $Ajax_Record['Location_Summary'];
		$Speed = $Ajax_Record['Speed'];
	
    ?>
        <tr bgcolor="#CCCCCC">
            <td class="report-loc-txt" width="5%"><?=$sno?></td>
            <td class="report-loc-txt" width="57%"><?=$Location_Summary?></td>
            <td class="report-loc-txt" width="10%"><?=$Date_Stamp?></td>
            <td class="report-loc-txt" width="10%"><?=$Time_Stamp?></td>
            <td class="report-loc-txt" width="8%"><?=$Status?></td>
            <td class="report-loc-txt" width="10%"><?=$Speed?> Kmph</td>
        </tr>
    <?php
		$sno++;
    } //while
    ?>
</div>
