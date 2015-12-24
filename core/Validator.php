<?php

class Validator{

	public $errors = array();

	public $defaultErrorMessage = array(
		'email'=>'Invalid email address',
		'empty'=>"Field Required",
		'minlength'=>'',
		'maxslength'=>'',
		'same'=>'Fields not matching'

		);


	public function setErrorMessage($feild,$rule,$errorMessage=false){

		if(!isset($this->errors[$feild])){
			
			$this->errors[$feild] = $errorMessage ? $errorMessage : $this->defaultErrorMessage[$rule];
		}

	}


	public  function isEmail($feiledname,$email,$customError=false){

		if(filter_var($email,FILTER_VALIDATE_EMAIL)){

			return true;
		}

		$this->setErrorMessage($feiledname,"email",$customError);
		return false;
	}

	public  function notEmpty($feiledname,$data,$customError = false){

		if(!empty($data)){
			return true;
		}

		$this->setErrorMessage($feiledname,"empty",$customError);
		return false;

	}

	public function same($feildname,$data,$data2,$customError){

		if($data===$data2){
			
			return true;
		}
		$this->setErrorMessage($feildname,"same",$customError);
		return false;
	}

	public  function minLength($feiledname,$text="",$length){

		if(strlen($text)>=$length){
			return true;
		}
		$this->errors[$feiledname] = "At least ".$length." charecters required";
		return flase;
	}
	public  function maxLength($feiledname,$text="",$length){

		if(strlen($text)<=$length){
			return true;
		}
		$this->errors[$feiledname] = "Too long";
		return false;
	}


	public function pass(){

		return empty($this->errors);
	}


	public function getErrors(){

		return $this->errors;
	}

}