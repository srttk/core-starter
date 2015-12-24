<?php

class Middleware {


	protected $flash;

	public function __construct(){

		$this->flash = new Flash();
	}


	public function auth(){


		if(isset($_SESSION['userdata'])){
			if(isset($_SESSION['userdata']['id']) && $_SESSION['userdata']['id']){
				return true;
			}
		}

		$this->flash->set('error','Please Login First');

		header('Location: login.php');
	}
}