<?php

class Response{



	public static function redirect($uri){
		//ob_start();
		header("Location: ".$uri);
		//ob_end_flush();


	}
}