<?php

class Flash{

	protected $data = array();

	public function start(){

		if(!isset($_SESSION['flash_data'])){
			//$_SESSION['flash_data'] = $this->data;
		}
		else{
			$this->data = $_SESSION['flash_data'];
			unset($_SESSION['flash_data']);
			$_SESSION['flash_data'] = array();
		}
	}

	public function set($key,$value){

		$this->data[$key] = $value;
		$_SESSION['flash_data'] = $this->data;

	}
	public function get($key,$default=null){
		if(array_key_exists($key, $this->data)){
			return $this->data[$key];
		}
		return false;
	}

	// public function __get($name){
	// 	$this->data = $_SESSION['flash_data'];
	// 	if(array_key_exists($name, $this->data)){
	// 		return $this->data[$name];
	// 	}
	// 	return false;
	// }

	// public function __set($name,$value){
	// 	echo "You trying to set $name with $value \n";
	// 	$this->data[$name] = $value;
	// 	$_SESSION['flash_data'] = $this->data;
	// }


}