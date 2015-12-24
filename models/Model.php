<?php

class Model {



	public $db = null;

	protected static $connection = null;

	protected $fetch_mode = "FETCH_ASSOC";


	public function __construct(){

		if(self::$connection){
			$this->db = self::$connection;

			// Set Fetch mode
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		else{
			throw new Exception("Boot the model first");
		}

	}

	public static function boot($connection){
			if(!$connection){
				throw new Exception('Provide Valid Dataabse connection');
			}
			if(!self::$connection){
				self::$connection = $connection;
			}

	}
}