<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

include("KontrakView.php");
include("presenter/ProsesRencanaBaksos.php");
include("presenter/ProsesBaksos.php");

class TampilRencanabaksosdanBaksos implements KontrakView
{
	private $prosesrencanabaksos; // Presenter yang dapat berinteraksi langsung dengan view
	private $prosesbaksos; // Presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosesrencanabaksos = new ProsesRencanabaksos();
		$this->prosesbaksos = new ProsesBaksos();
	}

	function tampil()
	{
		$this->prosesrencanabaksos->prosesDataRencanabaksos();
		$this->prosesbaksos->prosesDataBaksos();
		$data_rencanabaksos = null;
		$data_baksos = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesrencanabaksos->getSize(); $i++) {
			$no = $i + 1;
			$data_rencanabaksos .= "<tr>
				<td>" . $no . "</td>
				<td>" . $this->prosesrencanabaksos->getIdbaksos($i) . "</td>
				<td>" . $this->prosesrencanabaksos->getNamabaksos($i) . "</td>				<td>
					<form method='POST' action='index.php'>
						<input type='hidden' name='idbaksos' value='" . $this->prosesrencanabaksos->getIdbaksos($i) . "'>
						<input 
							type='date' 
							name='tanggalbaksos'
							value='" . $this->prosesrencanabaksos->getTanggalbaksos($i) . "'
							style='width: 100%; padding: 5px;'
						>
					</td>
				<td>" . $this->prosesrencanabaksos->getDeskripsibaksos($i) . "</td>
				<td>" . $this->prosesrencanabaksos->getLokasibaksos($i) . "</td>
				<td>
						<input 
							type='text'
							name='timpelaksana' 
							value='" . $this->prosesrencanabaksos->getTimpelaksana($i) . "'
							style='width: 100%; padding: 5px;'
						>
				</td>
				<td>
						<button type='submit' name='id_edit_rencanabaksos' style='background: #ffc107; border: none; padding: 5px 10px; border-radius: 3px; color: white; cursor: pointer; margin-right: 5px;'>Ubah</button>
					</form>
					<a href='index.php?id_hapus_rencanabaksos=" . $this->prosesrencanabaksos->getIdbaksos($i) . "' style='background: #dc3545; text-decoration: none; padding: 5px 10px; border-radius: 3px; color: white; margin-right: 5px;'>Hapus</a>
					<a href='index.php?id_implementasi=" . $this->prosesrencanabaksos->getIdbaksos($i) . "' style='background: #007bff; text-decoration: none; padding: 5px 10px; border-radius: 3px; color: white;'>Implementasi</a>
				</td>
			</tr>";
		}

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosesbaksos->getSize(); $i++) {
			$no = $i + 1;
			$data_baksos .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosesbaksos->getIdbaksos($i) . "</td>
			<td>" . $this->prosesbaksos->getNamabaksos($i) . "</td>
			<td>" . $this->prosesbaksos->getTanggalbaksos($i) . "</td>
			<td>" . $this->prosesbaksos->getDeskripsibaksos($i) . "</td>
			<td>" . $this->prosesbaksos->getLokasibaksos($i) . "</td>
			<td>" . $this->prosesbaksos->getTimpelaksana($i) . "</td> </tr>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		$JUDUL_RENCANABAKSOS = "Rencana Bakti Sosial";
		$JUDUL_BAKSOS = "Implementasi Bakti Sosial";

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL_RENCANABAKSOS", $data_rencanabaksos);
		$this->tpl->replace("DATA_TABEL_BAKSOS", $data_baksos);
		$this->tpl->replace("JUDUL_RENCANABAKSOS", $JUDUL_RENCANABAKSOS);
		$this->tpl->replace("JUDUL_BAKSOS", $JUDUL_BAKSOS);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	// add data
	function addDataRencanabaksos(){
		$this->prosesrencanabaksos->addRencanabaksos($_POST);
	}

	// delete data
	function deleteDataRencanabaksos(){
		$this->prosesrencanabaksos->deleteRencanabaksos($_GET['id_hapus']);
	}

	// edit data
	function editDataRencanabaksos(){
		$data = array(
			'tanggalbaksos' => $_POST['tanggalbaksos'],
			'timpelaksana' => $_POST['timpelaksana']
		);
		$this->prosesrencanabaksos->editTanggalDanTimpelaksana($_POST['idbaksos'], $data);
	}

	function implementasiBaksos(){
		// Ambil data yang akan diimplementasi
		$data = $this->prosesrencanabaksos->DataImplementasiRencanabaksos($_GET['id_implementasi']);
		
		// Tambahkan ke tabel baksos
		$this->prosesbaksos->addBaksos($data);
		
		// Hapus dari tabel rencana
		$this->prosesrencanabaksos->deleteRencanabaksos($_GET['id_implementasi']);
	}
}
