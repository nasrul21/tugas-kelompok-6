<?php

include "SessionController.php";
include "models/Barang.php";

class BarangController extends SessionController {
	public function index() {
		$BarangModel = new Barang($this->database);
		$DaftarBarang = $BarangModel->getList();

		return $this->view("barang/list", ["DaftarBarang" => $DaftarBarang]);
	}

	public function formAdd() {
		return $this->view("barang/form_add");
	}

	public function save() {
		// mulai penyimpanan
		if (isset($_POST['simpan'])) {
			$addBarang = new Barang($this->database);
			$addBarang->setNamaBarang($_POST['NamaBarang']);
			$addBarang->setKeterangan($_POST['Keterangan']);
			$addBarang->setSatuan($_POST['Satuan']);
			$addBarang->setIdPengguna($_POST['IdPengguna']);
			$addBarang->save();

			return $this->redirect("?controller=Barang&action=index");	
		}
	}

	public function formEdit() {
		// mengambil data untuk ditampilkan di form edit
		if (isset($_GET['id'])) {
			$Barang = new Barang($this->database);
			$data = $Barang->findById($_GET['id']);

			return $this->view("barang/form_edit", $data);
		}
	}

	public function update() {
		// mulai update
		if (isset($_POST['update'])) {
			$updateBarang = new Barang($this->database);
			$updateBarang->setIdBarang($_POST['IdBarang']);
			$updateBarang->setNamaBarang($_POST['NamaBarang']);
			$updateBarang->setKeterangan($_POST['Keterangan']);
			$updateBarang->setSatuan($_POST['Satuan']);
			$updateBarang->setIdPengguna($_POST['IdPengguna']);
			$updateBarang->update();

			return $this->redirect("?controller=Barang&action=index");
		}
	}

	public function delete() {
		// mulai hapus
		if (isset($_GET['id'])) {
			$deleteBarang = new Barang($this->database);
			$deleteBarang->delete($_GET['id']);

			return $this->redirect("?controller=Barang&action=index");
		}
	}
}
