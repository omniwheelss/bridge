<?php

	function Geo_Fence_Func($Geo_Latitude , $Geo_Longitude){

		 ob_start(); error_reporting(0); 
		 include("Lib/Includes.php"); 

		$GeoFence_Sql  = 'SELECT * FROM GEO_FENCE';
		$GeoFence_Sql_Result = mysql_query($GeoFence_Sql);
		$GeoFence_Num = mysql_num_rows($GeoFence_Sql_Result);
		$i = 1;
		while ($GeoFence_Result = mysql_fetch_array($GeoFence_Sql_Result)) {
			$Radius = $GeoFence_Result['Radius'];
			$Lat = explode(".",$GeoFence_Result['Latitude']);
			$Lat1 = $Lat[1];
			$Latf = $Lat[0].".";
			$Lon = explode(".",$GeoFence_Result['Longitude']);
			$Lon1 = $Lon[1];
			$Lonf = $Lon[0].".";
			
			$Near = 1000 * $Radius;
			
			for($i = 1;$i <= $Near; $i++ ){
				// For Addition
				$Lat_Additon = $Lat[1]+$i;
				$LatAdd = $Lat_Additon;
			
				// For Subraction
				$Lat_Subraction = $Lat[1]-$i;
				$LatSub = $Lat_Subraction;
				
				$Lat_Remain = 6 - strlen($LatAdd);
				$Lat_Remain1 = 6 - strlen($LatSub);
	
				if(isset($LatAdd)){
					if($Lat_Remain == 4)
						$Lat3 = "0000".$LatAdd;
					if($Lat_Remain == 3)
						$Lat3 = "000".$LatAdd;
					if($Lat_Remain == 2)
						$Lat3 = "00".$LatAdd;
					if($Lat_Remain == 1)
						$Lat3 = "0".$LatAdd;
					if($Lat_Remain == 0)
						$Lat3 = $LatAdd;
				}
				if(isset($LatSub)){
					if($Lat_Remain1 == 4)
						$Lat5 = "0000".$LatSub;
					if($Lat_Remain1 == 3)
						$Lat5 = "000".$LatSub;
					if($Lat_Remain1 == 2)
						$Lat5 = "00".$LatSub;
					if($Lat_Remain1 == 1)
						$Lat5 = "0".$LatSub;
					if($Lat_Remain1 == 0)
						$Lat5 = $LatSub;
				}		
		
				// For Addition
				$Lon_Additon = $Lon[1]+$i;
				$LonAdd = $Lon_Additon;
			
				// For Subraction
				$Lon_Subraction = $Lon[1]-$i;
				$LonSub = $Lon_Subraction;
	
				$Lon_Remain = 6 - strlen($LonAdd);
				$Lon_Remain1 = 6 - strlen($LonSub);
	
				if(isset($LonAdd)){
					if($Lon_Remain == 4)
						$Lon3 = "0000".$LonAdd;
					if($Lon_Remain == 3)
						$Lon3 = "000".$LonAdd;
					if($Lon_Remain == 2)
						$Lon3 = "00".$LonAdd;
					if($Lon_Remain == 1)
						$Lon3 = "0".$LonAdd;
					if($Lon_Remain == 0)
						$Lon3 = $LonAdd;
				}
				if(isset($LonSub)){
					if($Lon_Remain1 == 4)
						$Lon5 = "0000".$LonSub;
					if($Lon_Remain1 == 3)
						$Lon5 = "000".$LonSub;
					if($Lon_Remain1 == 2)
						$Lon5 = "00".$LonSub;
					if($Lon_Remain1 == 1)
						$Lon5 = "0".$LonSub;
					if($Lon_Remain1 == 0)
						$Lon5 = $LonSub;
				}		
	
				$Lat_Add =$Latf."".$Lat3;
				$Lat_Sub =$Latf."".$Lat5;
	
				$Lon_Add =$Lonf."".$Lon3;
				$Lon_Sub =$Lonf."".$Lon5;
				
				$Lat_Long_Add[] =  $Lat_Add.",".$Lon_Add;
				$Lat_Long_Sub[] =  $Lat_Sub.",".$Lon_Sub;
				
				
	
			}
		  $i++;
		  
			echo $Geo_Lat_Long  =  $Geo_Latitude.",".$Geo_Longitude;
			
			if( (in_array($Geo_Lat_Long,$Lat_Long_Add)) || (in_array($Geo_Lat_Long,$Lat_Long_Sub)) ){
				echo "seeni";
			}
			else{
				echo "not there";
			}

				print_r($Lat_Long_Add);
				echo "<hr ><hr>";
				print_r($Lat_Long_Sub);

			
		}
		

	}
	
	
		Geo_Fence_Func(13.030418,80.233991);
		
 ?>
