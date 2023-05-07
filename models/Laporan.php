<?php

class Laporan {
	// Properties
	private $conn;

	// Get Database Access
	public function __construct(\PDO $database) {
		$this->conn = $database;
	}
	public function keuntungan() {
		try {
			$query="SELECT
				IdBarang,
				NamaBarang,
				SUM(
					penjualan.HargaJual - pembelian.HargaBeli
				) AS KeuntunganPenjualan,
			(penjualan.HargaJual - pembelian.HargaBeli) AS KeuntunganSetiapBarang,
				SUM(
					pembelian.JumlahPembelian - penjualan.JumlahPenjualan
				) AS Stok,
				SUM(penjualan.JumlahPenjualan) AS JumlahPenjualan
			FROM
				barang
			JOIN pembelian ON pembelian.IdPengguna = barang.IdPengguna
			JOIN penjualan ON penjualan.IdPengguna = barang.IdPengguna
			GROUP BY barang.IdBarang;";
			$prepareDB = $this->conn->prepare($query);
			$prepareDB->execute([]);
			$laporanKeuntungan = $prepareDB->fetchAll();

			return $laporanKeuntungan;
		} catch (Exception $e) {
			throw $e;
		}
	}
}
