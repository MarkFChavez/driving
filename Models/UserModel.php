<?php

class UserModel {
	
	private $lastName;
	private $firstName;
	private $middleName;
	private $birthdate;
	private $mobile;
	private $email;
	private $reservationDate;

	public function populateModel($data) {
		$this->setFirstName($data['firstName']);
		$this->setLastName($data['lastName']);
		$this->setMiddleName($data['middleName']);
		$this->setAge($data['mobile']);
		$this->setBirthday($data['birthdate']);
		$this->setEmail($data['email']);
		$this->setReservationDate($data['reservationDate']);		
		
		return $this->validateData($data);
	}
	
	public function __construct() {
			
	}
	
	public function setFirstName($firstName){
		$this->firstName = $this->cleanString($firstName);
	}
	
	public function setLastName($lastName){
		$this->lastName = $this->cleanString($lastName);
	}
	
	public function setMiddleName($middleName){
		$this->middleName = $this->cleanString($middleName);
	}
	
	public function setAge($mobile){
		$this->mobile = $this->cleanString($mobile);
	}
	
	public function setBirthday($birthday){
		$this->birthdate = $this->cleanString($birthday);
	}
	
	public function setEmail($email){
		$this->email = $this->cleanString($email);
	}
	
	public function setReservationDate($date){
		$this->reservationDate = $this->cleanString($date);
	}
	
	public function getFirstName(){return $this->firstName;}
	
	public function getMiddleName(){return $this->middleName;}

	public function getLastName(){return $this->lastName;}
	
	public function getMobile(){return $this->mobile;}
	
	public function getBirthday(){return $this->birthdate;}
	
	public function getEmail(){return $this->email;}
	
	public function getReservationDate(){return $this->reservationDate;}
	
	#Below are the validation and cleaning methods
	
	private function validateData($data){//validate if all fields are populated and and if mobile is of numeric type
		$errorData = array();
		foreach($data as $item => $key){
			$currentVariable = trim($data[$item]); //trim content
			if(empty($currentVariable)){ //check if variable has a value
				$errorData[$item] = "$item is empty";	
			}else{
				if($item === "mobile" && !is_numeric($data[$item])){ //check if mobile is numeric
					$errorData[$item] = "Mobile number is invalid";
				}elseif($item === "birthday"){
					$date = date_parse($data[$item]);
					if (!checkdate($date["month"], $date["day"], $date["year"])){
						    $errorData[$item] =  "Invalid birthdate";    
					}
				}
			}
		}
		return $errorData;
	}
	
	private function cleanString($value){ //makes the values db friendly
		return mysql_real_escape_string($value);
	}
}