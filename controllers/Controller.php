<?php

include "config/database.php";

class Controller {
	protected $database;

	public function __construct() {
		$db = new Database();
		$this->database = $db->connection();
	}
	protected function view($viewName, $data = null) {
		$content = "views/" . $viewName . ".php";
		include "views/templates/default.php";
	}

	protected function redirect($url) {
		header("location: " . $url);
	}
}
