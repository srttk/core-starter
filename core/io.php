<?php

class Input {

	public static function get($key){
		if(isset($_GET[$key])){

			return self::_escape($_GET[$key]);
		}
		return  null;
	}
	public static function post($key){
		if(isset($_POST[$key])){

			return self::_escape($_POST[$key]);
		}
		return null;
	}

	private static function _escape($text,$trim=true){

		if($trim===true){
			$text = trim($text);
		}

		// Html special charse
		return htmlspecialchars($text);


	}
}