<?php

class Pengguna {
	private $IdPengguna;
	private $NamaPengguna;
	private $Password;
	private $NamaDepan;
	private $NamaBelakang;
	private $NoHp;
	private $Alamat;
	private $IdAkses;

	// Properties
	private $conn;
	private $tableName;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
		$this->tableName = "Pengguna";
	}

	public function setIdPengguna($IdPengguna) {
		$this->IdPengguna = $IdPengguna;
	}

	public function setNamaPengguna($NamaPengguna) {
		$this->NamaPengguna = $NamaPengguna;
	}

	public function setPassword($Password) {
		$this->Password = $Password;
	}

	public function setNamaDepan($NamaDepan) {
		$this->NamaDepan = $NamaDepan;
	}

	public function setNamaBelakang($NamaBelakang) {
		$this->NamaBelakang = $NamaBelakang;
	}

	public function setNoHp($NoHp) {
		$this->NoHp = $NoHp;
	}

	public function setAlamat($Alamat) {
		$this->Alamat = $Alamat;
	}

	public function setIdAkses($IdAkses) {
		$this->IdAkses = $IdAkses;
	}

	public function getIdPengguna() {
		return $IdAkses;
	}

	public function getNamaPengguna() {
		return $NamaPengguna;
	}

	public function getPassword() {
		return $Password;
	}

	public function getNamaDepan() {
		return $NamaDepan;
	}
	
	public function getNamaBelakang() {
		return $NamaBelakang;
	}

	public function getNoHp() {
		return $NoHp;
	}

	public function getAlamat() {
		return $Alamat;
	}

	public function getIdAkses() {
		return $IdAkses;
	}

	public function login() {
		try {
			$query = "SELECT IdPengguna, NamaPengguna, IdAkses FROM " . $this->tableName . " WHERE NamaPengguna = ? AND Password = ?";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([$this->NamaPengguna, $this->Password]);
			$loginPengguna = $prepareDB->fetch();

			return $loginPengguna;
		} catch (Exception $e) {
			throw $e;
		}
	}
}
