<?php

include "Controller.php";
include "models/Pengguna.php";

class LoginController extends Controller {
	public function index() {
		return $this->view('login');
	}

	public function login() {// get input
		if (isset($_POST['login'])) {
			$NamaPengguna = $_POST['NamaPengguna'];
			$Password = $_POST['Password'];

			// validate input
			if(empty($NamaPengguna) || empty($Password)) {
				session_start();
				$_SESSION['error'] = "Nama Pengguna dan Password wajib diisi";
				return $this->redirect("?controller=Login&action=index");
			}

			// authenticate user
			$pengguna = new Pengguna($this->database);
			$pengguna->setNamaPengguna($NamaPengguna);
			$pengguna->setPassword($Password);
			$loginPengguna = $pengguna->login($NamaPengguna, $Password);

			if($loginPengguna) {
				// set session
				session_start();
				$_SESSION['user'] = $loginPengguna;
				return $this->redirect("?controller=Home&action=index");
			} else {
				session_start();
				$_SESSION['error'] = "Invalid username or password";
				return $this->redirect("?controller=Login&action=index");
			}
		}
	}

	public function logout() {
		session_start();
        session_unset();
        session_destroy();
		return $this->redirect("?controller=Login&action=index");
	}
}
