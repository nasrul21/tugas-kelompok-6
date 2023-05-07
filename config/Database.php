<?php

class Database {
	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "db_si_nasrul";

	public function connection() {
		try {
			// buat koneksi dengan database
			$dbh = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->database, $this->username, $this->password);

			// set error mode
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $dbh;
		} catch (PDOEXception $e) {
			// tampilkan pesan kesalahan jika koneksi gagal
			echo "Koneksi gagal terhubung: " . $e->getMessage();
			die();
		}
	}
}

