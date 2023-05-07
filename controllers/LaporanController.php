<?php

include "SessionController.php";
include "models/Laporan.php";

class LaporanController extends SessionController {
	public function keuntungan() {
		$laporan = new Laporan($this->database);
		$laporanKeuntungan = $laporan->keuntungan();
		return $this->view("laporan/keuntungan", $laporanKeuntungan);
	}
}
