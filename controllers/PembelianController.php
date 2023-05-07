<?php

include "SessionController.php";
include "models/Pembelian.php";

class PembelianController extends SessionController {
	public function index() {
		$PembelianModel = new Pembelian($this->database);
		$DaftarPembelian = $PembelianModel->getList();

		return $this->view("pembelian/list", ["DaftarPembelian" => $DaftarPembelian]);
	}

	public function formAdd() {
		return $this->view("pembelian/form_add");
	}

	public function save() {
		// mulai penyimpanan
		if (isset($_POST['simpan'])) {
			$addPembelian = new Pembelian($this->database);
			$addPembelian->setJumlahPembelian($_POST['JumlahPembelian']);
			$addPembelian->setHargaBeli($_POST['HargaBeli']);
			$addPembelian->setIdPengguna($_POST['IdPengguna']);
			$addPembelian->save();

			return $this->redirect("?controller=Pembelian&action=index");	
		}
	}

	public function formEdit() {
		// mengambil data untuk ditampilkan di form edit
		if (isset($_GET['id'])) {
			$Pembelian = new Pembelian($this->database);
			$data = $Pembelian->findById($_GET['id']);

			return $this->view("pembelian/form_edit", $data);
		}
	}

	public function update() {
		// mulai update
		if (isset($_POST['update'])) {
			$updatePembelian = new Pembelian($this->database);
			$updatePembelian->setIdPembelian($_POST['IdPembelian']);
			$updatePembelian->setJumlahPembelian($_POST['JumlahPembelian']);
			$updatePembelian->setHargaBeli($_POST['HargaBeli']);
			$updatePembelian->setIdPengguna($_POST['IdPengguna']);
			$updatePembelian->update();

			return $this->redirect("?controller=Pembelian&action=index");
		}
	}

	public function delete() {
		// mulai hapus
		if (isset($_GET['id'])) {
			$deletePembelian = new Pembelian($this->database);
			$deletePembelian->delete($_GET['id']);

			return $this->redirect("?controller=Pembelian&action=index");
		}
	}
}
