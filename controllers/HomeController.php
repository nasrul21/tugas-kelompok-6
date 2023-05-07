<?php

include "SessionController.php";

class HomeController extends SessionController {
	public function index() {
		return $this->view("home");
	}
}
