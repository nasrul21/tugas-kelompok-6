<?php

class Pembelian {
	private $IdPembelian;
	private $JumlahPembelian;
	private $HargaBeli;
	private $IdPengguna;

	// Properties
	private $conn;
	private $tableName;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
		$this->tableName = "Pembelian";
	}

	public function setIdPembelian($IdPembelian) {
		$this->IdPembelian = $IdPembelian;
	}

	public function setJumlahPembelian($JumlahPembelian) {
		$this->JumlahPembelian = $JumlahPembelian;
	}

	public function setHargaBeli($HargaBeli) {
		$this->HargaBeli = $HargaBeli;
	}

	public function setIdPengguna($IdPengguna) {
		$this->IdPengguna = $IdPengguna;
	}

	public function getIdPembelian() {
		return $IdPembelian;
	}

	public function getJumlahPembelian() {
		return $JumlahPembelian;
	}

	public function getHargaBeli() {
		return $HargaBeli;
	}

	public function getIdPengguna() {
		return $IdPengguna;
	}

	public function save() {
		try {
			$query = "INSERT INTO " . $this->tableName . "(`JumlahPembelian`,`HargaBeli`, `IdPengguna`) VALUES (?, ?, ?)";
			$prepareDB = $this->conn->prepare($query);
			$sqlAddPembelian = $prepareDB->execute([$this->JumlahPembelian, $this->HargaBeli, $this->IdPengguna]);

			return $sqlAddPembelian;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getList() {
		$query = "SELECT * FROM " . $this->tableName . " ORDER BY IdPembelian ASC";
		$prepareDB = $this->conn->prepare($query);
		$prepareDB->execute();
		$PembelianList = $prepareDB->fetchAll();

		return $PembelianList;
	}

	public function findById($id) {
		try {
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdPembelian = ?";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([$id]);
			$findPembelianById = $prepareDB->fetchAll();

			return $findPembelianById;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function update() {
		try {
			$query = "UPDATE " . $this->tableName . " SET JumlahPembelian = ?, HargaBeli = ?, IdPengguna = ? WHERE IdPembelian = ?";
			$prepareDB = $this->conn->prepare($query);
			$updatePembelian = $prepareDB->execute([$this->JumlahPembelian, $this->HargaBeli, $this->IdPengguna, $this->IdPembelian]);

			return $updatePembelian;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delete($id) {
		try {
			$query = "DELETE FROM " . $this->tableName . " WHERE IdPembelian = ?";
			$prepareDB = $this->conn->prepare($query);
			$PembelianDelete = $prepareDB->execute([$id]);

			return $PembelianDelete;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
