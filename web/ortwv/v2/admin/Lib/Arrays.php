<?php
include_once("Connection.php");

######################################
#
#	Name 	 : User Type Array
#	Purpose	 : Basic Type of Users
#
############################################

$Utype_Array= array( 
				1 => 'User',
				2 => 'Client',
				3 => 'Admin'
			);

######################################
#
#	Name 	 : Staus Array
#	Purpose	 : User staus Active or InActive
#
############################################

$Status_Array = array( 
				1 => 'Active',
				2 => 'Not Active'
			);

$Status_Array1 = array( 
				'Enabled' => 'Enabled',
				'Disabled' => 'Disabled'
			);


######################################
#
#	Name 	 : Form Elements Array
#	Purpose	 : Form element type 
#
############################################

$Form_Element_Array = array( 
				1 => 'text',
				2 => 'password',
				3 => 'radio',
				4 => 'checkbox',
				5 => 'submit',
				6 => 'button',
				7 => 'hidden',
				8 => 'file',
			);

######################################
#
#	Name 	 : Date Format Array
#
############################################

$Date_Format_Array = array(
				1 => 'Y-m-d H:i:s',
				2 => 'd-m-Y H:i:s',
				3 => 'Y-m-d',
				4 => 'H:i:s',
				5 => 'd-m-Y',
				6 => 'd-M-Y'
			);
			
######################################
#
#	Gender Array
#
############################################

$Gender_Array = array(
				1 => 'Male',
				2 => 'Female'
			);


######################################
#
#	Name 	 : Form Elements Array
#	Purpose	 : Form element type 
#
############################################

$day_array = array( 

				1 => '1',

				2 => '2',

				3 => '3',

				4 => '4',

				5 => '5',

				6 => '6',

				7 => '7',

				8 => '8',

				9 => '9',

				10 => '10',

				11 => '11',

				12 => '12',

				13 => '13',

				14 => '14',

				15 => '15',

				16 => '16',

				17 => '17',

				18 => '18',

				19 => '19',

				20 => '20',

				21 => '21',

				22 => '22',

				23 => '23',

				24 => '24',

				25 => '25',

				26 => '26',

				27 => '27',

				28 => '28',

				29 => '29',

				30 => '30',

				31 => '31',

			);

$day1_array = array( 

				01 => '01',

				02 => '02',

				03 => '03',

				04 => '04',

				05 => '05',

				06 => '06',

				07 => '07',

				08 => '08',

				09 => '09',

				10 => '10',

				11 => '11',

				12 => '12',

				13 => '13',

				14 => '14',

				15 => '15',

				16 => '16',

				17 => '17',

				18 => '18',

				19 => '19',

				20 => '20',

				21 => '21',

				22 => '22',

				23 => '23',

				24 => '24',

				25 => '25',

				26 => '26',

				27 => '27',

				28 => '28',

				29 => '29',

				30 => '30',

				31 => '31',

			);

			

$month_array = array( 

				1 => 'Jan',

				2 => 'Feb',

				3 => 'Mar',

				4 => 'Apr',

				5 => 'May',

				6 => 'Jun',

				7 => 'Jul',

				8 => 'Aug',

				9 => 'Sep',

				10 => 'Oct',

				11 => 'Nov',

				12 => 'Dec',

			);



$month1_array = array( 

				01 => 'Jan',

				02 => 'Feb',

				03 => 'Mar',

				04 => 'Apr',

				05 => 'May',

				06 => 'Jun',

				07 => 'Jul',

				08 => 'Aug',

				09 => 'Sep',

				10 => 'Oct',

				11 => 'Nov',

				12 => 'Dec',

			);

for($i=date('Y'); $i<= date('Y')+1; $i++)

	$year_array["$i"] = "$i";



?>