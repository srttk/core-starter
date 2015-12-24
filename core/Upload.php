<?php

class Upload {


	protected $fileInput = false;

	protected $name = false;

	protected $fileRealName;

	protected $tmp_loc;

	protected $size;

	protected $type;

	protected $extension;

	protected $fileError;

	// Set Upload properties

	protected $allowedTypes = array('image/jpeg','image/pjpeg','image/png');

	protected $maxSize = 500000;

	protected $saveLocation;

	protected $errors =array();


	public function __construct($file = null){

		$this->fileInput = $file;

		$this->processFile();


	}

	protected function processFile(){

		if(! $this->fileInput) throw new Exception("File Not Provided.");

		$this->name = $this->fileInput['name'];
		$this->size = $this->fileInput['size'];
		$this->type = $this->fileInput['type'];
		$this->fileError = $this->fileInput['error'];
		$this->tmp_loc = $this->fileInput['tmp_name'];
		$this->fileRealName = $this->fileInput['name'];

		$this->extension = $this->getExtension();
		


	}

	public function validate(){

		if($this->fileError){
			$this->errors[] = "File required";
		}

		if(!in_array($this->type, $this->allowedTypes)){

			$this->errors[] = "File type not allowed";
		}

		if($this->size > $this->maxSize){
			$this->errors[] = "File size should be less than 2Mb";
		}

		//var_dump($this->errors);


		return  empty($this->errors);


	}

	public function getName(){

		return $this->name;

	}

	public function getRealName(){

		return $this->fileInput['name'];

	}

	public function getSize(){

		return $this->size;


	}

	public function getType(){
		return $this->type;
	}

	public function getExtension(){
		if($this->fileRealName){
		$path_parts = pathinfo($this->fileRealName);
		return $path_parts['extension'];
		}

	}

	public function getErrors(){
		return $this->errors;
	}

	public function setMaxSize($max){

		$this->maxSize = $max;
		return $this;

	}

	public function setName($name){
		$this->name = $name;
		return $this;
	}

	public function setSaveLocation($location){

		$this->saveLocation = $location;
		return $this;

	}

	public function save($location=null){

		if($location){
			$this->saveLocation = $location;

		}

		if($this->validate()){

			move_uploaded_file($this->tmp_loc,$this->saveLocation.$this->name);
			return true;
		}

		return false;
	}



}