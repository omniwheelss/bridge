<?php
session_start();
ob_start();
require "config.php";



//EDIT these 4 variables
$table_name = "DEVICE_DATA"; //table name
$post_id = 1;
$now_showing = 3; //intially show 3 comments
$show_more = 200; //show next 3
$sort_field = "Record_Index"; //sorting field

//getting number of posts in a post id
$sql = "select * from $table_name";
$rsd = mysql_query($sql);
$total_cmts = mysql_num_rows($rsd);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Language" content="en-us">
<title>Post - More Comments</title>
<style>
body, td { margin: 0; padding: 4; font-family:Verdana; font-size:10px; }
#loading { position: absolute; text-align: center; font-family:Trebuchet MS; font-size:12px; color:#008000; font-weight:bold }
#more { text-transform: uppercase; color: #c2c2c2; cursor: pointer; }
div { padding: 2px; }
</style>
</head>
<body>
<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="600" id="table1">
		<tr>
			<td id="comments">
			<?php
			$sql2 = "select * from $table_name order by $sort_field desc limit $now_showing";
			$rsd2 = mysql_query($sql2);
			while($rs2 = mysql_fetch_array($rsd2))
			{
			?>
			<div><?=$rs2['IMEI']?></div>
			<?php
			} //while
			?>
			</td>
		</tr>
		<tr>
			<td>
			<span id="more">Show More</span>
			<div id="loading" style="position: absolute;">LOADING...</div>
			</td>
		</tr>
	</table>
	<form id="myForm">
		<input type="hidden" name="show_more" id="show_more" value="<?=$show_more?>" />
		<input type="hidden" name="table_name" id="table_name" value="<?=$table_name?>" />
		<input type="hidden" name="post_id" id="post_id" value="<?=$post_id?>" />
		<input type="hidden" name="now_showing" id="now_showing" value="<?=$now_showing?>" />
		<input type="hidden" name="sort_field" id="sort_field" value="<?=$sort_field?>" />
	</form>
	<input type="hidden" name="total_cmts" id="total_cmts" value="<?=$total_cmts?>" />
</div>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="show_more.js"></script>
</body>
</html>
</body>