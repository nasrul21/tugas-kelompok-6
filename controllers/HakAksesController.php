<?php

include "SessionController.php";
include "models/HakAkses.php";

class HakAksesController extends Controller {
	public function index() {
		$HakAksesModel = new HakAkses($this->database);
		$DaftarHakAkses = $HakAksesModel->getList();

		return $this->view("hak_akses/list", ["DaftarHakAkses" => $DaftarHakAkses]);
	}

	public function formAdd() {
		return $this->view("hak_akses/form_add");
	}

	public function save() {
		// mulai penyimpanan
		if (isset($_POST['simpan'])) {
			$addHakAkses = new HakAkses($this->database);
			$addHakAkses->setNamaAkses($_POST['NamaAkses']);
			$addHakAkses->setKeterangan($_POST['Keterangan']);
			$addHakAkses->save();

			return $this->redirect("?controller=HakAkses&action=index`");	
		}
	}

	public function formEdit() {
		// mengambil data untuk ditampilkan di form edit
		if (isset($_GET['id'])) {
			$hakAkses = new HakAkses($this->database);
			$data = $hakAkses->findById($_GET['id']);

			return $this->view("hak_akses/form_edit", $data);
		}
	}

	public function update() {
		// mulai update
		if (isset($_POST['update'])) {
			$updateHakAkses = new HakAkses($this->database);
			$updateHakAkses->setIdAkses($_POST['IdAkses']);
			$updateHakAkses->setNamaAkses($_POST['NamaAkses']);
			$updateHakAkses->setKeterangan($_POST['Keterangan']);
			$updateHakAkses->update();

			return $this->redirect("?controller=HakAkses&action=index");
		}
	}

	public function delete() {
		// mulai hapus
		if (isset($_GET['id'])) {
			$deleteHakAkses = new HakAkses($this->database);
			$deleteHakAkses->delete($_GET['id']);

			return $this->redirect("?controller=HakAkses&action=index");
		}
	}
}
