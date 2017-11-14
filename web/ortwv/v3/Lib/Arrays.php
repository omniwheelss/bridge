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
				3 => 'Admin',
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


?>