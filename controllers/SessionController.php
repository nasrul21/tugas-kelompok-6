<?php

include "Controller.php";

class SessionController extends Controller {
	public function __construct() {
		parent::__construct();

		session_start();
		if (!isset($_SESSION['user'])) {
			$this->redirect("?controller=login&action=index");
		}
	}
}
