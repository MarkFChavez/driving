<?php

include_once 'Models/UserModel.php';

class UserService {
	
	function __construct() {
		;
	}
	
	public function insertUser(UserModel $userModel){ //insert the user to the database
		if($this->determineIfEmailisTaken($userModel->getEmail()) == 0){ //determine if the email is already enrolled
			$query = sprintf("INSERT INTO `reservation_tbl`(`firstName`,`lastName`,`middleName`,`mobile`,`email`,`birthdate`) VALUES('%s','%s','%s'
			,'%s','%s','%s')",$userModel->getFirstName(),$userModel->getLastName(),$userModel->getMiddleName(),$userModel->getMobile(),$userModel->getEmail(), $userModel->getBirthday()		
			);
			
			if(mysql_query($query) or die(mysql_error())){//check if insertion to db is successful
				
				$data['success'] = 'Customer creation is a success'; 
				return $data;
			}else{
				
				$data['success'] = 'Error in customer creation'; 
				return $data;
			}
		}else{
				$data['userModel'] = $userModel;
				$data['success'] = 'Duplicate customer email'; 
				return $data;
		}
	}
	
	private function determineIfEmailisTaken($email){//check if email is already existing
		$query = sprintf("SELECT COUNT(*) AS 'existing' FROM `reservation_tbl` WHERE email ='%s'",$email);
		$result = mysql_query($query) or die(mysql_error());
		$existing = mysql_fetch_row($result);
		return $existing[0]; //return row count
	}
	
	
}