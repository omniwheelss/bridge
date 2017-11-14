<?php include("header.php"); ?>

<?php
if( $_REQUEST['action'] == 'do'){

		setcookie($Cook_Name,"",time()-345);
		header("Location: index.php");
		exit;
}
?>