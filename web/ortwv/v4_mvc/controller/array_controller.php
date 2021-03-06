<?php

require_once 'model/common_service.php';

class ArrayController
{

	private $CommonService = NULL;
	
	//Invoke model to access all the methods
	public function __construct()
	{
		$this->CommonService = new CommonService();
	}

	
	###	Arrays to use for all the pages
	###	Created : 20/10/2016
	###	Modified : 17/11/2016
	public function array_func($do) {
		
		$general_array[] = null;
		// Example data to pull the data from database
		switch ($do) {
			
			case 'user_type':
				$general_array = $this->CommonService->array_func_db('id','user_type','user_type','');
			break; 
			
			case 'user_wol':
				$general_array = $this->CommonService->array_func_db("user_account_id","concat(firstname,' ',lastname)","vw_users", "account_status ='active' and user_type_id is null ");
			break; 
			
			case 'users':
				$general_array = $this->CommonService->array_func_db("user_account_id","concat(firstname,' ',lastname)","vw_users", "");
			break; 
		
			case 'user_expiry':
				$general_array = $this->CommonService->array_func_db("user_account_id","id","user_expiry", "status = 'active' order by id desc limit 1");
			break; 
		
			case 'gender_array':
				$general_array = array( 
					'Male' => 'Male',
					'Female' => 'Female'
				);
			break;	
		
		}	
	


	
	
	
	
	
		/** Dont change anything below *****/
		return $general_array;
	}
	

		
}

?>