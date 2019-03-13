<?php

class Main {

	protected $result;
	
	public function __construct() {
		$this->result = new \stdClass();
	}

	protected function loadView($view) {
		$path = 'Resources/Views/'.$view.'.php';
		
		if(file_exists($path)) {
			include $path;
		} else {
			include 'Resources/Views/Errors/error404.html';
		}
	}

}

?>