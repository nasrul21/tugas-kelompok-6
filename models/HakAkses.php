<?php

class HakAkses {
	private $IdAkses;
	private $NamaAkses;
	private $Keterangan;

	// Properties
	private $conn;
	private $tableName;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
		$this->tableName = "HakAkses";
	}

	public function setIdAkses($IdAkses) {
		$this->IdAkses = $IdAkses;
	}

	public function setNamaAkses($NamaAkses) {
		$this->NamaAkses = $NamaAkses;
	}

	public function setKeterangan($Keterangan) {
		$this->Keterangan = $Keterangan;
	}

	public function getIdAkses() {
		return $IdAkses;
	}

	public function getNamaAkses() {
		return $NamaAkses;
	}

	public function getKeterangan() {
		return $Keterangan;
	}

	public function save() {
		try {
			$query = "INSERT INTO " . $this->tableName . "(`NamaAkses`,`Keterangan`) VALUES (?, ?)";
			$prepareDB = $this->conn->prepare($query);
			$sqlAddHakAkses = $prepareDB->execute([$this->NamaAkses, $this->Keterangan]);

			return $sqlAddHakAkses;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function getList() {
		$query = "SELECT * FROM " . $this->tableName . " ORDER BY IdAkses ASC";
		$prepareDB = $this->conn->prepare($query);
		$prepareDB->execute();
		$HakAksesList = $prepareDB->fetchAll();

		return $HakAksesList;
	}

	public function findById($id) {
		try {
			$query = "SELECT * FROM " . $this->tableName . " WHERE IdAkses = ?";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([$id]);
			$findHakAksesById = $prepareDB->fetchAll();

			return $findHakAksesById;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function update() {
		try {
			$query = "UPDATE " . $this->tableName . " SET NamaAkses = ?, Keterangan = ? WHERE IdAkses = ?";
			$prepareDB = $this->conn->prepare($query);
			$updateHakAkses = $prepareDB->execute([$this->NamaAkses, $this->Keterangan, $this->IdAkses]);

			return $updateHakAkses;
		} catch (\Exception $e) {
			throw $e;
		}
	}

	public function delete($id) {
		try {
			$query = "DELETE FROM " . $this->tableName . " WHERE IdAkses = ?";
			$prepareDB = $this->conn->prepare($query);
			$HakAksesDelete = $prepareDB->execute([$id]);

			return $HakAksesDelete;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
