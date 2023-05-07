<?php

include "SessionController.php";
include "models/Penjualan.php";

class PenjualanController extends SessionController {
	public function index() {
		$PenjualanModel = new Penjualan($this->database);
		$DaftarPenjualan = $PenjualanModel->getList();

		return $this->view("penjualan/list", ["DaftarPenjualan" => $DaftarPenjualan]);
	}

	public function formAdd() {
		return $this->view("penjualan/form_add");
	}

	public function save() {
		// mulai penyimpanan
		if (isset($_POST['simpan'])) {
			$addPenjualan = new Penjualan($this->database);
			$addPenjualan->setJumlahPenjualan($_POST['JumlahPenjualan']);
			$addPenjualan->setHargaJual($_POST['HargaJual']);
			$addPenjualan->setIdPengguna($_POST['IdPengguna']);
			$addPenjualan->save();

			return $this->redirect("?controller=Penjualan&action=index");	
		}
	}

	public function formEdit() {
		// mengambil data untuk ditampilkan di form edit
		if (isset($_GET['id'])) {
			$Penjualan = new Penjualan($this->database);
			$data = $Penjualan->findById($_GET['id']);

			return $this->view("penjualan/form_edit", $data);
		}
	}

	public function update() {
		// mulai update
		if (isset($_POST['update'])) {
			$updatePenjualan = new Penjualan($this->database);
			$updatePenjualan->setIdPenjualan($_POST['IdPenjualan']);
			$updatePenjualan->setJumlahPenjualan($_POST['JumlahPenjualan']);
			$updatePenjualan->setHargaJual($_POST['HargaJual']);
			$updatePenjualan->setIdPengguna($_POST['IdPengguna']);
			$updatePenjualan->update();

			return $this->redirect("?controller=Penjualan&action=index");
		}
	}

	public function delete() {
		// mulai hapus
		if (isset($_GET['id'])) {
			$deletePenjualan = new Penjualan($this->database);
			$deletePenjualan->delete($_GET['id']);

			return $this->redirect("?controller=Penjualan&action=index");
		}
	}
}
