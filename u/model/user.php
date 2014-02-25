<?php

  class user {
    public $userName;
	public $lastName;
	public $firstName;
	public $password;
	public $passwordconf;
	public $email;
	public $phone;

	public function setUserName($userName) {
		$this->userName = $userName;
	}
	public function getUserName() {
		return $this->userName;
	}
	
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	public function getLastName() {
		return $this->lastName;
	}
	
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function setPassword($password) {
	    $this->password = $password;
	}	
	public function getPassword() {
		return $this->password;
	}
	
	public function setPasswordconf($passwordconf) {
		$this->passwordconf = $passwordconf;
	}
	public function getPasswordconf() {
		return $this->passwordconf;
	}
	
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}
	
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	public function getPhone() {
		return $this->phone;
	}
  
  }



?>
