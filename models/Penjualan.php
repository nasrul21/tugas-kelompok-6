<?php

class Penjualan {
	private $IdPenjualan;
	private $JumlahPenjualan;
	private $HargaJual;
	private $IdPengguna;

	// Properties
	private $conn;
	private $tableName;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
		$this->tableName = "Penjualan";
	}

	public function setIdPenjualan($IdPenjualan) {
		$this->IdPenjualan = $IdPenjualan;
	}

	public function setJumlahPenjualan($JumlahPenjualan) {
		$this->JumlahPenjualan = $JumlahPenjualan;
	}

	public function setHargaJual($HargaJual) {
		$this->HargaJual = $HargaJual;
	}

	public function setIdPengguna($IdPengguna) {
		$this->IdPengguna = $IdPengguna;
	}

	public function getIdPenjualan() {
		return $IdPenjualan;
	}

	public function getJumlahPenjualan() {
		return $JumlahPenjualan;
	}

	public function getHargaJual() {
		return $HargaJual;
	}

	public function getIdPengguna() {
		return $IdPengguna;
	}

	public function save() {
		try {
			$query = "INSERT INTO " . $this->tableName . "(`JumlahPenjualan`,`HargaJual`, `IdPengguna`) VALUES (?, ?, ?)";
			$prepareDB = $this->conn->prepare($query);
			$sqlAddPenjualan = $prepareDB->execute([$this->JumlahPenjualan, $this->HargaJual, $this->IdPengguna]);

			return $sqlAddPenjualan;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getList() {
		$query = "SELECT * FROM " . $this->tableName . " ORDER BY IdPenjualan ASC";
		$prepareDB = $this->conn->prepare($query);
		$prepareDB->execute();
		$PenjualanList = $prepareDB->fetchAll();

		return $PenjualanList;
	}

	public function findById($id) {
		try {
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdPenjualan = ?";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([$id]);
			$findPenjualanById = $prepareDB->fetchAll();

			return $findPenjualanById;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function update() {
		try {
			$query = "UPDATE " . $this->tableName . " SET JumlahPenjualan = ?, HargaJual = ?, IdPengguna = ? WHERE IdPenjualan = ?";
			$prepareDB = $this->conn->prepare($query);
			$updatePenjualan = $prepareDB->execute([$this->JumlahPenjualan, $this->HargaJual, $this->IdPengguna, $this->IdPenjualan]);

			return $updatePenjualan;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delete($id) {
		try {
			$query = "DELETE FROM " . $this->tableName . " WHERE IdPenjualan = ?";
			$prepareDB = $this->conn->prepare($query);
			$PenjualanDelete = $prepareDB->execute([$id]);

			return $PenjualanDelete;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
