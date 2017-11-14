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
	<link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/jq1.js"></script>
    <script type="text/javascript" src="js/jscript.js"></script>

<?php

	//get table contents
	$start = $Initial_Display+1;
	$Ajax_Sql = "SELECT * FROM STARTSTOP_SUMMARY_VIEW where IMEI = '".$IMEI."' and ( Start_Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' and Start_IGN = '0' ) or  ( End_Date_Stamp between '".$Start_Datetime."' and '".$End_Datetime."' and End_IGN = '0') and Start_IGN = '0' order by $Order_By asc limit $start,$Show_More";
	$Ajax_Result = mysql_query($Ajax_Sql) or die (mysql_error());
?>

<div id="content">
    <table border="0" cellpadding="1" cellspacing="1"  class="report-tab-bg" style="border:0px;" align="left" width="100%">

	<?php
	$sno = $start;
    while($Ajax_Record = mysql_fetch_array($Ajax_Result)){
	
		$Start_Location_Summary = $Sel_Record['Start_Location_Summary'];
		$Start_Date_Stamp = date("d-m-Y",strtotime($Sel_Record['Start_Date_Stamp']));
		$Start_Time_Stamp = date("H:i:s",strtotime($Sel_Record['Start_Date_Stamp']));
		$Start_DateTime_Stamp = date("d-m-Y H:i:s",strtotime($Sel_Record['Start_Date_Stamp']));
		$End_Date_Stamp = date("d-m-Y",strtotime($Sel_Record['End_Date_Stamp']));
		$End_Time_Stamp = date("H:i:s",strtotime($Sel_Record['End_Date_Stamp']));
		$End_DateTime_Stamp = date("d-m-Y H:i:s",strtotime($Sel_Record['End_Date_Stamp']));
		$Date_Stamp_Info = get_time_difference($Start_DateTime_Stamp,$End_DateTime_Stamp);
		$Date_Stamp_Info_hours = $Date_Stamp_Info['hours'];
		$Date_Stamp_Info_minutes = $Date_Stamp_Info['minutes'];
		$Date_Stamp_Info_seconds = $Date_Stamp_Info['seconds'];

		// For hours
		if(strlen($Date_Stamp_Info_hours) == 1)
			$Date_Stamp_Info_hours = "0".$Date_Stamp_Info_hours;
		else
			$Date_Stamp_Info_hours = $Date_Stamp_Info['hours'];
			
		// For minutes
		if(strlen($Date_Stamp_Info_minutes) == 1)
			$Date_Stamp_Info_minutes = "0".$Date_Stamp_Info_minutes;
		else
			$Date_Stamp_Info_minutes = $Date_Stamp_Info['minutes'];
			
		// For seconds
		if(strlen($Date_Stamp_Info_seconds) == 1)
			$Date_Stamp_Info_seconds = "0".$Date_Stamp_Info_seconds;
		else
			$Date_Stamp_Info_seconds = $Date_Stamp_Info['seconds'];
		
		if($Date_Stamp_Info['days'] < 0)
				$Days_Info = $Date_Stamp_Info['days']." day(s) and";
		$Total_Time = "".$Days_Info." ".$Date_Stamp_Info_hours.":".$Date_Stamp_Info_minutes.":".$Date_Stamp_Info_seconds; 
	
    ?>
        <tr bgcolor="#CCCCCC">
            <td class="report-loc-txt" width="5%"><?=$sno?></td>
            <td class="report-loc-txt" width="55%"><?=$Start_Location_Summary?></td>
            <td class="report-loc-txt" width="10%"><?=$Start_Date_Stamp?>&nbsp;&nbsp;<?=$Start_Time_Stamp?></td>
            <td class="report-loc-txt" width="10%"><?=$End_Date_Stamp?>&nbsp;&nbsp;<?=$End_Time_Stamp?></td>
            <td class="report-loc-txt" width="10%"><?=$Total_Time?></td>
        </tr>
    <?php
		$sno++;
    } //while
    ?>
</div>
