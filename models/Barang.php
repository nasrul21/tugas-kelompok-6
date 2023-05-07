<?php

class Barang {
	private $IdBarang;
	private $NamaBarang;
	private $Keterangan;
	private $Satuan;
	private $IdPengguna;

	// Properties
	private $conn;
	private $tableName;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
		$this->tableName = "Barang";
	}

	public function setIdBarang($IdBarang) {
		$this->IdBarang = $IdBarang;
	}

	public function setNamaBarang($NamaBarang) {
		$this->NamaBarang = $NamaBarang;
	}

	public function setKeterangan($Keterangan) {
		$this->Keterangan = $Keterangan;
	}

	public function setSatuan($Satuan) {
		$this->Satuan = $Satuan;
	}

	public function setIdPengguna($IdPengguna) {
		$this->IdPengguna = $IdPengguna;
	}

	public function getIdBarang() {
		return $IdBarang;
	}

	public function getNamaBarang() {
		return $NamaBarang;
	}

	public function getKeterangan() {
		return $Keterangan;
	}

	public function getSatuan() {
		return $Satuan;
	}

	public function getIdPengguna() {
		return $IdPengguna;
	}

	public function save() {
		try {
			$query = "INSERT INTO " . $this->tableName . "(`NamaBarang`,`Keterangan`, `Satuan`, `IdPengguna`) VALUES (?, ?, ?, ?)";
			$prepareDB = $this->conn->prepare($query);
			$sqlAddBarang = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->IdPengguna]);

			return $sqlAddBarang;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getList() {
		$query = "SELECT * FROM " . $this->tableName . " ORDER BY IdBarang ASC";
		$prepareDB = $this->conn->prepare($query);
		$prepareDB->execute();
		$BarangList = $prepareDB->fetchAll();

		return $BarangList;
	}

	public function findById($id) {
		try {
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdBarang = ?";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([$id]);
			$findBarangById = $prepareDB->fetchAll();

			return $findBarangById;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function update() {
		try {
			$query = "UPDATE " . $this->tableName . " SET NamaBarang = ?, Keterangan = ?, Satuan = ?, IdPengguna = ? WHERE IdBarang = ?";
			$prepareDB = $this->conn->prepare($query);
			$updateBarang = $prepareDB->execute([$this->NamaBarang, $this->Keterangan, $this->Satuan, $this->IdPengguna, $this->IdBarang]);

			return $updateBarang;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delete($id) {
		try {
			$query = "DELETE FROM " . $this->tableName . " WHERE IdBarang = ?";
			$prepareDB = $this->conn->prepare($query);
			$BarangDelete = $prepareDB->execute([$id]);

			return $BarangDelete;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
